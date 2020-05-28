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
        plugins: 'link image lists',
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
                    <a class="menuPrincipal_tagA" href="{{ route('all_news') }}">News</a>
                  </div>
                  <div class="col-md-1">
                    <a class="menuPrincipal_tagA" href="{{ route('all_pessoa') }}">Pessoas</a>
                  </div>
                  <div class="col-md-1">
                    <a class="menuPrincipal_tagA" href="{{ route('all_project') }}">Projetos</a>
                  </div>
                  <div class="col-md-1">
                    <a class="menuPrincipal_tagA" href="{{ route('portfolio') }}">Portfólio</a>
                  </div>
                  <div class="col-md-1">
                    <a class="menuPrincipal_tagA" href="{{ route('midia') }}">Mídia</a>
                  </div>
                  <div class="col-md-1">
                    <a class="menuPrincipal_tagA" href="{{ route('contato') }}">Contato</a>
                  </div>
                </div>
              </div>

              @guest
              @else
                <!-- menu secundario -->
                <div class="col-md-12 menuTerciario">
                  <div class="row justify-content-center">
                    <div class="col-md-1">
                    <a class="nav-link" href="{{ route('config_home') }}" style="color:white;">Home <span class="sr-only">(current)</span></a>
                    </div>
                    <div class="col-md-1">
                      <a class="nav-link" href="{{ route('config_project') }}" style="color:white;">Projetos</a>
                    </div>
                    <div class="col-md-1">
                        <a class="nav-link" href="{{ route('config_news') }}" style="color:white;">News</a>
                    </div>
                    <div class="col-md-1">
                        <a class="nav-link" href="{{ route('config_pessoa') }}" style="color:white;">Pessoas</a>
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
        <div class="rodape" style="width:100%; bottom: 0;">
          <div class="container">
            <div class="row justify-content-center" style="text-align:center; margin-top:0.5rem;">
              <div class="col-md-4">
                <img src="{{asset('imagens/logo_bcc_rodape3.png')}}" alt="..." width="230px">
              </div>
              <div class="col-md-4" style="margin-top:0rem;">
                <img src="{{asset('imagens/ufape_logo.png')}}" alt="..." width="160px">
              </div>
              <div class="col-md-4" style="color:white; margin-top:0.9rem;">
                <div class="row justify-content-center">
                  <div class="col-md-2">
                    <a href="https://www.instagram.com/bccufape/" target="tab" style="text-decoration:none;">
                      <img src="{{asset('imagens/instagram_logo.png')}}" alt="..." width="32px" style="margin:5px;">
                    </a>
                  </div>
                  <div class="col-md-2">
                    <a href="https://www.facebook.com/bccufape" target="tab" style="text-decoration:none;">
                      <img src="{{asset('imagens/facebook_logo.png')}}" alt="..." width="32px" style="margin:5px;">
                    </a>
                  </div>
                  <div class="col-md-2">
                    <a href="https://www.youtube.com/bccufape" target="tab" style="text-decoration:none;">
                      <img src="{{asset('imagens/youtube_logo.png')}}" alt="..." width="42px" style="margin:5px;">
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</body>
</html>
