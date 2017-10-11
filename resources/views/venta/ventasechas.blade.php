@extends('layout.template')
@section('CuerpoInterno')
	<table>
		<thead>
			<tr>
				<th>Nombre Usuario</th>
				<th>Apellidos</th>
				<th>Sexo</th>
				<th>Correo electronico</th>
				<th>Imagen</th>
				<th>Cargo</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach($listaUsuario as $item)
				<tr>
					<td>{{$item->nombre}}</td>
					<td>{{$item->apellido}}</td>
					<td>{{$item->sexo}}</td>
					<td>{{$item->email}}</td>
					<td>{{$item->imagen}}</td>
					<td>{{$item->cargo}}</td>
					<td>
						<input type="button" name="btnEditar" value="EDITAR" onclick="editarUsuario({{$item->idUsuario}})">
						<input type="button" name="btnEliminar" value="ELIMINAR" onclick="eliminarUsuario({{$item->idUsuario}})">
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<script type="text/javascript">
		function editarUsuario(idusuario)
		{
			window.location.href='{{url('usuario/editar')}}/'+idusuario;
		}
		function eliminarUsuario(idusuario)
		{
			if(confirm('eliminar registro'))
			{
				window.location.href='{{url('usuario/eliminar')}}/'+idusuario;
			}
		}
	</script>
@endsection