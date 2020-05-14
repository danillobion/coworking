<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Membro;

class MembroController extends Controller
{
  public function addMembro(Request $request){
    // dd($request);
    $resultado = Membro::where('project_id','=',$request->idProjeto)->where('pessoa_id','=',$request->idMembro)->exists();
    if($resultado == false){
      Membro::create([
        'project_id'       =>$request->idProjeto,
        'pessoa_id'        =>$request->idMembro,
      ]);
    }
    return back()->withInput();
  }
  public function deleteMembro(Request $request){
    // dd($request);
    Membro::where('project_id','=',$request->idProjeto)->where('pessoa_id','=',$request->idPessoa)->delete();
    return back()->withInput();
  }
}
