@extends('layout.template')
@section('CuerpoInterno')
	<h1>DETALLE DE VENTAS</h1>
	
	<form style="border: none;" id="frmVenderProducto1" action="{{url('venta/agregarmasproductos')}}" method="post">
		<table  class="table" id="datosCliente">
			<tr>
				<td class="td"><label class="laveltext" for="txtDni">Dni</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtDni" name="txtDni" placeholder="Nombre cliente" value="{{$tcliente->dniCliente}}" onkeypress="return onkeypress="return solonumeros(event)" readonly="readonly"></td></tr>
	
			<tr>
				<td class="td"><label class="laveltext" for="txtNombre">Nombre del CLiente</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtNombre" name="txtNombre" placeholder="Nombre cliente" value="{{$tcliente->nombre}} {{$tcliente->apellido}}" onkeypress="return soloLetras(event)" readonly="readonly"></td></tr>
			
			<tr>
				<td class="td"><label class="laveltext" for="txtDireccion">Dirección</label></td>
			</tr>
			<tr><td><input class="inputtext" type="text" id="txtDireccion" name="txtDireccion" placeholder="Dirección cliente" value="{{$tcliente->direccion}}" readonly="readonly"></td></tr>
			
		</table>
		
		<br><br>

		<table class="table" style="border: 1px solid #CA4242;border-collapse: collapse;" >
			
			<tr>
				<td class="td">
				{{csrf_field()}}
				<input type="hidden" name="hdIdProducto" id="hdIdProducto" value="{{$tproducto->idProducto}}">
				
				</td>
			</tr>
			<thead style="background-color: #CA4242;">
			<tr>
				<th>Nombre</th>
				<th>Descripcion</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Importe</th>
			</tr>
		</thead>
		<tbody>
			
			<tr>
				<td><input style="border: none;" type="text" id="txtNombreP" name="txtNombreP" value="{{$tproducto->nombreProducto}}"  readonly="readonly"></td>
				<td ><input style="border: none;" type="text" id="txtDescripcion" name="txtDescripcion" value="{{$tproducto->descripcion}}" readonly="readonly"></td>
				<td><input  type="text" name="txtstock" id="txtstock" value="{{$tproducto->stock}}" onkeyup="importesuma()" onkeypress="return solonumeros(event)" ></td>
				<td><input style="border: none;" type="text" name="txtprecio" id="txtprecio" value="{{$tproducto->precio}}" onkeyup="importesuma()" readonly="readonly"></td>
				<td><input style="border: none;" type="text" name="txtimporte" id="txtimporte" readonly="readonly" value="{{$tproducto->precio*$tproducto->stock}}"></td>
			</tr>
			
		</tbody>
		</table>
		<br><br>
		<label for="txtMontoTotal">Monto Total</label>
		<input type="text" name="txtMontoTotal" id="txtMontoTotal" readonly="readonly" value="{{$tproducto->precio*$tproducto->stock}}">
		<br>
		<br>
		<input class="inputbutton" type="button" name="btnRegistrar" value="Generar la Venta" onclick="guardarLaVentass()">


	<script type="text/javascript">
		
		function guardarLaVentass(){
			$('#frmVenderProducto1').submit();
		}
	 	
		function frmEditarProducto()
		{
			if(confirm('Confirmar la Venta?'))
			{
				$('#frmVenderProducto').submit();
			}
		}

		function agregarproductos(argument) {
			window.location.href='{{url('venta/agregarmasproductos')}}';
		}
		function importesuma()
		{
			var precio=document.getElementById('txtprecio').value;
			var cantidad=document.getElementById('txtstock').value;
			
			var importe=cantidad*precio;
			document.getElementById('txtimporte').value=importe;
			document.getElementById('txtMontoTotal').value=importe;
			
		}
	</script>
@endsection