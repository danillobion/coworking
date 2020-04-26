@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 titulo2" style="margin-bottom:1rem">News</div>
      <div class="col-md-10"  style="margin-bottom:1rem;">
        <div class="row" style="margin-bottom:2rem;">
          <div class="col-md-12 titulo_card" style="text-align: left; margin-bottom:5px;">{{$newsDetail->titulo}}</div>
          <div class="col-md-12" style="text-align: left;">
            <div class="row justify-content-left">
              <?php
                $dataehora = explode(" ", $newsDetail->created_at);
                $data = $dataehora[0];
              ?>
              <div class="col-md-2 titulo2" style="font-size:15px;">{{$data}}</div>
              <div class="col-md-1 titulo2" style="font-size:15px;">{{$newsDetail->visualizacao}}</div>
            </div>
          </div>
          <div class="col-md-6 detalhe_card" style="text-align: justify;">{{$newsDetail->conteudo}}</div>
          <div class="col-md-5" style="text-align:left">
            @if(isset($newsDetail->imagemCapa) && $newsDetail->imagemCapa!="")
            <td><img src="{{asset('storage/imagens/news/' . $newsDetail->imagemCapa)}}" alt="..." width="200px;" style="border-radius: 15px;"></td>
            @endif
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
