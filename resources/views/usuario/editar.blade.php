@extends('layout.template')
@section('CuerpoInterno')
	<h1>ACTUALIZACION DATOS DE USUARIO</h1>
	
	<form id="frmEditar" action="{{url('usuario/editar')}}" method="post" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<td class="td"><label class="laveltext" for="txtNombre">Nombre</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtNombre" name="txtNombre" placeholder="Nombre de usuario" value="{{$tusarios->nombre}}" onkeypress="return soloLetras(event)"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="txtApellido">Apellidos</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtApellido" name="txtApellido" placeholder="Apellido paterno y materno usuario" value="{{$tusarios->apellido}}" onkeypress="return soloLetras(event)"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="selectSexo">Sexo</label></td>
			</tr>
			<tr><td class="td"><select class="inputtext" name="selectSexo" id="selectSexo" value="{{$tusarios->sexo}}"> 
						<option>Varon</option>
						<option>Mujer</option>
					</select></td></tr>
			<tr>
				<td class="td"><label id="labelm" class="laveltext" for="emailCorreo">Correo electronico</label>
					@if(Session::has('mensajeCorreo'))
						<script type="text/javascript">
							$('#labelm').html('{{Session::get('mensajeCorreo')}}');
							$('#labelm').css({'color':'{{Session::get('color')}}'});
						</script>
					@endif
				</td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="email" id="emailCorreo" name="emailCorreo" placeholder="Correo electronico usuario" value="{{$tusarios->email}}" onkeypress="return validar_email(email)"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="passContrasenia">Contraseña</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="password" id="passContrasenia" name="passContrasenia" placeholder="Nueva contraseña de usuario"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="fileImagen">Imagen</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="file" id="fileImagen" name="fileImagen" value="{{$tusarios->imagen}}"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="selectCargo">Cargo</label></td>
			</tr>
			<tr><td class="td"><select class="inputtext" name="selectCargo" id="selectCargo" value="{{$tusarios->cargo}}">
						<option>Administrador</option>
						<option>Empleado</option>
					</select></td></tr>
			<tr><td class="td">
				<label id="labelmensaje">
					@if(Session::has('mensajeGeneral'))
						<script type="text/javascript">
							$('#labelmensaje').html('{{Session::get('mensajeGeneral')}}');
							$('#labelmensaje').css({'color':'{{Session::get('color')}}'});
						</script>
					@endif
				</label>
			</td></tr>
			<tr><td class="td">
				{{csrf_field()}}
				<input type="hidden" name="hdIdUsuario" id="hdIdUsuario" value="{{$tusarios->idUsuario}}">
				<input class="inputbutton" type="button" value="Guardar cambios" onclick="enviarFrmEditar()">
			</td></tr>
		</table>
		
	</form>
	
	<script >
		function enviarFrmEditar()
		{
			if(confirm('Confirmar actualizacion'))
			{
				$('#frmEditar').submit();
			}
		}
	</script>
@endsection