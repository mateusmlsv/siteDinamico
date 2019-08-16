@extends('layouts.app')

@section('content')
	
	<div class="container">
		<h2 class="center">Galeria de imagens</h2>
		
		<div class="row">
			<nav>
			    <div class="nav-wrapper green">
			      <div class="col s12">
			        <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
			        <a href="{{route('admin.imoveis')}}" class="breadcrumb">Lista de imóveis</a>
			        <a class="breadcrumb">Galeria de imagens</a>			        
			      </div>
			    </div>
			  </nav>
		</div>		

		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Titulo</th>						
						<th>Descrição</th>						
						<th>Imagem</th>
						<th>Ordem</th>						
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($registros as $registro)
						<tr>
							<td>{{ $registro->id }}</td>
							<td>{{ $registro->titulo }}</td>							
							<td>{{ $registro->descricao }}</td>														
							<td><img width="100" src="{{asset($registro->imagem)}}"></td>							
							<td>{{ $registro->ordem }}</td>														
							<td>
								@can('galeria_editar')
								<a class="btn orange" href="{{route('admin.galerias.editar',$registro->id)}}"><i class="material-icons">edit</i></a>
								@endcan
								@can('galeria_deletar')
								<a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{route('admin.galerias.deletar',$registro->id)}}' }"><i class="material-icons">delete</i></a>
								@endcan
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@can('galeria_adicionar')
		<div class="row">
			<a class="btn blue" href="{{ route('admin.galerias.adicionar',$imovel->id) }}"><i class="material-icons">add</i></a>
		</div>
		@endcan
	</div>
@endsection