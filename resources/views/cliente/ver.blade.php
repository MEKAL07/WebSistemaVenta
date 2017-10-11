@extends('layout.template')
@section('CuerpoInterno')
	<table style="border: 1px solid #428bca;border-collapse: collapse;margin: 20px;">
		<thead style="background-color: #428bca;">

			<tr>
				<th>DNI cliente</th>
				<th>Nombre</th>
				<th>Apellidos</th>
				<th>Dirección</th>
				<th>Correo electronico</th>
				<th>Telefono</th>
				<th>Sexo</th>
				<th>Fecha Registro</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($listaCliente as $item)
				<tr>
					<td>{{$item->dniCliente}}</td>
					<td>{{$item->nombre}}</td>
					<td>{{$item->apellido}}</td>
					<td>{{$item->direccion}}</td>
					<td>{{$item->email}}</td>
					<td>{{$item->telefono}}</td>
					<td>{{$item->sexo}}</td>
					<td>{{$item->fechaRegistro}}</td>
					<td>
						<input type="button" name="btnEditar" value="EDITAR" onclick="editarCliente({{$item->dniCliente}})">
						<input type="button" name="btnEliminar" value="ELIMINAR" onclick="eliminarCliente({{$item->dniCliente}})">
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<script type="text/javascript">
		function editarCliente(dnicliente)
		{
			window.location.href='{{url('cliente/editar')}}/'+dnicliente;
		}
		function eliminarCliente(dnicliente)
		{
			if(confirm('eliminar registro'))
			{
				window.location.href='{{url('cliente/eliminar')}}/'+dnicliente;
			}
		}
	</script>
@endsection