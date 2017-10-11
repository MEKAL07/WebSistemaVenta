@extends('layout.template')
@section('CuerpoInterno')
	<h4>LISTA DE PRODUCTOS REGISTRADOS</h4>
	<div><input type="button" name="txtExportarPdf" id="txtExportarPdf" value="EXPORTAR A PDF" onclick="exportarPDF()">
		<input type="button" name="txtExportarExel" id="txtExportarExel" value="EXPORTAR A EXEL" onclick="exportarEXEL()">
	</div>
	<table style="border: 1px solid #CA4242;border-collapse: collapse;margin: 20px;">
		<thead style="background-color: #CA4242;">

			<tr>
				<th>Nombre Producto</th>
				<th>Imagen</th>
				<th>Descripción</th>
				<th>Stock</th>
				<th>Precio Unitario</th>
				<th>Fecha Registro</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($productosRegistrados as $item)
				<tr>
					<td>{{$item->nombreProducto}}</td>
					<td><img src="{{asset('imagenes/producto').'/'.$item->imagen}}" width="35px" height="35px"></td>
					<td>{{$item->descripcion}}</td>
					<td>{{$item->stock}}</td>
					<td>{{$item->precio}}</td>
					<td>{{$item->fechaRegistro}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
	<script type="text/javascript">
	function exportarPDF()
	{
		window.location.href="{{url('exportar/exportpdf1')}}";
	}
	function exportarEXEL()
	{
		window.location.href="{{url('exportar/exportexcel1')}}";
	}
</script>
@endsection