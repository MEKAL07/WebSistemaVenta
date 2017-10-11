@extends('layout.template')
@section('CuerpoInterno')
	<h1>EDICION DATOS CLIENTE</h1>
	
	<form id="frmEditar" action="{{url('cliente/editar')}}" method="post">
		<table class="table">
			
			<tr>
				<td class="td"><label class="laveltext" for="txtNombre">Nombre</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtNombre" name="txtNombre" placeholder="Nombre cliente" value="{{$tcliente->nombre}}"  onkeypress="return soloLetras(event)"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="txtApellido">Apellidos</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtApellido" name="txtApellido" placeholder="Apellido paterno y materno cliente" value="{{$tcliente->apellido}}" onkeypress="return soloLetras(event)"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="txtDireccion">Dirección</label></td>
			</tr>
			<tr><td><input class="inputtext" type="text" id="txtDireccion" name="txtDireccion" placeholder="Dirección cliente" value="{{$tcliente->direccion}}"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="emailCorreo">Correo electronico <span id="spanMensaje">
					@if(Session::has('mensaje'))
						<script>
							$('#spanMensaje').html('{{Session::get('mensaje')}}');
							$('#spanMensaje').css({'color':'{{Session::get('color')}}'});
						</script>
					@endif
				</span></label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="email" id="emailCorreo" name="emailCorreo" placeholder="Correo electronico" value="{{$tcliente->email}}" validar_email(email) ></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="txtTelefono">Telfono</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtTelefono" name="txtTelefono" placeholder="Telefono cliente" maxlength="9" value="{{$tcliente->telefono}}" onkeypress="return solonumeros(event)"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="listSexo">Sexo</label></td>
			</tr>
			<tr><td class="td"><select class="inputtext" name="listSexo" id="listSexo" value="{{$tcliente->sexo}}">
						<option>Varon</option>
						<option>Mujer</option>
					</select>					
			</td></tr>
			<tr><td class="td"><label class="laveltext" id="labelMensajeGeneral">
					@if(Session::has('mensajeGeneral'))
						<script>
							$('#labelMensajeGeneral').html('{{Session::get('mensajeGeneral')}}');
							$('#labelMensajeGeneral').css({'color':'{{Session::get('color')}}'});
						</script>
					@endif
				</label></td>
			</tr>
			{{csrf_field()}}
			<tr><td class="td">
				<input type="hidden" id="hdDniCliente" name="hdDniCliente" value="{{$tcliente->dniCliente}}">
				<input class="inputbutton" type="button" value="Guardar cambios" onclick="enviarFrmEditar();">
			</td></tr>
		</table>
		
	</form>
	<script type="text/javascript">
		function enviarFrmEditar()
		{
			if(confirm('Confirmar actualizacion de datos'))
			{
				$('#frmEditar').submit();
			}
		}
	</script>
@endsection