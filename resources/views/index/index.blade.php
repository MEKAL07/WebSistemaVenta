@extends('layout.template')
@section('CuerpoInterno')

<form style="width: 100%;border: none;" action="{{url('usuario/login')}}" method="post">
	<div id="divLogin" >
		<div style="background-color: #428bca;width: 100%;height:40px;border-radius: 10px 10px 0 0;">
			INICIAR SESION
		</div>
		<table style="width: 100%;padding: 5%;">
			<tr>
				<td><label style="float: left;" for="emalCorreoElectronicoLogin">Correo electronico</label></td>
			</tr>
			<tr>
				<td><input style="height: 25px;border-radius: 6px; width: 99%;" type="email" id="emalCorreoElectronicoLogin" name="emalCorreoElectronicoLogin" placeholder="Ingrese correo electronico"></td>
			</tr>
			<tr>
				<td><label style="float: left;" for="passContrasenia">Contraseña</label></td>
			</tr>
			<tr>
				<td><input style="height: 25px;border-radius: 6px;width: 99%;" type="password" id="passContrasenia" name="passContrasenia" placeholder="Ingrese password"></td>
			</tr>
			<tr>
				<td><label id="labelMensaje">
					@if(Session::has('mensajeGeneral'))
						<script>
							$('#labelMensaje').html('{{Session::get('mensajeGeneral')}}');
							$('#labelMensaje').css({'color':'{{Session::get('color')}}'});
						</script>
					@endif
				</label></td>
			</tr>
			<tr>
				<td>
					{{csrf_field()}}
					<input style="background-color: #428bca;border-color:#428bca; color: #fff; cursor: pointer;height: 35px;border-radius: 6px; width: 100%;" type="submit" name="btnIngresar" value="Ingresar al sistema">
					</td>
			</tr>
		</table>
	</div>
</form>
@endsection