<div><input type="button" name="txtExportarPdf" id="txtExportarPdf" value="EXPORTAR A PDF" onclick="exportarPDF()">
	<input type="button" name="txtExportarExel" id="txtExportarExel" value="EXPORTAR A EXEL" onclick="exportarEXEL()">
</div>
<table style="border: 1px solid #CA4242;border-collapse: collapse;margin: 20px;">
		<thead style="background-color: #CA4242;">

			<tr>
				<th>Nombre Producto</th>
				<th>Stock</th>
				<th>Precio Unitario</th>
				<th>Fecha Venta</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($entrefechas as $item)
				<tr>
					<td>{{$item->tproducto->nombreProducto}}</td>
					<td>{{$item->cantidad}}</td>
					<td>{{$item->precioUnitario}}</td>
					<td>{{$item->fechaVenta}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
<script type="text/javascript">
	function exportarPDF()
	{
		window.location.href="{{url('exportar/exportpdf')}}";
	}
	function exportarEXEL()
	{
		window.location.href="{{url('exportar/exportexcel')}}";
	}
</script>