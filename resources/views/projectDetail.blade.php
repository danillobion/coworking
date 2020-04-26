@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 titulo2" style="margin-bottom:1rem">Projeto</div>
      <div class="col-md-10"  style="margin-bottom:1rem;">
        <div class="row" style="margin-bottom:2rem;">
          <div class="col-md-12 titulo_card" style="text-align: left; margin-bottom:5px; font-size:25px">{{$projectDetail->titulo}}</div>
          <div class="col-md-12" style="text-align: left;">
            <div class="row justify-content-left">
              <?php
                $dataehora = explode(" ", $projectDetail->created_at);
                $data = $dataehora[0];
              ?>
              <div class="col-md-2 titulo2" style="font-size:15px;">{{$data}}</div>
              <div class="col-md-1 titulo2" style="font-size:15px;">{{$projectDetail->visualizacao}}</div>
              <div class="col-md-4 titulo2" style="font-size:15px;">Coordenador(a): {{$projectDetail->coordenador}}</div>
              <div class="col-md-4 titulo2" style="font-size:15px;">{{$projectDetail->tipo}}</div>
            </div>
          </div>
          <div class="col-md-7 detalhe_card" style="text-align: justify;">{{$projectDetail->conteudo}}</div>
          <div class="col-md-5" style="text-align:left">
            @if(isset($projectDetail->imagemCapa) && $projectDetail->imagemCapa!="")
            <td><img src="{{asset('storage/imagens/projects/' . $projectDetail->imagemCapa)}}" alt="..." width="200px;" style="border-radius: 15px;"></td>
            @endif
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
