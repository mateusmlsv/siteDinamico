<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="{{ config('seo.descricao') }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" value="summary">

    <!-- Open Graph data -->    
    <meta property="og:tittle" content="{{ config('seo.titulo') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <meta property="og:description" content="">

    <link rel="stylesheet" type="text/css" href="{{asset('lib/materialize/dist/css/materialize.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>    

    <script src="{{asset('js/init.js')}}"></script>
</head>
<body>
    <div id="app">
        <header>
          @include('layouts._site._nav')
        </header>

        <main class="py-4">
            @if(Session::has('mensagem'))
                <div class="container">
                  <div class="row">
                    <div class="card {{ Session::get('mensagem')['class'] }}">
                      <div align="center" class="card-content">
                        {{ Session::get('mensagem')['msg'] }}
                      </div>
                    </div>
                  </div>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
    <footer class="page-footer blue">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">DevMedia</h5>
            <p class="grey-text text-lighten-4">Site Dinamico com Laravel e Materilize</p>
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Site</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="{{route('site.home')}}">Home</a></li>
              <li><a class="grey-text text-lighten-3" href="{{route('site.sobre')}}">Sobre</a></li>
              <li><a class="grey-text text-lighten-3" href="{{route('site.contato')}}">Contato</a></li>                  
            </ul>
          </div>
        </div>
      </div>
      <div class="footer-copyright">
        <div class="container">
        © 2019 Copyright Text
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
      </div>
    </footer>    
</body>
</html>
