<?php

namespace App\Http\Controllers;
use Auth;
use App\Project;

use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use \Crypt;
class ProjectController extends Controller
{
  public function addProject(Request $request)
  {
      // dd($request);
      $imagemCapa = "";
      if($request->hasFile('imagemCapa') && $request->file('imagemCapa')->isValid()) {
          $ext = strtolower(request()->imagemCapa->getClientOriginalExtension());

          if(!in_array($ext, array("jpg", "png", "jpeg", "gif", "bmp")))
              $validator->errors()->add("imagemcapa", "Formato de imagem inválido, utilize imagem jpg ou png");
          else {
              $imagemCapa = 'c' . time() . '.' . $ext;
              // $upload = $request->imagemCapa->storeAs('projects', 'abc.png');
              $thumbPath = storage_path('app/public/imagens/projects/'.$imagemCapa);
              Image::configure(array('driver' => 'imagick'));
              $image = Image::make(request()->imagemCapa->path());
              $image->fit(120, 120)->save($thumbPath);
          }
      }

      Project::create([
        'titulo'           => $request->titulo,
        'conteudo'         => $request->descricao,
        'tipo'             => $request->tipo,
        'coordenador'      => $request->coordenador,
        'visualizacao'     => '0',
        'user_id'          => Auth::user()->id,
        'imagemCapa'       => $imagemCapa,
      ]);

      return redirect()->route('config_project');
  }
  public function editProject(Request $request){
    // dd($request);
    $imagemCapa = "";
    if($request->hasFile('imagemCapa') && $request->file('imagemCapa')->isValid()) {
        $ext = strtolower(request()->imagemCapa->getClientOriginalExtension());

        if(!in_array($ext, array("jpg", "png", "jpeg", "gif", "bmp")))
            $validator->errors()->add("imagemcapa", "Formato de imagem inválido, utilize imagem jpg ou png");
        else {
            $imagemCapa = 'c' . time() . '.' . $ext;
            $thumbPath = storage_path('app/public/imagens/projects/'.$imagemCapa);
            Image::configure(array('driver' => 'imagick'));
            $image = Image::make(request()->imagemCapa->path());
            $image->fit(120, 120)->save($thumbPath);
        }
        //deleta imagem
        $resultadoIMG = Project::where('id','=',$request->id)->first()->imagemCapa;
        unlink('storage/imagens/projects/'.$resultadoIMG);
        //atualiza
        $resultado = Project::where('id','=',$request->id)
        ->update(['titulo' => $request->titulo, 'conteudo' => $request->descricao, 'coordenador' => $request->coordenador, 'tipo' => $request->tipo, 'imagemCapa' => $imagemCapa,]);
    }else{
      //atualiza
      $resultado = Project::where('id','=',$request->id)
      ->update(['titulo' => $request->titulo, 'conteudo' => $request->descricao,  'coordenador' => $request->coordenador, 'tipo' => $request->tipo,]);
    }

    return redirect()->route('config_project');
  }
  public function deleteProject(Request $request){
    $nomeimagem = Project::where('id','=',$request->idProjeto)->first()->imagemCapa;
    // dd($nomeimagem);
    if($nomeimagem == ''){
      $resultado = Project::where('id','ilike',$request->idProjeto)->delete();
    }else{
      unlink('storage/imagens/projects/'.$nomeimagem);
      $resultado = Project::where('id','ilike',$request->idProjeto)->delete();
    }
    return redirect()->route('config_project');
  }
}
