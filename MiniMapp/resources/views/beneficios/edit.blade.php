
@extends('templates.default')

@section('breadcrumbs')
	<li>
		<a href="{{ URL::route('beneficios') }}">Lista de Beneficios</a>
	</li>
	<li>
		<a href="#">Editar Beneficio</a>
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

	<h2>Editar Beneficios</h2><hr />
	<div class="col-lg-7">
	{!! Form::open(array('role'=>'form', 'route'=>array('beneficio.update', $beneficios->id_beneficio), 'method'=>'put')) !!}
		<div class="form-group">
			<label >Nombre (*)</label>
			<input type="text" class="form-control" name="nombre" value="<?=$beneficios->nombre?>" maxlength="50">
		</div>
		<div class="form-group">
			<label >Codigo (*) </label>
			<input type="text" class="form-control" name="codigo" value="<?=$beneficios->codigo?>" maxlength="200">
		</div>
		<div class="form-group">
			<label >Descripción  (*) </label>
			<input type="text" class="form-control" name="descripcion" value="<?=$beneficios->descripcion?>" maxlength="255">
		</div>
		<div class="form-group">
			<label >Activo (*)</label>
			<select id="activo" name="activo" class="form-control">
				@if($beneficios->activo == '0')
					<option value="0"> - NO - </option>
					<option value="1"> - SI - </option>
					
				@else
					<option value="1"> - SI - </option>
					<option value="0"> - NO - </option>
					
				@endif
				
			</select>
		</div>
	
	
		<br />
		<p>(*) Campos obligatorios</p>
		<button type="submit" class="btn btn-success btn-sm">Editar Beneficio</button>
		<a href="{{ URL::route('beneficios') }}" class="btn btn-warning btn-sm">Volver a lista de Beneficios</a>



	{!! Form::close() !!}	
	</div>
@stop



