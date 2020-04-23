<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
  protected $fillable = [ 'titulo','conteudo','tipo','visualizacao','destaque', 'user_id','imagemCapa'];

  public function user(){
    return $this->belongsTo('App\User');
  }
}
