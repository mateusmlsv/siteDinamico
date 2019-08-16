<nav>
  <div class="nav-wrapper blue">
    <div class="container">
        <a href="{{route('admin.principal')}}" class="brand-logo">SisAdmin</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
          	<li><a href="{{route('admin.principal')}}">Início</a></li>
          	<li><a target="_blanck" href="{{route('site.home')}}">Site</a></li>
          @auth          
          <a class='dropdown-trigger btn blue' href='#' data-target='dropdown1'>{{ Auth::user()->name }}<i class="material-icons">arrow_drop_down</i></a>

          <ul id='dropdown1' class='dropdown-content'>
            <li><a href="#">{{ Auth::user()->name }}</a></li>
            @can('imovel_listar')
            <li><a href="{{ route('admin.imoveis') }}">Imóveis</a></li>
            @endcan
            @can('tipo_listar')
            <li><a href="{{ route('admin.tipos') }}">Tipos</a></li>
            @endcan
            @can('cidade_listar')
            <li><a href="{{ route('admin.cidades') }}">Cidades</a></li>
            @endcan
            @can('slide_listar')
            <li><a href="{{ route('admin.slides') }}">Slides</a></li>
            @endcan
            @can('usuario_listar')
            <li><a href="{{ route('admin.usuarios') }}">Usuários</a></li>
            @endcan
            @can('papel_listar')
            <li><a href="{{ route('admin.papel') }}">Papel</a></li>
            @endcan
            @can('pagina_listar')
            <li><a href="{{ route('admin.paginas')}}">Páginas</a></li>            
            @endcan
          </ul>

          <li><a href="{{ route('admin.login.sair') }}">Sair</a></li>
          @endauth
          @guest
          	<li><a href="{{route('admin.login')}}">Login</a></li>
          @endguest
        </ul>
    </div>
  </div>
</nav>