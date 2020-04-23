<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\News;
use Intervention\Image\ImageManagerStatic as Image;
use \Crypt;

class NewsController extends Controller
{
    public function addNews(Request $request)
    {
      $imagemCapa = "";
      if($request->hasFile('imagemCapa') && $request->file('imagemCapa')->isValid()) {
          $ext = strtolower(request()->imagemCapa->getClientOriginalExtension());

          if(!in_array($ext, array("jpg", "png", "jpeg", "gif", "bmp")))
              $validator->errors()->add("imagemcapa", "Formato de imagem inválido, utilize imagem jpg ou png");
          else {
              $imagemCapa = 'c' . time() . '.' . $ext;
              // $upload = $request->imagemCapa->storeAs('projects', 'abc.png');
              $thumbPath = storage_path('app/public/imagens/news/'.$imagemCapa);
              Image::configure(array('driver' => 'imagick'));
              $image = Image::make(request()->imagemCapa->path());
              $image->fit(120, 120)->save($thumbPath);
          }
      }

      News::create([
        'titulo'           => $request->titulo,
        'conteudo'         => $request->descricao,
        'visualizacao'     => '0',
        'destaque'         => $request->customRadio,
        'user_id'          => Auth::user()->id,
        'imagemCapa'       => $imagemCapa,
      ]);

      return redirect()->route('config_news');
    }
    public function editNews(Request $request)
    {
      $imagemCapa = "";
      if($request->hasFile('imagemCapa') && $request->file('imagemCapa')->isValid()) {
          $ext = strtolower(request()->imagemCapa->getClientOriginalExtension());

          if(!in_array($ext, array("jpg", "png", "jpeg", "gif", "bmp")))
              $validator->errors()->add("imagemcapa", "Formato de imagem inválido, utilize imagem jpg ou png");
          else {
              $imagemCapa = 'c' . time() . '.' . $ext;
              // $upload = $request->imagemCapa->storeAs('projects', 'abc.png');
              $thumbPath = storage_path('app/public/imagens/news/'.$imagemCapa);
              Image::configure(array('driver' => 'imagick'));
              $image = Image::make(request()->imagemCapa->path());
              $image->fit(120, 120)->save($thumbPath);
          }
          //deleta imagem
          $resultadoIMG = News::where('id','=',$request->id)->first()->imagemCapa;
          unlink('storage/imagens/news/'.$resultadoIMG);
          //atualiza
          $resultado = News::where('id','=',$request->id)
          ->update(['titulo' => $request->titulo, 'conteudo' => $request->descricao, 'destaque' => $request->customRadio, 'imagemCapa' => $imagemCapa,]);
      }else{
        //atualiza
        $resultado = News::where('id','=',$request->id)
        ->update(['titulo' => $request->titulo, 'conteudo' => $request->descricao, 'destaque' => $request->customRadio,]);
      }

      return redirect()->route('config_news');
    }
    public function deleteNews(Request $request){
      $nomeimagem = News::where('id','=',$request->idNews)->first()->imagemCapa;
      if($nomeimagem == ''){
        $resultado = News::where('id','ilike',$request->idNews)->delete();
      }else{
        unlink('storage/imagens/news/'.$nomeimagem);
        $resultado = News::where('id','ilike',$request->idNews)->delete();
      }
      return redirect()->route('config_news');
    }
}
