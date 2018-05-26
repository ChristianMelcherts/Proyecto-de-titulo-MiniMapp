
@extends('templates.default')

@section('breadcrumbs')
	<li>
		<a href="{{ URL::route('usuarios') }}">Lista de Usuarios</a>
	</li>
	<li>
		<a href="#">Editar Coordenadas</a>
	</li>
@stop


@section('content')
	@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				{{ implode('',$errors->all(':message')) }}
			</ul>
		</div>
	@endif

	<h2>Editar Coordenadas</h2><hr />
	<div class="col-lg-7">
	{!! Form::open(array('role'=>'form', 'route'=>array('mapa.update', $localizacion->id_localizacion), 'method'=>'put')) !!}

	
		
		<div class="form-group">
			<label >Latitud </label>
			<input type="text" class="form-control" name="latitud" value="<?=$localizacion->latitud?>" maxlength="15">
			
		</div>
		<div class="form-group">
			<label >Longitud </label>
			<input type="text" class="form-control" name="longitud" value="<?=$localizacion->longitud?>" maxlength="15">
		</div>

		
		
		<br />
		<p>(*) Campos obligatorios</p>
		<button type="submit" class="btn btn-success btn-sm">Editar Coordenadas</button>
		<a  class="btn btn-warning btn-sm" href="{{ URL::route('usuario.edit', $localizacion->id_usuarios) }}"> Regresar al Usuario </a>
						
					




	{!! Form::close() !!}	
	</div>
@stop



