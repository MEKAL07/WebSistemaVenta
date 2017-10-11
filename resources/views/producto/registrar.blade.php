@extends('layout.template')
@section('CuerpoInterno')
	<h1>REGISTRO DE PRODUCTO</h1>
	<form id="frmRegistrar" action="{{url('producto/registrar')}}" method="post" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<td class="td"><label class="laveltext" for="txtNombre">Nombre</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" name="txtNombre" id="txtNombre" placeholder="Nombre del producto" onkeypress="return soloLetras(event)"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="fileImagen">Seleccione imagen</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="file" name="fileImagen" id="fileImagen"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="txtAreaDescripcion">Descripción</label></td>
			</tr>
			<tr><td class="td"><textarea class="inputarea" name="txtAreaDescripcion" id="txtAreaDescripcion" placeholder="Descripcion del producto"></textarea></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="txtStock">Stock producto</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" name="txtStock" id="txtStock" placeholder="stock del producto" onkeypress="return solonumeros(event)"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="txtPrecio">Precio producto</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" name="txtPrecio" id="txtPrecio" placeholder="Precio del producto" onkeypress="return solonumeros(event)"></td></tr>
			<tr><td class="td"><label class="labeltext" id="labelMensaje">
				@if(Session::has('mensajeGeneral'))
					<script type="text/javascript">
						$('#labelMensaje').html('{{Session::get('mensajeGeneral')}}');
						$('#labelMensaje').css({'color':'{{Session::get('color')}}'});
					</script>
				@endif
			</label></td></tr>
			<tr>
				<td class="td">
				{{csrf_field()}}
				<input class="inputbutton" type="button" name="btnRegistrar" value="Registrar producto" onclick="frmRegistrarProducto()">
				</td>
			</tr>
		</table>
	</form>
	<script type="text/javascript">
		function frmRegistrarProducto()
		{
			if (confirm('Confirmar operacion')) 
			{
				$('#frmRegistrar').submit();
			}
		}
	</script>
@endsection