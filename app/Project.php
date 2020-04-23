<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [ 'titulo','conteudo','tipo','visualizacao','coordenador', 'user_id','imagemCapa'];

    public function user(){
      return $this->belongsTo('App\User');
    }


}
