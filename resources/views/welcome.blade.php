@extends('layouts.app')

@section('content')

<!-- <div class="container"> -->
  <div class="row" style="margin-top:-2rem;">
    <div class="col-md-12" style="margin-left:0px; margin-right:0px; margin-bottom:5px;"></div
    <div class="col-md-12">
      <div class="container">
        <div class="row justify-content-center" style="text-align:center; margin-top:-1rem; margin-bottom:1rem;">
          <div class="col-md-12 titulo" style="font-size:27px;">{{$allHome->titulo1}}</div>
          <div class="col-md-12 paragrafo">{{$allHome->subtitulo1}}</div>
          <div class="col-md-12">
            <div class="row justify-content-center" style="text-align:center; margin-top:2rem;">
              <div class="col-md-4" style="margin-top:1rem;">
                @if(isset($allHome->imagemCapa1) && $allHome->imagemCapa1 !="imagemHomeDefault1.png")
                  <img class="styleImgPrincipal" src="{{asset('storage/imagens/home/' . $allHome->imagemCapa1)}}" alt="..."style="border-radius: 33px;">
                @else
                  <img class="styleImgPrincipal" src="{{asset('imagens/img1.png')}}" alt="...">
                @endif
              </div>
              <div class="col-md-1"> </div>
              <div class="col-md-6 paragrafo">
                <p class="paragrafo_tipo2">{!! $allHome->texto !!}
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-12 titulo" style="margin-top:2rem;">
            <div class="row justify-content-center">
              <div class="col-md-12">
                <label style="font-size:27px; margin-bottom:-1rem;">{!! $allHome->titulo2 !!}</label>
              </div>
              <div class="col-md-12 paragrafo" style="font-weight:normal">{!! $allHome->subtitulo2 !!}</div>
            </div>
          </div>
          <div class="col-md-12" style="margin-top:2rem; margin-bottom:2rem;">
            <div class="row justify-content-center">
              <div class="col-md-4">
                <div class="row justify-content-center">
                  <div class="col-md-12">
                    <!-- <img src="{{asset('imagens/img2.png')}}" alt="..." width="250px"> -->
                    @if(isset($allHome->imagemCapa2) && $allHome->imagemCapa2 !="imagemHomeDefault2.png")
                      <img class="styleImgPrincipalTrio" src="{{asset('storage/imagens/home/' . $allHome->imagemCapa2)}}" alt="..." style="border-radius: 33px;">
                    @else
                      <img class="styleImgPrincipalTrio" src="{{asset('imagens/img2.png')}}" alt="...">
                    @endif
                  </div>
                  <div class="col-md-12 titulo">
                    {!! $allHome->titulo3 !!}
                  </div>
                  <div class="col-md-12 paragrafo" style="margin-top:0.5rem;">
                    {!! $allHome->legenda1 !!}
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row justify-content-center">
                  <div class="col">
                    <!-- <img src="{{asset('imagens/img3.png')}}" alt="..." width="250px"> -->
                    @if(isset($allHome->imagemCapa3) && $allHome->imagemCapa3 !="imagemHomeDefault3.png")
                      <img class="styleImgPrincipalTrio" src="{{asset('storage/imagens/home/' . $allHome->imagemCapa3)}}" alt="..." style="border-radius: 33px;">
                    @else
                      <img class="styleImgPrincipalTrio" src="{{asset('imagens/img3.png')}}" alt="...">
                    @endif
                  </div>
                  <div class="col-md-12 titulo">
                    {!! $allHome->titulo4 !!}
                  </div>
                  <div class="col-md-12 paragrafo" style="margin-top:0.5rem;">
                      {!! $allHome->legenda2 !!}
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="row justify-content-center">
                  <div class="col">
                    <!-- <img src="{{asset('imagens/img4.png')}}" alt="..." width="250px"> -->
                    @if(isset($allHome->imagemCapa4) && $allHome->imagemCapa4 !="imagemHomeDefault4.png")
                      <img class="styleImgPrincipalTrio" src="{{asset('storage/imagens/home/' . $allHome->imagemCapa4)}}" alt="..." style="border-radius: 33px;">
                    @else
                      <img class="styleImgPrincipalTrio" src="{{asset('imagens/img4.png')}}" alt="..." >
                    @endif
                  </div>
                  <div class="col-md-12 titulo">
                    {!! $allHome->titulo5 !!}
                  </div>
                  <div class="col-md-12 paragrafo" style="margin-top:0.5rem;">
                      {!! $allHome->legenda3 !!}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

  </div>
<!-- </div> -->


@endsection
