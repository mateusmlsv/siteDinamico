@extends('layouts.app')

@section('content')
	
	<div class="container">
		<h2 class="center">Lista de Tipos</h2>
		
		<div class="row">
			<nav>
			    <div class="nav-wrapper green">
			      <div class="col s12">
			        <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
			        <a class="breadcrumb">Lista de Tipos</a>			        
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
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($registros as $registro)
						<tr>
							<td>{{ $registro->id }}</td>
							<td>{{ $registro->titulo }}</td>							
							<td>
								@can('tipo_editar')
								<a class="btn orange" href="{{route('admin.tipos.editar',$registro->id)}}"><i class="material-icons">edit</i></a>
								@endcan
								@can('tipo_deletar')
								<a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{route('admin.tipos.deletar',$registro->id)}}' }"><i class="material-icons">delete</i></a>
								@endcan
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		@can('tipo_adicionar')
		<div class="row">
			<a class="btn blue" href="{{ route('admin.tipos.adicionar') }}"><i class="material-icons">add</i></a>
		</div>
		@endcan
	</div>
@endsection