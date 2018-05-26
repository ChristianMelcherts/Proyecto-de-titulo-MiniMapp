
@extends('templates.default')

@section('breadcrumbs')
	<li>
		<a href="{{ URL::route('usuarios') }}">Lista de Usuarios</a>
	</li>
	<li>
		<a href="#">Agregar Usuario</a>
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

	<h2>Agregar Usuarios</h2><hr />
	<div class="col-lg-7">
	{!! Form::open(array('role'=>'form', 'route'=>array('usuario.store'))) !!}

	
		
		<div class="form-group">
			<label >Nombre (*)</label>
			<input type="text" class="form-control" name="nombre" maxlength="40">
		</div>
		<div class="form-group">
			<label >LogIn (*)</label>
			<input type="text" class="form-control" name="login" maxlength="40">
		</div>
		<div class="form-group">
			<label >Correo (*)</label>
			<input type="text" class="form-control" name="correo"  maxlength="60">
		</div>
		
		<div class="form-group">
			<label >Tipo de usuario (*)</label>
			<select id="id_roll" name="id_roll" class="form-control">
				<option > - Seleccione Tipo de usuario- </option>
			@foreach ($Roll as $roll)
					<option value="<?=$roll->id_roll?>"><?=$roll->nombre ?></option>
			@endforeach
			</select>
			
		</div>
		<div class="form-group">
			<label >Password (*) </label>
			<input type="password" class="form-control" name="password1" maxlength="255">
		</div>
		<div class="form-group">
			<label >Confirmar Password (*) </label>
			<input type="password" class="form-control" name="password2" maxlength="255">
		</div>
		<div class="form-group">
			<label >Usuario Activo (*)</label>
			<select id="activo" name="activo" class="form-control">
				<option value="1">SI</option>
				<option value="0">NO</option>
		
			</select>
			
		</div>

		
		<br />
		<p>(*) Campos obligatorios</p>
		<button type="submit" class="btn btn-success btn-sm">Ingresar Usuario</button>
		<a href="{{ URL::route('usuarios') }}" class="btn btn-warning btn-sm">Volver a lista de Usuarios</a>



	{!! Form::close() !!}	
	</div>
@stop



