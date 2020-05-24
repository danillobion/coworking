<?php

namespace App\Http\Controllers;

use App\Configpaginainicial;
use DB;
use Intervention\Image\ImageManagerStatic as Image;
use \Crypt;
use Illuminate\Http\Request;

class ConfigPaginaInicialController extends Controller
{
  public function index(){
      $resultado = Configpaginainicial::where('id','=',1)->first();
      return view('welcome', ['allHome'=>$resultado]);
  }
  //texto
  public function editBlocoApresentacao(Request $request){
    $this->validate($request,[
        'titulo1'                => 'required|min:3|max:1000',
        'subtitulo1'             => 'required|string|min:3|max:1000',
        'texto'                  => 'required|min:3|max:10000',
    ]);
    // Atualiza campos
    $resultado = Configpaginainicial::where('id','=',1)
    ->update([
      'titulo1'                 => $request->titulo1,
      'subtitulo1'              => $request->subtitulo1,
      'texto'                   => $request->texto,
    ]);
    return redirect()->route('config_home')->with('sucesso', 'Bloco apresentação atualizado com sucesso!');
  }
  public function editBlocoDetalhe(Request $request){
    $this->validate($request,[
        'titulo2'                => 'required|min:3|max:1000',
    ]);
    // Atualiza campos
    $resultado = Configpaginainicial::where('id','=',1)
    ->update([
      'titulo2'                  => $request->titulo2,
      'subtitulo2'              => $request->subtitulo2,
    ]);
    return redirect()->route('config_home')->with('sucesso', 'Bloco detalhe atualizado com sucesso!');
  }
  public function editBlocoEsquerda(Request $request){
    $this->validate($request,[
        'titulo3'                => 'required|min:3|max:1000',
        'legenda1'               => 'required|string|min:3|max:1000',
    ]);
    // Atualiza campos
    $resultado = Configpaginainicial::where('id','=',1)
    ->update([
      'titulo3'         => $request->titulo3,
      'legenda1'      => $request->legenda1,
    ]);
    return redirect()->route('config_home')->with('sucesso', 'Bloco da esquerda atualizado com sucesso!');
  }
  public function editBlocoCentro(Request $request){
    $this->validate($request,[
        'titulo4'                => 'required|min:3|max:1000',
        'legenda2'               => 'required|string|min:3|max:1000',
    ]);
    // Atualiza campos
    $resultado = Configpaginainicial::where('id','=',1)
    ->update([
      'titulo4'         => $request->titulo4,
      'legenda2'      => $request->legenda2,
    ]);
    return redirect()->route('config_home')->with('sucesso', 'Bloco do centro atualizado com sucesso!');
  }
  public function editBlocoDireita(Request $request){
    $this->validate($request,[
        'titulo5'                => 'required|min:3|max:1000',
        'legenda3'               => 'required|string|min:3|max:1000',
    ]);
    // Atualiza campos
    $resultado = Configpaginainicial::where('id','=',1)
    ->update([
      'titulo5'         => $request->titulo5,
      'legenda3'      => $request->legenda3,
    ]);
    return redirect()->route('config_home')->with('sucesso', 'Bloco da direita atualizado com sucesso!');
  }
  //img
  public function editImgApresentacao(Request $request){
    $imagemCapa = "";
    if($request->hasFile('imagemCapa1') && $request->file('imagemCapa1')->isValid()) {
        $ext = strtolower(request()->imagemCapa1->getClientOriginalExtension());

        if(!in_array($ext, array("jpg", "png", "jpeg", "gif", "bmp")))
            $validator->errors()->add("imagemcapa1", "Formato de imagem inválido, utilize imagem jpg ou png");
        else {
            $imagemCapa = 'c' . time() . '.' . $ext;
            // $upload = $request->imagemCapa->storeAs('projects', 'abc.png');
            $thumbPath = storage_path('app/public/imagens/home/'.$imagemCapa);
            Image::configure(array('driver' => 'imagick'));
            $image = Image::make(request()->imagemCapa1->path());
            $image->fit(700, 700)->save($thumbPath);
        }
        //deleta imagem
        $resultadoIMG = Configpaginainicial::where('id','=',1)->first()->imagemCapa1;
        if($resultadoIMG != "imagemHomeDefault1.png" && file_exists('storage/imagens/home/'.$resultadoIMG) == true){
          unlink('storage/imagens/home/'.$resultadoIMG);
        }
        $resultado = Configpaginainicial::where('id','=',1)
        ->update([
          'imagemCapa1'         => $imagemCapa,
        ]);
    }
    return redirect()->route('config_home')->with('sucesso', 'Imagem do bloco apresentação foi atualizado com sucesso!');
  }
  public function editImgBlocoEsquerda(Request $request){
    $imagemCapa = "";
    if($request->hasFile('imagemCapa2') && $request->file('imagemCapa2')->isValid()) {
        $ext = strtolower(request()->imagemCapa2->getClientOriginalExtension());

        if(!in_array($ext, array("jpg", "png", "jpeg", "gif", "bmp")))
            $validator->errors()->add("imagemcapa2", "Formato de imagem inválido, utilize imagem jpg ou png");
        else {
            $imagemCapa = 'c' . time() . '.' . $ext;
            // $upload = $request->imagemCapa->storeAs('projects', 'abc.png');
            $thumbPath = storage_path('app/public/imagens/home/'.$imagemCapa);
            Image::configure(array('driver' => 'imagick'));
            $image = Image::make(request()->imagemCapa2->path());
            $image->fit(300, 300)->save($thumbPath);
        }
        //deleta imagem
        $resultadoIMG = Configpaginainicial::where('id','=',1)->first()->imagemCapa2;
        if($resultadoIMG != "imagemHomeDefault2.png" && file_exists('storage/imagens/home/'.$resultadoIMG) == true){
          unlink('storage/imagens/home/'.$resultadoIMG);
        }
        $resultado = Configpaginainicial::where('id','=',1)
        ->update([
          'imagemCapa2'         => $imagemCapa,
        ]);
    }
    return redirect()->route('config_home')->with('sucesso', 'Imagem do bloco da esquerda foi atualizado com sucesso!');
  }
  public function editImgBlocoCentro(Request $request){
    $imagemCapa = "";
    if($request->hasFile('imagemCapa3') && $request->file('imagemCapa3')->isValid()) {
        $ext = strtolower(request()->imagemCapa3->getClientOriginalExtension());

        if(!in_array($ext, array("jpg", "png", "jpeg", "gif", "bmp")))
            $validator->errors()->add("imagemcapa3", "Formato de imagem inválido, utilize imagem jpg ou png");
        else {
            $imagemCapa = 'c' . time() . '.' . $ext;
            // $upload = $request->imagemCapa->storeAs('projects', 'abc.png');
            $thumbPath = storage_path('app/public/imagens/home/'.$imagemCapa);
            Image::configure(array('driver' => 'imagick'));
            $image = Image::make(request()->imagemCapa3->path());
            $image->fit(300, 300)->save($thumbPath);
        }
        //deleta imagem
        $resultadoIMG = Configpaginainicial::where('id','=',1)->first()->imagemCapa3;
        if($resultadoIMG != "imagemHomeDefault3.png" && file_exists('storage/imagens/home/'.$resultadoIMG) == true){
          unlink('storage/imagens/home/'.$resultadoIMG);
        }
        $resultado = Configpaginainicial::where('id','=',1)
        ->update([
          'imagemCapa3'         => $imagemCapa,
        ]);
    }
    return redirect()->route('config_home')->with('sucesso', 'Imagem do bloco do centro foi atualizado com sucesso!');
  }
  public function editImgBlocoDireita(Request $request){
    $imagemCapa = "";
    if($request->hasFile('imagemCapa4') && $request->file('imagemCapa4')->isValid()) {
        $ext = strtolower(request()->imagemCapa4->getClientOriginalExtension());

        if(!in_array($ext, array("jpg", "png", "jpeg", "gif", "bmp")))
            $validator->errors()->add("imagemcapa4", "Formato de imagem inválido, utilize imagem jpg ou png");
        else {
            $imagemCapa = 'c' . time() . '.' . $ext;
            // $upload = $request->imagemCapa->storeAs('projects', 'abc.png');
            $thumbPath = storage_path('app/public/imagens/home/'.$imagemCapa);
            Image::configure(array('driver' => 'imagick'));
            $image = Image::make(request()->imagemCapa4->path());
            $image->fit(300, 300)->save($thumbPath);
        }
        //deleta imagem
        $resultadoIMG = Configpaginainicial::where('id','=',1)->first()->imagemCapa4;
        if($resultadoIMG != "imagemHomeDefault4.png" && file_exists('storage/imagens/home/'.$resultadoIMG) == true){
          unlink('storage/imagens/home/'.$resultadoIMG);
        }
        $resultado = Configpaginainicial::where('id','=',1)
        ->update([
          'imagemCapa4'         => $imagemCapa,
        ]);
    }
    return redirect()->route('config_home')->with('sucesso', 'Imagem do bloco da direita foi atualizado com sucesso!');
  }


}
