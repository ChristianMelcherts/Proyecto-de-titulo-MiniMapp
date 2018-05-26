
@extends('templates.default')

@section('breadcrumbs')
	<li>
		<a href="{{ URL::route('beneficios') }}">Lista de Beneficios</a>
	</li>
@stop

@section('content')
	<div class="col-lg-12">
	<h2>Lista de Beneficios</h2><hr />

	@if (Session::has('flash_message'))
		<div class="alert alert-block alert-success">
	        <strong><i class="ace-icon fa fa-check bigger-120"></i></strong>&nbsp;&nbsp;&nbsp;{{ Session::get('flash_message') }}
	    </div><br /><br />
	@endif 


	<a href="{{ URL::route('beneficio.create') }}" class="btn btn-success btn-sm">Agregar nuevo Beneficios</a><br /><br />
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				
			
				<th style="text-align:left">Nombre</th>
				<th style="text-align:left">Codigo</th>
				<th style="text-align:left">Descripcion</th>
				<th style="text-align:left">Activo</th>
				<th>Opciones</th>
			</tr>
		</thead>		
		<tbody>
		
		@foreach($beneficios as $beneficio)	
			<tr>

				
				<td align="left">{{ $beneficio->nombre }}</td>
				<td align="left">{{ $beneficio->codigo }}</td>
				<td align="left">{{ $beneficio->descripcion }}</td>
				<td align="left">
				@if ($beneficio->activo == 0)
					NO
				@else
					SI
				@endif
				</td>
				
				<td align="left">

					<a  class="btn btn-xs btn-info" 
					href="{{ URL::route('beneficio.edit', $beneficio->id_beneficio) }}">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</a>
					<a href="#" data-beneficio="{{ $beneficio->id_beneficio }}" class="btn btn-xs btn-danger <?php if($beneficio->activo == 1) echo('disabled') ?> btn-delete-beneficio">
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
	    $(".btn-delete-beneficio").on('click', function(){
	    	var cd_empresa = $(this).attr('data-beneficio');

	    	bootbox.confirm({
	            title: "Eliminar Beneficio",
	            message: "<h2> &iquest;Seguro que desea eliminar este Beneficio?</h2>",
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
		    				url : 'beneficio/'+cd_empresa,
		    				success: function(resulta){
		    					if (resulta == 'Beneficio eliminada exitosamente'){
		    						window.location="{{ URL::route('beneficios') }}";
		    					}
		    				}
		    			});
		    		}
	            }
        	});

	    });
	</script>

@stop



