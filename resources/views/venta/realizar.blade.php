@extends('layout.template')
@section('CuerpoInterno')
	<h4>REALIZAR VENTA</h4>
	<form>
	
		<label for="txtCLiente">Buscar Cliente : </label>
		<input type="text" name="txtCLiente" id="txtCLiente" class="inputtext" onkeyup="buscarCliente();" >		
	</form>
	
	<table id="datosCliente" style="border: 1px solid #428bca;border-collapse: collapse;"">
		<caption>Clientes Registrados</caption>
		<thead style="background-color: #CA4242;">
			<tr>
				<th>DNI cliente</th>
				<th>Nombre</th>				
				<th>Telefono</th>				
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($listaCliente as $item)
				<tr>
					<td>{{$item->dniCliente}}</td>
					<td>{{$item->nombre}} {{$item->apellido}}</td>					
					<td>{{$item->telefono}}</td>
										
					<td>
						<input type="button" name="btnEnviarCliente" id="btnEnviarCliente" value="ENVIAR" onclick="EnviarCLiente({{$item->dniCliente}});">
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<script type="text/javascript">
		function EnviarCLiente(dnicliente)
		{
			window.location.href='{{url('venta/agregarproducto')}}/'+dnicliente;
		}
	</script>
@endsection
