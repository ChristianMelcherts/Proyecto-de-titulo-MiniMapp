@extends("templates.default")

@section('breadcrumbs')
	<li>
		<a href="{{ URL::route('usuario.index') }}">Lista de Usuarios</a>
	</li>
	<li>
		<a href="#">Detalles del Usuario</a>
	</li>
@stop


@section('content')
	<h2>Detalle del Usuario</h2><hr />
	<div class="col-lg-12">
		<div class="col-lg-6">
		<table class="table table-bordered">
			<tr>
				<td>Nombre</span></td>
				<td><b>{{ $usuarios->nombre }}</b></td>				
			</tr>
			<tr>
				<td>LogIn</td>
				<td><b>{{ $usuarios->login }}</b></td>
				
			</tr>
			<tr>
				<td>Correo</td>
				<td><b>{{ $usuarios->correo }}</b></td>
			</tr>
			<tr>
				<td>Tipo de usuario</td>
				@if ($usuarios->id_roll == '1')
					<td><b>Administrador</b></td>
				@else
					<td><b>Cliente</b></td>
				@endif
				
			</tr>
			<tr>
				<td>Activo</td>
				@if($usuarios->activo == 1)
					<td><b> SI </b></td>
				@else
					<td><b> NO </b></td>
				@endif
				
			</tr>
			<tr>
				<td>Fecha registro</td>
				<td><b>{{ date('d/m/Y H:i:s',strtotime($usuarios->created_at)) }}</b></td>
			</tr>
			<tr>
				<td>Fecha de Modificacion</td>
				<td><b>{{ date('d/m/Y H:i:s',strtotime($usuarios->updated_at)) }}</b></td>
			</tr>
			
		
		</table>
		</div>
		<div class="col-lg-6" style="text-align:center"> 
		
			<div id="map-canvas" style="width:400px;height:400px"></div>
		</div>
		
		
	</div>
	<a href="{{ URL::route('usuario.index') }}" class="btn btn-warning btn-sm">Volver a historial de usuarioss</a>

@stop


@section('extra_js')
	@if($localizacion)
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOsa3eHZuTH7cJGZH32y4Gzzn6vJh2A68&callback=initMap"></script>
		
		<script>
			$(document).on('ready', fn_inicio);
			/*
			===============================
			Mapa Posición Cliente
			===============================
			*/
			
			function fn_inicio(){
				var myLatlng = new google.maps.LatLng("{{ $localizacion->latitud }}", "{{ $localizacion->longitud }}");
			 	var mapOptions = {
			    	zoom: 16,
			    	center: myLatlng
			  	};

			  	map = new google.maps.Map(document.getElementById('map-canvas'),
			      mapOptions);

			  	var marker = new google.maps.Marker({
					position: myLatlng,
					map: map,
					title: 'Hello World!'
				});
			}

	    </script>
    @endif
@stop