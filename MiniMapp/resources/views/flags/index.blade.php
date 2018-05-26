
@extends('templates.default')

@section('breadcrumbs')
	<li>
		<a href="{{ URL::route('flags') }}">Lista de Flags</a>
	</li>
@stop

@section('content')
	<div class="col-lg-12">
	<h2>Lista de Flags</h2><hr />

	@if (Session::has('flash_message'))
		<div class="alert alert-block alert-success">
	        <strong><i class="ace-icon fa fa-check bigger-120"></i></strong>&nbsp;&nbsp;&nbsp;{{ Session::get('flash_message') }}
	    </div><br /><br />
	@endif 


	<a href="{{ URL::route('flag.create') }}" class="btn btn-success btn-sm">Agregar nueva Flags</a><br /><br />
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				
			
				<th style="text-align:left">Flag</th>
				<th style="text-align:left">Descripcion</th>
				<th style="text-align:left">Activo</th>
				<th></th>
			</tr>
		</thead>		
		<tbody>
		
		@foreach($flags as $flag)	
			<tr>

				
				<td align="left">{{ $flag->flag }}</td>
				<td align="left">{{ $flag->descripcion }}</td>
				<td align="left">
				@if ($flag->activo == 0)
					NO
				@else
					SI
				@endif
				</td>
				
				<td align="left">

					<a  class="btn btn-xs btn-info" 
					href="{{ URL::route('flag.edit', $flag->id_flags) }}">
						<i class="ace-icon fa fa-pencil bigger-120"></i>
					</a>
					<a href="#" data-flag="{{ $flag->id_flags }}" class="btn btn-xs btn-danger <?php if($flag->activo == 1) echo('disabled') ?> btn-delete-flag">
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
	    $(".btn-delete-flag").on('click', function(){
	    	var cd_empresa = $(this).attr('data-flag');

	    	bootbox.confirm({
	            title: "Eliminar Flag",
	            message: "<h2> &iquest;Seguro que desea eliminar esta Flag?</h2>",
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
		    				url : 'flag/'+cd_empresa,
		    				success: function(resulta){
		    					if (resulta == 'Flag eliminada exitosamente'){
		    						window.location="{{ URL::route('flags') }}";
		    					}
		    				}
		    			});
		    		}
	            }
        	});

	    });
	</script>

@stop



