@extends('layouts.app')

@section('content')
	<div class="container">
		<h2 class="center">Editar Imóveis</h2>
		
		<div class="row">
			<nav>
			    <div class="nav-wrapper green">
			      <div class="col s12">
			        <a href="{{route('admin.principal')}}" class="breadcrumb">Início</a>
			        <a href="{{route('admin.imoveis')}}" class="breadcrumb">Lista de Imóveis</a>	
			        <a class="breadcrumb">Editar Imóvel</a>
			      </div>
			    </div>
			  </nav>
		</div>		
		<div class="row">
			<form action="{{route('admin.imoveis.atualizar',$registro->id)}}" method="post" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="_method" value="put">
				@include('admin.imoveis._form')

				<button class="btn blue">Atualizar</button>
			</form>
		</div>
	</div>
@endsection