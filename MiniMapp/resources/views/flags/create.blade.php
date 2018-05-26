<?

?>
@extends('templates.default')

@section('breadcrumbs')
	<li>
		<a href="{{ URL::route('flags') }}">Lista de Flags</a>
	</li>
	<li>
		<a href="#">Agregar Flag</a>
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

	<h2>Agregar Flag</h2><hr />
	<div class="col-lg-7">
	{!! Form::open(array('role'=>'form', 'route'=>array('flag.store'))) !!}

	
		
		<div class="form-group">
			<label >Nombre (*)</label>
			<input type="text" class="form-control" name="flag" maxlength="50">
		</div>
		<div class="form-group">
			<label >Descripción </label>
			<input type="text" class="form-control" name="descripcion" maxlength="200">
		</div>
		<div class="form-group">
			<label >Activo (*)</label>
			<select id="bo_enviar_sms" name="activo" class="form-control">
				<option value="1"> - SI - </option>
				<option value="0"> - NO - </option>
			</select>
		</div>

		
		
		<br />
		<p>(*) Campos obligatorios</p>
		<button type="submit" class="btn btn-success btn-sm">Ingresar Flag</button>
	
		<a href="flags" class="btn btn-warning btn-sm">Volver a lista de Flags</a>



	{!! Form::close() !!}	
	</div>
@stop



