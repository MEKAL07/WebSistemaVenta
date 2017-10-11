<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('js/prefixfree.min.js')}}"></script>
    <script src="{{asset('js/JsMenu.js')}}"></script>
    <script src="{{asset('js/validaciones.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/CssMenu.css')}}">
    <link rel="stylesheet" href="{{asset('css/icono.css')}}">
    <link rel="stylesheet" href="{{asset('css/CssSection.css')}}">
</head>
<body>
    <div style="height: 40px;top:0;background-color: #000;left: 0;right:0;color: #fff;position: fixed;">
        
        @if(Session::has('idUsuario'))
                <img style="vertical-align: middle;padding-left: 20px;padding-top: 5px;" src="{{asset('imagenes/usuario').'/'.Session::get('imagen')}}" width="32px" height="32px">
                <span style="vertical-align: middle;padding-left: 5px;">{{Session::get('email')}}</span>
                <a style="float: right;color: #fff;padding-right: 20px;" href="{{url('usuario/logout')}}">cerrar sesion</a>
        @else
            <ul style="display: inline-table;float: right;">
                <a style="display:table-cell;vertical-align:middle;color: #F5F3F3;float: right;padding-right: 20px;" href="{{url('/')}}">Iniciar sesion</a>
            </ul>
        @endif
    </div>
    
    @if(Session::has('idUsuario'))
        <header>
            <div id="divMenu">
               <a href="#"><span class="icon-menu"></span>Menu</a>
           </div>
            <nav id="navMenu">
                <hr>
                <ul>
                    <li>
                        <a href="{{url('index/inicio')}}"><span class="icon-home"></span>Inicio</a>
                    </li><li>
                        <a href=""><span class="icon-users"></span>Cliente</a>
                        <ul>
                            <li><a href="{{url('cliente/registrar')}}">Registro de clientes</a>
                            </li><li>
                            <a href="{{url('cliente/ver')}}">ver cliente</a>
                            </li>
                        </ul>
                    </li><li>    
                        <a href=""><span class="icon-xing"></span>Producto</a>
                        <ul>
                            <li><a href="{{url('producto/registrar')}}">Registro de producto</a>
                            </li><li>
                            <a href="{{url('producto/ver')}}">ver productos</a>
                            </li>
                        </ul>
                    </li><li>
                       <a href="{{url('venta/realizar')}}"><span class="icon-paypal"></span>Ventas</a>
                    </li><li>
                        <a href="#"><span class="icon-menu2"></span>Reportes</a>
                        <ul>
                            <li><a href="{{url('reporte/productoregistrado')}}">Productos registrados</a>
                            </li><li>
                                <a href="{{url('reporte/ventasentredosfechas')}}">Venta entre dos fechas</a>
                            </li><li>
                                <a href="{{url('reporte/productosmasvendidos')}}">Productos mas vendidos</a>
                            </li><li>
                                <a href="">Venta realizadas entre dos fechas por usuario</a>
                            </li><li>
                                <a href="">Ingresos entre dos fechas</a>
                            </li><li>
                            <a href="">Clientes que generaron mayor ingreso</a>
                            </li>
                        </ul>
                    </li><li>
                        <a href=""><span class="icon-user"></span>Usuarios</a>
                        <ul>
                            <li><a href="{{url('usuario/registrar')}}">Registrar usuario</a>
                            </li><li>
                            <a href="{{url('usuario/ver')}}">ver usuarios</a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </nav>  
        </header>
    @endif
    <section>
    @yield('CuerpoInterno')
    </section>
    <footer>
        <marquee>sventas@gmail.com</maquee>
    </footer>
</body>
</html>