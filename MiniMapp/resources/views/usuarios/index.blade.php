
@extends('templates.default')

@section('breadcrumbs')
	<li>
		<a href="{{ URL::route('usuarios') }}">Lista de Usuarios</a>
	</li>
@stop

@section('content')
	<div class="col-lg-12">
	<h2>Lista de Usuarios</h2><hr />

	@if (Session::has('flash_message'))
		<div class="alert alert-block alert-success">
	        <strong><i class="ace-icon fa fa-check bigger-120"></i></strong>&nbsp;&nbsp;&nbsp;{{ Session::get('flash_message') }}
	    </div><br /><br />
	@endif 


	<a href="{{ URL::route('usuario.create') }}" class="btn btn-success btn-sm">Agregar nuevo Usuario</a><br /><br />
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				
				<th style="text-align:left">Login</th>
				<th style="text-align:left">Tipo de Usuario</th>
				<th style="text-align:left">Email</th>
				<th style="text-align:left">Nombre</th>
				<th style="text-align:left">Activo</th>
				<th style="text-align:left">Opciones</th>
				
			</tr>
		</thead>		
		<tbody>
		
		@foreach($usuarios as $usuario)	
			<tr>

				
				<td align="left">{{ $usuario->login }}</td>
				@if ($usuario->id_roll == '1')
					<td align="left">Administrador</td>
				@else
					<td align="left">Cliente</td>
				@endif
				<td align="left">{{ $usuario->correo }}</td>
				<td align="left">{{ $usuario->nombre }}</td>
				@if($usuario->activo == '1')
					<td align="left">Activo</td>
				@elseif($usuario->activo == '0')
					<td align="left">Inactivo</td>
				@else
					<td align="left">ERROR</td>
				@endif
				<td align="center">

					<a  class="btn btn-xs btn-info" 
					href="{{ URL::route('usuario.show', $usuario->id_usuarios) }}">
						<i class="ace-icon fa fa-search bigger-120"></i>
					</a>
					<a  class="btn btn-xs btn-info" 
					href="{{ URL::route('usuario.edit', $usuario->id_usuarios) }}">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</a>
					<a href="#" data-usuario="{{ $usuario->id_usuarios }}" class="btn btn-xs btn-danger <?php if($usuario->activo == 1) echo('disabled') ?> btn-delete-usuario">
						<i class="ace-icon fa fa-trash-o bigger-120"></i>

					</a>
					

					
					

				</td>
			</tr>
		@endforeach	
			
		
		</tbody>
	</table>
	</div>

@stop

@section('extra_js')
	<script src="{!! asset('assets/js/bootbox.min.js') !!}	"></script>
	<script>
	    $(".btn-delete-usuario").on('click', function(){
	    	var id_usuario = $(this).attr('data-usuario');

	    	bootbox.confirm({
	            title: "Eliminar Usuario",
	            message: "<h2> &iquest;Seguro que desea eliminar este Usuario?</h2>",
	            buttons: {
	                cancel: {
	                    label: "Cancelar",
	                    className: "btn-success pull-left"
	                },
	                confirm: {
	                    label: "Eliminar",
	                    className: "btn-danger pull-right"
	                }
	            },
	            callback: function(result) {
	                if (result == true){
		    			$.ajax({
		    				type : 'post',
		    				data: {_method: 'delete'},
		    				url : 'usuario/'+id_usuario,
		    				success: function(resulta){
		    					if (resulta == 'Usuario eliminado exitosamente'){
		    						window.location="{{ URL::route('usuarios') }}";
		    					}
		    				}
		    			});
		    		}
	            }
        	});

	    });
	</script>

@stop



