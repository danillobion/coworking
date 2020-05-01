<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- editor de texto -->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
      tinymce.init({
        selector:'textarea',
        plugins: 'link',
        menubar: false,
      });
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar-expand-md shadow-sm menuPrincipal">
            <div class="row ">
              <!-- logo -->
              <div class="col-md-12" style="color:white; margin-top:10px; margin-bottom: 10px;">
                  <a href="{{ route('home') }}"><img src="{{asset('imagens/coworking_logo_pequena.png')}}" alt="..."></a>
              </div>
              <!-- menu principal -->
              <div class="col-md-12 menuSecundario">
                <div class="row justify-content-center">
                  <div class="col-md-1">
                    <a class="menuPrincipal_tagA" href="{{ route('all_project') }}">Projetos</a>
                  </div>
                  <div class="col-md-1">
                    <a class="menuPrincipal_tagA" href="{{ route('all_news') }}">News</a>
                  </div>
                  <div class="col-md-1">
                    <a class="menuPrincipal_tagA" href="#ancora">Contato</a>
                  </div>
                </div>
              </div>

              @guest
              @else
                <!-- menu secundario -->
                <div class="col-md-12 menuTerciario">
                  <div class="row justify-content-center">
                    <!-- <div class="col-md-1">
                    <a class="nav-link" href="{{ route('config_home') }}">Página Inicial <span class="sr-only">(current)</span></a>
                    </div> -->
                    <div class="col-md-1">
                      <a class="nav-link" href="{{ route('config_project') }}" style="color:white;">Projetos</a>
                    </div>
                    <div class="col-md-1">
                        <a class="nav-link" href="{{ route('config_news') }}" style="color:white;">News</a>
                    </div>
                    <div class="col-md-1">
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                      <a class="nav-link" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();" style="color:white;">
                          {{ __('Logout') }}
                      </a>
                    </div>
                  </div>
                </div>
                @endguest
            </div>
        </nav>
        <div id="app" style="margin:2rem; text-align:center;">
          @include('flash-message')
          @yield('contente')
        </div>
        <div style="padding-top: 2rem; ">
            @yield('content')
        </div>
        <div class="rodape" style="width:100%; bottom: 0;" id="ancora">
          <div class="container">
            <div class="row justify-content-center" style="text-align:center;">
              <div class="col-md-4">
                <img src="{{asset('imagens/coworking_logo_grande.png')}}" alt="..." width="150px">
              </div>
              <div class="col-md-4" style="margin-top:1rem;">
                <img src="{{asset('imagens/ufape_logo.png')}}" alt="..." width="200px">
              </div>
              <div class="col-md-4" style="color:white;">
                <div class="row justify-content-center">
                  <div class="col-md-12" style="margin:5px; margin-bottom:-10px;"><p style="font-size:17px; font-family:arial;">Redes Sociais</p></div>
                  <div class="col-md-2"><img src="{{asset('imagens/instagram_logo.png')}}" alt="..." width="35px" style="margin:5px;"></div>
                  <div class="col-md-2"><img src="{{asset('imagens/twitter_logo.png')}}" alt="..." width="37px" style="margin:5px;"></div>
                  <div class="col-md-2"><img src="{{asset('imagens/youtube_logo.png')}}" alt="..." width="40px" style="margin:5px;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>
