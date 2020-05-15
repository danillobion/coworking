@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 titulo2" style="text-align: center; margin-bottom:1rem">News</div>
      <div class="col-md-10"  style="margin-bottom:1rem;">
        <div class="row" style="margin-bottom:2rem;">
          <div class="col-md-12 titulo_card" style="text-align: left; margin-bottom:5px;">{{$newsDetail->titulo}}</div>
          <div class="col-md-12" style="text-align: left;">
            <div class="row justify-content-left">
              <div class="col-md-2 titulo2" style="font-size:15px;">{{$newsDetail->created_at->format('d-m-Y')}}</div>
              <div class="col-md-1 titulo2" style="font-size:15px;">Views:{{$newsDetail->visualizacao}}</div>
            </div>
          </div>
          <label class="col-md-7 detalhe_card">
              <p>{!! $newsDetail->conteudo !!}</p>
          </label>
          <div class="col-md-5" style="text-align:left">
            @if(isset($newsDetail->imagemCapa) && $newsDetail->imagemCapa!="")
            <td><img src="{{asset('storage/imagens/news/' . $newsDetail->imagemCapa)}}" alt="..." width="270px;" style="border-radius: 15px;"></td>
            @endif
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
