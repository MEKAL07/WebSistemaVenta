@extends('layout.template')
@section('CuerpoInterno')
	<h4>LISTA DE PRODUCTOS MAS VENDIDOS</h4>
	<table style="border: 1px solid #CA4242;border-collapse: collapse;margin: 20px;">
		<thead style="background-color: #CA4242;">

			<tr>
				<th>Nombre Producto</th>
				<th>cantidad</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach ($productomasvendido as $item)
				<tr>
					<td>{{$item->nombreProducto}}</td>
					<td>{{$item->sumacantidad}}</td>

				</tr>
			@endforeach
		</tbody>
	</table>
@endsection