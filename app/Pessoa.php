<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
  protected $fillable = [ 'nome','tipo','area','lattes','imagemCapa','user_id'];

  public function user(){
    return $this->belongsTo('App\User');
  }
  public function coordenador(){
    return $this->belongsTo('App\Coordenador');
  }
}
