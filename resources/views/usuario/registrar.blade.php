@extends('layout.template')
@section('CuerpoInterno')
	<h1>REGISTRO DE USUARIO</h1>
	
	<form id="frmRegistrar" action="{{url('usuario/registrar')}}" method="post" enctype="multipart/form-data">
		<table class="table">
			<tr>
				<td class="td"><label class="laveltext" for="txtNombre">Nombre</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtNombre" name="txtNombre" placeholder="Nombre de usuario" onkeypress="return soloLetras(event)"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="txtApellido">Apellidos</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="text" id="txtApellido" name="txtApellido" placeholder="Apellido paterno y materno usuario" onkeypress="return soloLetras(event)"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="selectSexo">Sexo</label></td>
			</tr>
			<tr><td class="td"><select class="inputtext" name="selectSexo" id="selectSexo"> 
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
			<tr><td class="td"><input class="inputtext" type="email" id="emailCorreo" name="emailCorreo" placeholder="Correo electronico usuario"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="passContrasenia">Contraseña</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="password" id="passContrasenia" name="passContrasenia" placeholder="Contraseña de usuario"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="fileImagen">Imagen</label></td>
			</tr>
			<tr><td class="td"><input class="inputtext" type="file" id="fileImagen" name="fileImagen"></td></tr>
			<tr>
				<td class="td"><label class="laveltext" for="selectCargo">Cargo</label></td>
			</tr>
			<tr><td class="td"><select class="inputtext" name="selectCargo" id="selectCargo">
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
				<input class="inputbutton" type="button" value="Registrar usuario" onclick="enviarFrmRegistrar()">
			</td></tr>
		</table>
		
	</form>
	
	<script >
		function enviarFrmRegistrar()
		{
			if(confirm('Confirmar registro'))
			{
				$('#frmRegistrar').submit();
			}
		}
	</script>
@endsection