
@extends('templates.default')

@section('breadcrumbs')
	<li>
		<a href="{{ URL::route('flags') }}">Lista de Flags</a>
	</li>
	<li>
		<a href="#">Editar Flags</a>
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

	<h2>Editar Flag</h2><hr />
	<div class="col-lg-7">
	{!! Form::open(array('role'=>'form', 'route'=>array('flag.update', $flag->id_flags), 'method'=>'put')) !!}

	
		
		<div class="form-group">
			<label >Flag (*)</label>
			<input type="text" class="form-control" name="flag" value="<?=$flag->flag?>" maxlength="40">
			
		</div>
		<div class="form-group">
			<label >Descripcion </label>
			<input type="text" class="form-control" name="descripcion" value="<?=$flag->descripcion?>" maxlength="255">
		</div>
		<div class="form-group">
			<label >Activo (*)</label>
			<select id="activo" name="activo" class="form-control">
				@if($flag->activo == '1')
					<option value="1">SI</option>
					<option value="0">NO</option>
				@else
					<option value="0">NO</option>
					<option value="1">SI</option>
					
				@endif

			</select>
		</div>

		
		
		<br />
		<p>(*) Campos obligatorios</p>
		<button type="submit" class="btn btn-success btn-sm">Editar Flag</button>
		<a href="flags" class="btn btn-warning btn-sm">Volver a lista de Flags</a>




	{!! Form::close() !!}	
	</div>
@stop



