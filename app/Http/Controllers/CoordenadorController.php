<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Coordenador;

class CoordenadorController extends Controller
{
  public function addCoordenador(Request $request){
    // dd($request);
      $resultado = Coordenador::where('project_id','=',$request->idProjeto)->where('pessoa_id','=',$request->idCoordenador)->exists();
      if($resultado == false){
        Coordenador::create([
          'project_id'       =>$request->idProjeto,
          'pessoa_id'        =>$request->idCoordenador,
        ]);
      }
      return back()->withInput();
  }
  public function deleteCoordenador(Request $request){
    Coordenador::where('project_id','=',$request->idProjeto)->where('pessoa_id','=',$request->idDocente)->delete();
    return back()->withInput();
  }
}
