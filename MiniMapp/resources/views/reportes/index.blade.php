
@extends('templates.default')

@section('content')
<h2>Reporte</h2><hr />
	@if (Session::has('flash_message'))
		<div class="alert alert-block alert-success">
	        <strong><i class="ace-icon fa fa-check bigger-120"></i></strong>&nbsp;&nbsp;&nbsp;{{ Session::get('flash_message') }}
	    </div><br /><br />
	@endif
	@if($errors->any())
		<div class="alert alert-danger">
			<ul>
				{{ implode('',$errors->all(':message')) }}
			</ul>
		</div>
	@endif 
	
	<div class="panel panel-info">
	  <div class="panel-heading">
		<h3 class="panel-title">Filtros de Búsqueda</h3>
	  </div>
	  
  	<div class="panel-body">
		<div class='col-md-3'>
			<div class="form-group">
				<div class='input-group date' id='datetimepicker6'>
					<input type='text' class="form-control" id = 'date_from'/>
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
		</div>
		<div class='col-md-3'>
			<div class="form-group">
				<div class='input-group date' id='datetimepicker7'>
					<input type='text' class="form-control" id = 'date_to' />
					<span class="input-group-addon">
						<span class="glyphicon glyphicon-calendar"></span>
					</span>
				</div>
			</div>
		</div>
		<div class='col-md-3'>
			<div class="form-group">
				<button id='filter_date' type="button" class="btn btn-primary btn-sm">
				  <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Buscar
				</button>
				<button id='filter_clean' type="button" class="btn btn-default btn-sm">
				  <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Limpiar
				</button>					
			</div>

		</div>			
  	</div>
	</div>

	<!-- Table -->
	<a id="excelButton" class="btn btn-success btn-sm">Exportar Listado en Excel</a><br /><br />

	<div id="table-holder">
	<!-- Table -->
		<table id="table_sends" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th style="text-align:center">Nº registro</th>
					<th style="text-align:center">Skill</th>
					<th style="text-align:center">Empresa</th>
					<th style="text-align:center">Fecha</th>
					<th style="text-align:center">Telefono</th>
					<th style="text-align:center">Espera</th>
					<th style="text-align:center">Enviado</th>
					<th style="text-align:center">SMS</th>
					<th style="text-align:center">Respuesta</th>
					<th style="text-align:center">F. Envio</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Sin Información</td>
					<td>Sin Información</td>
					<td>Sin Información</td>
					<td>Sin Información</td>
					<td>Sin Información</td>
					<td>Sin Información</td>
					<td>Sin Información</td>
					<td>Sin Información</td>
					<td>Sin Información</td>
					<td>Sin Información</td>
				</tr>
			</tbody>
		
		</table>
		{!! $sends->render() !!}
	</div>
	<!--{!! $sends->render() !!}-->

	<!-- script -->
	<script type="text/javascript">	
	
		function setDate(fecha){
			var format_date = fecha.split("/");
			return format_date[2]+"-"+format_date[1]+"-"+format_date[0];
		}

		function newdate(date){
			var format_date = date.split(".");
			return format_date[0];
		}
		//?
		function addCommas(n){
			var rx=  /(\d+)(\d{3})/;
			return String(n).replace(/^\d+/, function(w){
				while(rx.test(w)){
					w= w.replace(rx, '$1.$2');
				}
				return "$"+w;
			});
		}		
	
		$(function () {
			$('#datetimepicker6').datepicker({
				weekStart: 1,
				format: 'dd/mm/yyyy',
				language : 'es'
			});
			$('#datetimepicker7').datepicker({
				weekStart: 1,
				format: 'dd/mm/yyyy',
				language : 'es',
				useCurrent: false //Important! See issue #1075
			});
			$("#datetimepicker6").on("dp.change", function (e) {
				$('#datetimepicker7').data("Datepicker").minDate(e.date);
			});
			$("#datetimepicker7").on("dp.change", function (e) {
				$('#datetimepicker6').data("Datepicker").maxDate(e.date);
			});	
		});
		/////////////EXCEL/////////////
		$('#excelButton').click(function() {

		
			var date_f = setDate($("#date_from").val());
			var date_t = setDate($("#date_to").val());


			if(($("#date_from").val() == "") || ($("#date_to").val() == "")){
				console.log("empty");
				alert("Debe ingresar ambas fechas");
				return false;
			}else if(date_f > date_t){
				console.log("empty");
				alert("La fecha destino debe ser superior a la origen");
				$("#date_to").val("");
				return index();
			}else{
				
			var date_from = setDate($("#date_from").val());
			var date_to = setDate($("#date_to").val());
				

			window.location.href = "{{ URL::route('export_sends') }}" + "?fecha_inicio=" + date_from + "&fecha_final=" + date_to;

		}});

		$('#filter_clean').click(function(){
		
			$("#table_sends tbody").hide();
			$("#table_sends tbody").html('');
			
			$.ajax({
				type: "POST",
				url: 'reportes/getAll',
				data :"",
				dataType: "json",
				success: function(data) {
					console.log(data);
					if(data["data"] == 0){
						var row = "<tr>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							
						"</tr>";
						$("#table_sends tbody").append(row);
					}else{
						$.each(data["data"], function(_id, sends){
							if(sends["fecha_envio_sms"] == null){
								sends["fecha_envio_sms"] = "Pendiente";
							}else{
								sends["fecha_envio_sms"] = newdate(sends["fecha_envio_sms"]);
							}
							if(sends["gl_respuesta_envio"] == null){
								sends["gl_respuesta_envio"] = "Pendiente";
							}
							
							var row = "<tr>"+
							'<td style="text-align:right">'+sends["id_registro"]+"</td>"+
							
							'<td style="text-align:left">'+sends["nm_skill"]+"</td>"+
						
							'<td style="text-align:left">'+sends["nm_empresa"]+"</td>"+
							'<td style="text-align:left">'+newdate(sends["fc_inicio"])+"</td>"+
							'<td style="text-align:right">'+sends["nr_telefono"]+"</td>"+
							'<td style="text-align:right">'+sends["vl_tiempo_espera"]+"</td>"+
							'<td style="text-align:left">'+sends["sms_enviado"]+"</td>"+
							'<td style="text-align:left">'+sends["gl_sms_definido"]+"</td>"+
							'<td style="text-align:left">'+sends["gl_respuesta_envio"]+"</td>"+
							'<td style="text-align:left">'+sends["fecha_envio_sms"]
							+"</td>"+"</tr>";
							$("#table_sends tbody").append(row);					
						});	
						// }}

					}
					$("#table_sends tbody").show();
				},
				error: function(error) {
					console.log(error);
					alert("Error de consulta");
				}
			});
		});			
		/////////////FILTER/////
		$('#filter_date').click(function(){

			var date_f = setDate($("#date_from").val());
			var date_t = setDate($("#date_to").val());


			if(($("#date_from").val() == "") || ($("#date_to").val() == "")){
				console.log("empty");
				alert("Debe ingresar ambas fechas");
				return false;
			}else if(date_f > date_t){
				console.log("empty");
				alert("La fecha destino debe ser superior a la origen");
				//$("#date_to").val() == "";
				$("#date_to").val("");
				return index();
			}else{
				var date_from = setDate($("#date_from").val());
				var date_to = setDate($("#date_to").val());
				
				$("#table_sends tbody").hide();
				$("#table_sends tbody").html('');
				
				$.ajax({
					type: "POST",
					url: 'reportes/filter',
					data :"fecha_inicio="+date_from+"&fecha_final="+date_to,
					dataType: "json",
					success: function(data) {
						console.log(data);
						if(data["data"] == 0){
							var row = "<tr>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							"<td>Sin Información</td>"+
							
						"</tr>";
							$("#table_sends tbody").append(row);
						}else{
						$.each(data["data"], function(_id, sends){
							if(sends["fecha_envio_sms"] == null){
								sends["fecha_envio_sms"] = "Pendiente";
							}else{
								sends["fecha_envio_sms"] = newdate(sends["fecha_envio_sms"]);
							}
							if(sends["gl_respuesta_envio"] == null){
								sends["gl_respuesta_envio"] = "Pendiente";
							}
							
							var row = "<tr>"+
							'<td style="text-align:right">'+sends["id_registro"]+"</td>"+
							
							'<td style="text-align:left">'+sends["nm_skill"]+"</td>"+
						
							'<td style="text-align:left">'+sends["nm_empresa"]+"</td>"+
							'<td style="text-align:left">'+newdate(sends["fc_inicio"])+"</td>"+
							'<td style="text-align:right">'+sends["nr_telefono"]+"</td>"+
							'<td style="text-align:right">'+sends["vl_tiempo_espera"]+"</td>"+
							'<td style="text-align:left">'+sends["sms_enviado"]+"</td>"+
							'<td style="text-align:left">'+sends["gl_sms_definido"]+"</td>"+
							'<td style="text-align:left">'+sends["gl_respuesta_envio"]+"</td>"+
							'<td style="text-align:left">'+sends["fecha_envio_sms"]
							+"</td>"+"</tr>";
							$("#table_sends tbody").append(row);					
						});	
						// }}

					}
						$("#table_sends tbody").show();
					},
					error: function(error) {
						console.log(error);
						alert("Error de consulta");
					}
				})			
			}
		});		
	</script>
@stop