@if(isset($registro->imagem))

<div class="input-field">
	<input type="text" name="titulo" class="validate" value="{{ isset($registro->titulo)? $registro->titulo : '' }}">
	<label>Título</label>
</div>
<div class="input-field">
	<input type="text" name="descricao" class="validate" value="{{ isset($registro->descricao)? $registro->descricao : '' }}">
	<label>Descrição</label>
</div>
<div class="input-field">
	<input type="text" name="link" class="validate" value="{{ isset($registro->link)? $registro->link : '' }}">
	<label>Link</label>
</div>
<div class="input-field">
	<input type="text" name="ordem" class="validate" value="{{ isset($registro->ordem)? $registro->ordem : '' }}">
	<label>Ordem</label>
</div>
<div class="input-field">
	<select name="publicado">
		
		<option value="nao" {{isset($registro->publicado) && $registro->publicado == 'nao' ? 'selected' : ''}}>Não</option>
		<option value="sim" {{isset($registro->publicado) && $registro->publicado == 'sim' ? 'selected' : ''}}>Sim</option>
	</select>
	<label>Publicar?</label>
</div>
<div class="row">
	<div class="file-field input-field col m6 s12">
		<div class="btn">
			<span><i class="material-icons">image</i></span>
			<input type="file" name="imagem">			
		</div>
		<div class="file-path-wrapper">
			<input type="text" class="file-path validate">
		</div>
	</div>
	<div class="col m6 s12">	
		<img width="120" src="{{asset($registro->imagem)}}">	
	</div>
</div>

@else

<div class="row">
	<div class="file-field input-field col m12 s12">
		<div class="btn">
			<span><i class="material-icons">image</i></span>
			<input type="file" multiple name="imagens[]">			
		</div>
		<div class="file-path-wrapper">
			<input type="text" class="file-path validate">
		</div>
	</div>	
</div>

@endif