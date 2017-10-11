<table>
  <thead>
    <tr>
      <th>DNI cliente</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Dirección</th>
      <th>Correo electronico</th>
      <th>Telefono</th>
    </tr>
  </thead>
  <tbody>
    @foreach($bCliente as $item)
	    <tr>
	      <td>{{$item->dniCliente}}</td>
	      <td>{{$item->nombre}}</td>
	      <td>{{$item->apellido}}</td>
	      <td>{{$item->direccion}}</td>
	      <td>{{$item->email}}</td>
        <td>{{$item->telefono}}</td>
        <td>
          {{csrf_field()}}
          <input type="hidden" id="hdDniCliente" name="hdDniCliente" value="{{$item->dniCliente}}">
          <input type="button" name="btnAgregar" id="btnAgregar" value="Agregar" onclick="agregarCliente({{$item->dniCliente}})">
        </td>
	    </tr>
    @endforeach
  </tbody>
</table>
<script type="text/javascript">
  function agregarCliente(dnicliente)
  {
    window.location.href='{{url('venta/realizar')}}/'+dnicliente;
  }
</script>