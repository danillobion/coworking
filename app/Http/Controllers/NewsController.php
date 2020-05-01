<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\News;
use Intervention\Image\ImageManagerStatic as Image;
use \Crypt;
use DB;

class NewsController extends Controller
{
    public function addNews(Request $request){

      $this->validate($request,[
          'titulo'                => 'required|min:3|max:1000',
          'descricao'             => 'required|min:3|max:10000',
          'imagemCapa'            => 'required',
      ]);

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
          News::create([
            'titulo'           => $request->titulo,
            'conteudo'         => $request->descricao,
            'visualizacao'     => '0',
            'destaque'         => $request->customRadio,
            'user_id'          => Auth::user()->id,
            'imagemCapa'       => $imagemCapa,
          ]);

          return redirect()->route('config_news')->with('sucesso', 'News cadastrada com sucesso!');
      }else{
        return redirect()->route('config_news')->with('atencao', 'Verifique os campos e tente novamente!');;
      }

    }
    public function editNews(Request $request){
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

      return redirect()->route('config_news')->with('sucesso', 'News atualizada com sucesso!');
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
    public function allNews(){
      $resultado = News::orderBy('created_at', 'desc')->where('destaque','=', false)->paginate(10);
      $resultadoDestaque = News::where('destaque','=',true)->first();
      return view('news', ['allNews' => $resultado, 'destaqueNews'=>$resultadoDestaque]);
    }
    public function showNews(Request $request){
      // dd($request);
      $resultado = News::get();
      //atualizar o numero de views
      if(Auth::user() == null){
        DB::table('news')->where('id','=',$request->idNews)->increment('visualizacao',1);
      }
      //mostrar news
      $resultado = News::where('id','=',$request->idNews)->first();
      return view('newsDetail', ['newsDetail' => $resultado]);
    }
    public function destaqueNews(Request $request){
      if($request->value == 0){
        //verifica se tem algum true e entao muda para false
        News::where('destaque','=',true)->update(['destaque'=>false]);
        //alterar uma news especifica para true
        News::where('id','=',$request->idNews)->update(['destaque'=>true]);
      }else{
        //alterar uma news especifica para false
        News::where('id','=',$request->idNews)->update(['destaque'=>false]);
      }
      return redirect()->route('config_news')->with('sucesso', 'News atualizada com sucesso!');
    }
}
