<table>
  <thead>
    <tr>
      <th>Nombre producto</th>
      <th>Imagen</th>
      <th>Descripcion</th>
      <th>Sctock</th>
      <th>Precio</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach($bProducto as $item)
	    <tr>
	      <td>{{$item->nombreProducto}}</td>
	      <td><img src="{{asset('imagenes/producto').'/'.$item->imagen}}" width="35px" height="35px"></td>
	      <td>{{$item->descripcion}}</td>
	      <td>{{$item->stock}}</td>
	      <td>{{$item->precio}}</td>
        <td><input type="button" name="btnAgregar" id="btnAgregar" value="Agregar a la Venta" onclick="agregarProducto({{$item->idProducto}}"></td>
	    </tr>
    @endforeach
  </tbody>
</table>
<script type="text/javascript">
  function agregarProducto(idproducto)
  {
    window.location.href='{{url('venta/realizar2')}}/'+idproducto;
  }
</script>