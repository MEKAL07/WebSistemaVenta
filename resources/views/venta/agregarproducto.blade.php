@extends('layout.template')
@section('CuerpoInterno')
	<h1>DATOS DE CLIENTE</h1>
	
	<form id="frmEditar" action="{{url('venta/agregarproducto')}}" method="post">
		<table class="table">

			<tr>
				<td class="td"><label class="laveltext" for="txtDni">Dni</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtDni" name="txtDni" placeholder="Nombre cliente" value="{{$tcliente->dniCliente}}" onkeypress="return solonumeros(event)" readonly="reodonly"></td></tr>
			
			<tr>
				<td class="td"><label class="laveltext" for="txtNombre">Nombre</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtNombre" name="txtNombre" placeholder="Nombre cliente" value="{{$tcliente->nombre}} {{$tcliente->apellido}}" onkeypress="return soloLetras(event)" readonly="reodonly"></td></tr>
			
			<tr>
				<td class="td"><label class="laveltext" for="txtDireccion">Dirección</label></td>
			</tr>
			<tr><td><input class="inputtext" type="text" id="txtDireccion" name="txtDireccion" placeholder="Dirección cliente" value="{{$tcliente->direccion}}" readonly="reodonly"></td></tr>
		
			{{csrf_field()}}
			<tr><td class="td">
				<input type="hidden" id="hdDniCliente" name="hdDniCliente" value="{{$tcliente->dniCliente}}">
			</td></tr>
		</table>
		
	</form>
	<br><br><br><br>
	<form>
		<tr>
				<td class="td"><label class="laveltext" for="txtProducto">Buscar Producto : </label></td>
		</tr>
		
		<input type="text" name="txtProducto" id="txtProducto" class="inputtext" onkeyup="buscarProducto();">		
	</form>
	
	<table id="datosProducto" style="border: 1px solid #428bca;border-collapse: collapse; contentEditable="true" >
		<caption>Productos Registrados</caption>
		<thead style="background-color: #CA4242;">
			<tr>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Stock</th>
				<th>Precio</th>
				<th>Accion</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($listaProducto as $items)
				<tr>
					<td>{{$items->nombreProducto}}</td>					
					<td>{{$items->descripcion}}</td>
					<td>{{$items->stock}}</td>
					<td>{{$items->precio}}</td>					
					<td>
						<input type="button" name="btnEnviarProducto" id="btnEnviarProducto" value="ENVIAR" onclick="EnviarProducto({{$tcliente->dniCliente}}, {{$items->idProducto}});">
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

	 	function EnviarProducto(dnicliente, idproducto)
		{
			window.location.href='{{url('venta/agregarmasproductos')}}/'+dnicliente+'/'+idproducto;
		}
		function enviarFrmEditar()
		{
			if(confirm('Confirmar actualizacion de datos'))
			{
				$('#frmEditar').submit();
			}
		}
	</script>
@endsection