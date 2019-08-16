@extends('layouts.app')

@section('content')
	
	<div class="container">
		<h2 class="center">Lista de Usuários</h2>
		
		<div class="row">
			<nav>
			    <div class="nav-wrapper green">
			      <div class="col s12">
			        <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
			        <a class="breadcrumb">Lista de Usuários</a>			        
			      </div>
			    </div>
			  </nav>
		</div>		

		<div class="row">
			<table>
				<thead>
					<tr>
						<th>Id</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($usuarios as $usuario)
						<tr>
							<td>{{ $usuario->id }}</td>
							<td>{{ $usuario->name }}</td>
							<td>{{ $usuario->email }}</td>
							<td>
								@can('usuario_editar')
								<a class="btn blue" href="{{route('admin.usuarios.papel',$usuario->id)}}"><i class="material-icons">vpn_key</i></a>
								<a class="btn orange" href="{{route('admin.usuarios.editar',$usuario->id)}}"><i class="material-icons">edit</i></a>
								@endcan
								@can('usuario_deletar')
								<a class="btn red" href="javascript: if(confirm('Deletar esse registro?')){ window.location.href = '{{route('admin.usuarios.deletar',$usuario->id)}}' }"><i class="material-icons">delete</i></a>
								@endcan
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<div class="row">
			<a class="btn blue" href="{{ route('admin.usuarios.adicionar') }}"><i class="material-icons">add</i></a>
		</div>
	</div>
@endsection