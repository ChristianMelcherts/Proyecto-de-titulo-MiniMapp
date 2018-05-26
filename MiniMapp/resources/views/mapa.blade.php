@extends("templates.default")


@section('content')
	<div id="map-canvas" style="width:100%;height:700px"></div>
@stop

@section('extra_js')
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOsa3eHZuTH7cJGZH32y4Gzzn6vJh2A68&callback=initMap"></script>
	
	<script>
		$(document).on('ready', fn_inicio);
		/*
		===============================
		Mapa Posición Cliente
		===============================
		*/
		
		function fn_inicio(){
			var myLatlng = new google.maps.LatLng("-33.0718819", "-71.5536737");
		 	var mapOptions = {
		    	zoom: 16,
		    	center: myLatlng
		  	};

		  	map = new google.maps.Map(document.getElementById('map-canvas'),
		      mapOptions);

		  

		  	$.ajax({
		  		type: 'GET',
		  		url: 'localizacion',
		  		success: function(resulta){
		  			console.log(resulta);
		  			var markers = [];		
		  			for (i=0 ; i< resulta.length ; i++){
		  				var latLng = new google.maps.LatLng(resulta[i].latitud, resulta[i].longitud);
						

						var marker = new google.maps.Marker({
							position: latLng,
							map: map,
							title: 'Hello World!'
						});

						var content = resulta[i].direccion;    

						var infowindow = new google.maps.InfoWindow()

						google.maps.event.addListener(marker,'click', (function(marker,content,infowindow){ 
						        return function() {
						           infowindow.setContent(content);
						           infowindow.open(map,marker);
						        };
						    })(marker,content,infowindow)); 

						
		  			}


		  		}
		  	});


		}

    </script>
@stop