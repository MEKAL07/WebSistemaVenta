@extends('layout.template')
@section('CuerpoInterno')
	<h4>LISTA DE VENTAS ENTRE DOS FECHAS</h4>
	<label for="dateinicial">Fecha Inicial</label>
	<input type="date" name="dateinicial" id="dateinicial">
	<label for="datefinal">Fecha Final</label>
	<input type="date" name="datefinal" id="datefinal">
	<input type="button" name="btnlistar"  id="btnlistar" value="Listar Venta" onclick="listarventas()">
	<hr>

	<div id="divListaventasfechas"></div>
	<script type="text/javascript">
		function listarventas() {
			// body...
			var d1=$('#dateinicial').val();
			var d2=$('#datefinal').val();
			$.ajax(
					{
							method:'POST',
							url:'{{url('reporte/listarventasentrefechas')}}',
							data:{_token:'{{csrf_token()}}',date1:d1,date2:d2}
					})
					.done(function(result){
						$('#divListaventasfechas').html(result);
					});
		}
	</script>
@endsection