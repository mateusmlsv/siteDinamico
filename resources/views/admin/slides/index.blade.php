@extends('layouts.app')

@section('content')
	
	<div class="container">
		<h2 class="center">Lista de Slides</h2>
		
		<div class="row">
			<nav>
			    <div class="nav-wrapper green">
			      <div class="col s12">
			        <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>			        
			        <a class="breadcrumb">Lista de Slides</a>			        
			      </div>
			    </div>
			  </nav>
		</div>		

		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Ordem</th>
						<th>Titulo</th>						
						<th>Descrição</th>						
						<th>Publicado</th>						
						<th>Imagem</th>											
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($registros as $registro)
						<tr>
							<td>{{ $registro->ordem }}</td>
							<td>{{ $registro->titulo }}</td>							
							<td>{{ $registro->descricao }}</td>														
							<td>{{ $registro->publicado }}</td>														
							<td><img width="100" src="{{asset($registro->imagem)}}"></td>							
							<td>
								@can('slide_editar')
								<a class="btn orange" href="{{route('admin.slides.editar',$registro->id)}}"><i class="material-icons">edit</i></a>
								@endcan
								@can('slide_deletar')
								<a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{route('admin.slides.deletar',$registro->id)}}' }"><i class="material-icons">delete</i></a>
								@endcan
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@can('slide_adicionar')
		<div class="row">
			<a class="btn blue" href="{{ route('admin.slides.adicionar') }}"><i class="material-icons">add</i></a>
		</div>
		@endcan
	</div>
@endsection