<?php 
	//RUTA PRINCIPAL
	Route::get('/','IndexController@actionIndex');
	/*ruta para cliente*/
	Route::match(['get','post'],'/cliente/registrar','ClienteController@actionRegistrar');
	Route::get('/cliente/ver','ClienteController@actionVer');
	Route::get('/cliente/editar/{dniCliente}','ClienteController@actionEditar');
	Route::post('/cliente/editar','ClienteController@actionEditar');
	Route::get('cliente/eliminar/{dniCliente}','ClienteController@actionEliminar');
	/*ruta producto*/
	Route::match(['get','post'],'/producto/registrar','ProductoController@actionRegistrar');
	Route::get('/producto/ver','ProductoController@actionVer');
	Route::get('/producto/editar/{idProducto}','ProductoController@actionEditar');
	Route::post('/producto/editar','ProductoController@actionEditar');
	Route::get('/producto/eliminar/{idProducto}','ProductoController@actionEliminar');
	/*ruta usuario*/
	Route::match(['get','post'],'/usuario/registrar','UsuarioController@actionRegistrar');
	Route::get('/usuario/ver','UsuarioController@actionVer');
	Route::get('/usuario/editar/{idUsuario}','UsuarioController@actionEditar');
	Route::post('/usuario/editar','UsuarioController@actionEditar');
	Route::get('/usuario/eliminar/{idUsuario}','UsuarioController@actionEliminar');
	Route::post('usuario/login','UsuarioController@actionLogIn');
	Route::get('usuario/logout','UsuarioController@actionLogOut');
	/*ruta inico home*/
	Route::get('/index/inicio','InicioController@actionInicio');
	/*ruta para venta*/
	Route::match(['get', 'post'], '/venta/realizar', 'VentaController@actionVender');
	Route::get('/venta/realizar' , 'VentaController@actionVerCLiente');
	Route::get('/venta/agregarproducto/{dniCliente}' , 'VentaController@actionAgregarCliente');
	Route::match(['get', 'post'], '/venta/agregarproducto' , 'VentaController@actionAgregarCliente');
	Route::get('/venta/agregarmasproductos/{dniCliente}/{idProducto}', 'VentaController@actionAgregarProducto');
	Route::match(['get', 'post'], '/venta/agregarmasproductos', 'VentaController@actionAgregarProducto');
	Route::match(['get', 'post'], '/venta/agregarmasproductos', 'VentaController@actionRegistrarVenta' );
	/*Rutas de reportes*/
	Route::get('reporte/productoregistrado','PruebaController@actionProductoRegistrado');
	Route::get('reporte/ventasentredosfechas','PruebaController@actionVentasEntreDosFechas');
	Route::get('reporte/productosmasvendidos','PruebaController@actionProductosMasVendidos');
	/*listar entre dos fechas*/
	Route::post('reporte/listarventasentrefechas','PruebaController@actionlistarventasentrefechas');
	/*exportar pdf exel*/
	Route::get('/exportar/exportpdf', 'ExportarController@actionExportPdf');
	Route::get('/exportar/exportexcel','ExportarController@actionExportExcel');
	Route::get('/exportar/exportpdf1', 'ExportarController@actionExportPdf1');
	Route::get('/exportar/exportexcel1','ExportarController@actionExportExcel1');
 ?>