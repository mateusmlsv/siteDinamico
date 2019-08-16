@extends('layouts.app')

@section('content')
	<div class="container">
		<h2 class="center">Admin</h2>		
		<div class="row">
			<div class="col s12 m4">
				@can('imovel_listar')
				<div class="card green darken-1">
					<div class="card-content white-text">
						<span class="card-tittle">Imóveis</span>
						<p>Lista de imóveis</p>
					</div>
					<div class="card-action">
						<a class="white-text" href="{{route('admin.imoveis')}}">Acessar</a>
					</div>
				</div>
				@endcan
			</div>

			<div class="col s12 m4">
				@can('tipo_listar')
				<div class="card blue darken-1">
					<div class="card-content white-text">
						<span class="card-tittle">Tipos</span>
						<p>Lista de Tipos</p>
					</div>
					<div class="card-action">
						<a class="white-text" href="{{route('admin.tipos')}}">Acessar</a>
					</div>
				</div>
				@endcan
			</div>

			<div class="col s12 m4">
				@can('cidade_listar')
				<div class="card red darken-1">
					<div class="card-content white-text">
						<span class="card-tittle">Cidades</span>
						<p>Lista de Cidades</p>
					</div>
					<div class="card-action">
						<a class="white-text" href="{{route('admin.cidades')}}">Acessar</a>
					</div>
				</div>
				@endcan
			</div>
		</div>
		<div class="row">
			<div class="col s12 m6">
				@can('slide_listar')
				<div class="card grey darken-1">
					<div class="card-content white-text">
						<span class="card-tittle">Slides</span>
						<p>Lista de Slides</p>
					</div>
					<div class="card-action">
						<a class="white-text" href="{{route('admin.slides')}}">Acessar</a>
					</div>
				</div>
				@endcan
			</div>

			<div class="col s12 m6">
				@can('usuario_listar')
				<div class="card orange darken-1">
					<div class="card-content white-text">
						<span class="card-tittle">Usuários</span>
						<p>Lista de Usuários</p>
					</div>
					<div class="card-action">
						<a class="white-text" href="{{route('admin.usuarios')}}">Acessar</a>
					</div>
				</div>
				@endcan
			</div>			
		</div>
		<div class="row">
			<div class="col s12 m6">
				@can('papel_listar')
				<div class="card teal darken-2">
					<div class="card-content white-text">
						<span class="card-tittle">Papel</span>
						<p>Lista de Papeis</p>
					</div>
					<div class="card-action">
						<a class="white-text" href="{{route('admin.papel')}}">Acessar</a>
					</div>
				</div>
				@endcan
			</div>

			<div class="col s12 m6">
				@can('pagina_listar')
				<div class="card brown darken-3">
					<div class="card-content white-text">
						<span class="card-tittle">Páginas</span>
						<p>Lista de Páginas</p>
					</div>
					<div class="card-action">
						<a class="white-text" href="{{route('admin.paginas')}}">Acessar</a>
					</div>
				</div>
				@endcan
			</div>
		</div>
	</div>
@endsection