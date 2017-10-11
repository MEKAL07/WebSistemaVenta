@extends('layout.template')
@section('CuerpoInterno')
	<h1>REGISTRO DE CLIENTE</h1>
	
	<form id="frmRigistrar" action="{{url('cliente/registrar')}}" method="post">
		<table class="table">
			<tr>
				<td class="td"><label class="laveltext" for="txtDniCliente">DNI cliente <span id="spanMensaje">
					@if(Session::has('mensaje'))
						<script>
							$('#spanMensaje').html('{{Session::get('mensaje')}}');
							$('#spanMensaje').css({'color':'{{Session::get('color')}}'});
						</script>
					@endif
				</span></label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" name="txtDniCliente" id="txtDniCliente" maxlength="8" placeholder="DNI cliente" onkeypress="return solonumeros(event)"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="txtNombre">Nombre</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtNombre" name="txtNombre" placeholder="Nombre cliente" onkeypress="return soloLetras(event)"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="txtApellido">Apellidos</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtApellido" name="txtApellido" placeholder="Apellido paterno y materno cliente" onkeypress="return soloLetras(event)"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="txtDireccion">Dirección</label></td>
			</tr>
			<tr><td><input class="inputtext" type="text" id="txtDireccion" name="txtDireccion" placeholder="Dirección cliente"></td></tr>
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
			<tr><td class="td"><input class="inputtext" type="email" id="emailCorreo" name="emailCorreo" placeholder="Correo electronico" onkeypress="return validar_email( email )"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="txtTelefono" solonumeros(event)>Telfono</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtTelefono" name="txtTelefono" placeholder="Telefono cliente" maxlength="9"  onkeypress="return solonumeros(event)"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="listSexo">Sexo</label></td>
			</tr>
			<tr><td class="td"><select class="inputtext" name="listSexo" id="listSexo">
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
			<tr><td class="td"><input class="inputbutton" type="button" value="Registrar cliente" onclick="enviarFrmRegistrar();"></td></tr>
		</table>
		
	</form>
	<script type="text/javascript">
		function enviarFrmRegistrar()
		{
			if(confirm('Confirmar registro'))
			{
				$('#frmRigistrar').submit();
			}
		}
	</script>
@endsection