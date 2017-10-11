<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use App\Model\TUsuario;
use App\Model\TVenta;
use App\Model\TCliente;
use App\Model\TProducto;
use App\Model\TDetalleVenta;
use Illuminate\Encryption\Encrypter;
use DB;

/**
* 
*/
class VentaController extends Controller
{
	
	public function actionVender(Request $request)
	{
		return view('venta/realizar');
	}

	public function actionVerCLiente()
	{
		 $listaCliente=TCliente::all();
		 return view('venta/realizar',['listaCliente'=>$listaCliente]);
	}

	public function actionAgregarCliente(Request $request, $dniCliente=null, SessionManager $sessionManager)
	{
	 		$tclientes=TCliente::find($dniCliente);//se usa cuando es por id
	        if($tclientes==null)
	        {
	          return redirect('/venta/realizar');
	        }

	        $listaProducto=TProducto::all();
	 		return view('venta/agregarproducto',['tcliente'=>$tclientes , 'listaProducto'=>$listaProducto]);
	 		
	 		//return view('venta/agregarproducto',['listaCliente'=>$listaCliente, 'listaProducto'=>$listaProducto]);
	}


	public function actionAgregarProducto(Request $request, $dniCliente=null, $idProducto=null, SessionManager $sessionManager)
	{
		
	 		$tclientes=TCliente::find($dniCliente);//se usa cuando es por id
	 		$tproductos=TProducto::find($idProducto);
	        if($tclientes==null && $tproductos==null)
	        {
	          return redirect('/venta/agregarproducto');
	        }

	        $listaProducto=TProducto::all();
	 		return view('venta/agregarmasproductos',['tcliente'=>$tclientes , 'tproducto'=>$tproductos]);

	}

	public function actionRegistrarVenta(Request $request, SessionManager $sessionManager)
	{

		if ($_POST) 
		{
			$tVenta= new TVenta();

			$tVenta->dniCliente=$request->input('txtDni');
			$tVenta->idUsuario=$sessionManager->get('idUsuario');
			$tVenta->fechaRegistro=date('Y-m-d H:m:s');

			$tVenta->save();

			$idventa=TVenta::whereRaw('idVenta=(select max(idVenta) from tventa)')->first();

			$detalleventa=new TDetalleVenta();

			$detalleventa->idVenta=$idventa->idVenta;
			$detalleventa->idProducto=$request->input('hdIdProducto');
			$detalleventa->cantidad=$request->input('txtstock');
			$detalleventa->precioUnitario=$request->input('txtprecio');
			$detalleventa->importe=$request->input('txtimporte');
			$detalleventa->precioTotal=$request->input('txtMontoTotal');
			$detalleventa->fechaVenta=date('Y-m-d H:m:s');

			$detalleventa->save();

			$sessionManager->flash('mensajeGeneral','venta registrada correctamente');
			$sessionManager->flash('color',env('COLOR_CORRECTO'));

			return redirect('/venta/realizar');

		}
		return view('venta/realizar');
	}
	public function actionVer()
	{
		$listaVenta=TVenta::all();
		return view('venta/ventasechas',['listaVenta'=>$listaVenta]);
	}
}
?>
