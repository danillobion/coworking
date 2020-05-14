<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
  protected $fillable = [ 'project_id','pessoa_id'];

  public function project(){
    return $this->belongsTo('App\Project');
  }
  public function pessoa(){
    return $this->belongsTo('App\Pessoa');
  }
}
