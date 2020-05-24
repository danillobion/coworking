<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configpaginainicial extends Model
{
    protected $fillable = [ 'titulo1','subtitulo1', 'texto', 'titulo2', 'legenda1', 'titulo3', 'legenda2', 'titulo4', 'legenda3', 'imagemCapa1', 'imagemCapa2', 'imagemCapa3', 'imagemCapa4'];
}
