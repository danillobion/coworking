@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-bottom:6.5rem;">
      <div class="col-md-8 titulo2" style="margin-bottom:1rem; margin-top:-1rem; text-align:center;">Contato</div>
      <div class="col-md-6">
        <div class="row">
          <div class="col-md-12">
            <p style="font-size:20px; font-weight:bold;">Endereço</p>
          </div>
          <div class="col-md-12">
            <p>Av. Bom Pastor, s/n - Boa Vista, Garanhuns - PE, 55292-270</p>
          </div>
          <div class="col-md-12">
            <p style="font-size:20px; font-weight:bold;">E-mail</p>
          </div>
          <div class="col-md-12">
            <p>coordenacao.bcc.uag@ufrpe.br</p>
          </div>
          <div class="col-md-12">
            <p style="font-size:20px; font-weight:bold;">Redes Sociais</p>
          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12" style="margin-top:5px; margin-bottom:5px;">
                <a href="https://www.instagram.com/bccufape/" target="tab" style="text-decoration:none; color:black">
                  <img src="{{asset('imagens/logo_instagram_preto.svg')}}" alt="..." style="width:35px"> Instagram
                </a>
              </div>
              <div class="col-md-12" style="margin-top:5px; margin-bottom:5px;">
                <a href="https://www.facebook.com/bccufape" target="tab" style="text-decoration:none; color:black">
                  <img src="{{asset('imagens/facebook_preto_logo.png')}}" alt="..." style="width:35px"> Facebook
                </a>
              </div>
              <div class="col-md-12" style="margin-top:5px; margin-bottom:5px;">
                <a href="https://www.youtube.com/bccufape" target="tab" style="text-decoration:none; color:black">
                  <img src="{{asset('imagens/logo_youtube_preto.svg')}}" alt="..." style="width:35px"> Youtube
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <a href="https://www.google.com/maps/place/UFAPE+-+Universidade+Federal+do+Agreste+de+Pernambuco/@-8.9067588,-36.4943075,15z/data=!4m5!3m4!1s0x0:0x9e8a2fd11fab3580!8m2!3d-8.9067588!4d-36.4943075" target="tab">
              <img src="{{asset('imagens/mapa.png')}}" alt="..." style="border-radius: 15px; width:420px">
            </a>
          </div>
          <div class="col-md-12" style="text-align:center;">
            <span>Clique na imagem para acessar o site Google Maps</span>
          </div>
        </div>
      </div>

    </div>
</div>
@endsection
