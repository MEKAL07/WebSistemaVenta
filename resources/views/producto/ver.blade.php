@extends('layout.template')
@section('CuerpoInterno')
	<table style="border: 1px solid #428bca;border-collapse: collapse;margin: 20px;">
		<thead style="background-color: #428bca;">
			<tr>
				<th>Nombre producto</th>
				<th>Imagen</th>
				<th>Descripción</th>
				<th>Stock</th>
				<th>Precio</th>
				<th>Fecha Registro</th>
				<th>Opciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($listaProducto as $item)
				<tr>
					<td>{{$item->nombreProducto}}</td>
					<td>{{$item->imagen}}</td>
					<td>{{$item->descripcion}}</td>
					<td>{{$item->stock}}</td>
					<td>{{$item->precio}}</td>
					<td>{{$item->fechaRegistro}}</td>
					<td>
						<input type="button" name="btnEditar" value="EDITAR" onclick="editarProducto({{$item->idProducto}})">
						<input type="button" name="btnEliminar" value="ELIMINAR" onclick="eliminarProducto({{$item->idProducto}})">
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<script type="text/javascript">
		function editarProducto(idproducto)
		{
			window.location.href='{{url('producto/editar')}}/'+idproducto;
		}
		function eliminarProducto(idproducto)
		{
			if(confirm('eliminar registro'))
			{
				window.location.href='{{url('producto/eliminar')}}/'+idproducto;
			}
		}
	</script>
@endsection