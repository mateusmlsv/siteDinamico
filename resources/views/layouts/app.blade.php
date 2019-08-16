<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" type="text/css" href="{{asset('lib/materialize/dist/css/materialize.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
 
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script src="{{asset('lib/materialize/dist/js/materialize.js')}}"></script>    

    <script src="{{asset('js/init.js')}}"></script>
</head>
<body>
    <div id="app">
        @include('layouts._admin._nav')

          <ul class="sidenav" id="mobile-demo">
            <li><a href="#">Home</a></li>                
          </ul>

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

        <footer class="page-footer blue">
      <div class="container">
        <div class="row">
          <div class="col l6 s12">
            <h5 class="white-text">SisAdmin</h5>  
            <p>Sistema de administração</p>          
          </div>
          <div class="col l4 offset-l2 s12">
            <h5 class="white-text">Site</h5>
            <ul>
              <li><a class="grey-text text-lighten-3" href="{{route('site.home')}}">Site</a></li>
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
    </div>
</body>
</html>
