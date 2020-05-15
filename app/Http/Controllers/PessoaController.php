<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Pessoa;
use App\Coordenador;
use App\Membro;
use Intervention\Image\ImageManagerStatic as Image;
use \Crypt;
use DB;

class PessoaController extends Controller
{
    public function addPessoa(Request $request){
      $this->validate($request,[
          'nome'               => 'required|min:3|max:500',
          'tipo'               => 'required|min:3|max:150',
          'imagemCapa'         => 'required',
      ]);
      $imagemCapa = "";
      if($request->hasFile('imagemCapa') && $request->file('imagemCapa')->isValid()) {
          $ext = strtolower(request()->imagemCapa->getClientOriginalExtension());

          if(!in_array($ext, array("jpg", "png", "jpeg", "gif", "bmp")))
              $validator->errors()->add("imagemcapa", "Formato de imagem inválido, utilize imagem jpg ou png");
          else {
              $imagemCapa = 'c' . time() . '.' . $ext;
              // $upload = $request->imagemCapa->storeAs('projects', 'abc.png');
              $thumbPath = storage_path('app/public/imagens/pessoas/'.$imagemCapa);
              Image::configure(array('driver' => 'imagick'));
              $image = Image::make(request()->imagemCapa->path());
              $image->fit(120, 120)->save($thumbPath);
          }
          Pessoa::create([
            'nome'             => $request->nome,
            'tipo'             => $request->tipo,
            'area'             => $request->area,
            'lattes'           => $request->lattes,
            'imagemCapa'       => $imagemCapa,
            'user_id'          => Auth::user()->id,
          ]);

          return redirect()->route('config_pessoa')->with('sucesso', 'Pessoa cadastrada com sucesso!');
      }else{
        return redirect()->route('config_pessoa')->with('atencao', 'Verifique os campos e tente novamente!');;
      }

    }
    public function editPessoa(Request $request){
      // dd($request);
      $this->validate($request,[
        'nome'               => 'required|min:3|max:500',
        'tipo'               => 'required|min:3|max:150',
        // 'area'               => 'required|min:3|max:150',
        // 'lattes'             => 'required|min:3|max:150',
      ]);
      $imagemCapa = "";
      if($request->hasFile('imagemCapa') && $request->file('imagemCapa')->isValid()) {
          $ext = strtolower(request()->imagemCapa->getClientOriginalExtension());

          if(!in_array($ext, array("jpg", "png", "jpeg", "gif", "bmp")))
              $validator->errors()->add("imagemcapa", "Formato de imagem inválido, utilize imagem jpg ou png");
          else {
              $imagemCapa = 'c' . time() . '.' . $ext;
              $thumbPath = storage_path('app/public/imagens/pessoas/'.$imagemCapa);
              Image::configure(array('driver' => 'imagick'));
              $image = Image::make(request()->imagemCapa->path());
              $image->fit(120, 120)->save($thumbPath);
          }
          //deleta imagem
          $resultadoIMG = Pessoa::where('id','=',$request->id)->first()->imagemCapa;
          unlink('storage/imagens/pessoas/'.$resultadoIMG);
          //atualiza
          $resultado = Pessoa::where('id','=',$request->id)
          ->update(['nome' => $request->nome, 'tipo' => $request->tipo, 'area' => $request->area, 'lattes' => $request->lattes, 'imagemCapa' => $imagemCapa,]);
      }else{
        //atualiza
        $resultado = Pessoa::where('id','=',$request->id)
        ->update(['nome' => $request->nome, 'tipo' => $request->tipo, 'area' => $request->area, 'lattes' => $request->lattes,]);
      }

      return redirect()->route('config_pessoa')->with('sucesso', 'Perfil atualizado com sucesso!');
    }
    public function deletePessoa(Request $request){
      // dd($request);
      $nomeimagem = Pessoa::where('id','=',$request->idPessoa)->first()->imagemCapa;
      if($nomeimagem == ''){
        Coordenador::where('pessoa_id','ilike',$request->idPessoa)->delete();
        Membro::where('pessoa_id','ilike',$request->idPessoa)->delete();
        $resultado = Pessoa::where('id','ilike',$request->idPessoa)->delete();
        // dd($resultado);
      }else{
        unlink('storage/imagens/pessoas/'.$nomeimagem);
        Coordenador::where('pessoa_id','ilike',$request->idPessoa)->delete();
        Membro::where('pessoa_id','ilike',$request->idPessoa)->delete();
        $resultado = Pessoa::where('id','ilike',$request->idPessoa)->delete();
      }
      return redirect()->route('config_pessoa');
    }
    public function allPessoa(){
      // $resultado = Pessoa::orderBy('created_at', 'desc')->paginate(10);
      $resultadoAluno = Pessoa::where('tipo','ilike','Discente')->orderBy('nome', 'ASC')->get();
      $resultadoProfessor = Pessoa::where('tipo','ilike','Docente')->orderBy('nome', 'ASC')->get();
      $resultadoEgresso = Pessoa::where('tipo','ilike','Egresso')->orderBy('nome', 'ASC')->get();
      return view('pessoa', ['allAluno' => $resultadoAluno, 'allProfessor' => $resultadoProfessor, 'allEgresso' => $resultadoEgresso]);
    }


}
