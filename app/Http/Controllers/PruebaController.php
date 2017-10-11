<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\TProducto;
use App\Model\TDetalleVenta;
use DB;

class PruebaController extends Controller
{
   public function actionProductoRegistrado()
		{
			$productosRegistrados=TProducto::all();
			return view('reporte/productoregistrado',['productosRegistrados'=>$productosRegistrados]);
		}
	//
	public function actionVentasEntreDosFechas(Request $request)
	{
		return view('reporte/ventasentredosfechas');
	}
	public function actionlistarventasentrefechas(Request $request)
	{
		$consultaventafechas=TDetalleVenta::whereBetween('fechaVenta',[$request->input('date1'),$request->input('date2')])->get();
		return view('reporte/listarventasentrefechas',['entrefechas'=>$consultaventafechas]);
	}
	//productos mas vendidos
	public function actionProductosMasVendidos()
	{
		$productomasvendido=DB::table('tdetalleventa')->join('tproducto','tproducto.idProducto','=','tdetalleventa.idProducto')->select(DB::raw('tproducto.nombreProducto,SUM(tdetalleventa.cantidad) as sumacantidad'))->groupBy('tproducto.nombreProducto')->get();
		//dd($productomasvendido);
		return view('reporte/productosmasvendidos',['productomasvendido'=>$productomasvendido]);
	}
	//ventas realizadas entre dos fechas por usuario
	/*
	public function actionVentasEntreDosFechasPorUsuario()
	{
		return view('reportes/ventasentredosfechasporusuario');
	}
	public function actionListarVentasEntreDosFechasPorUsuario(SessionManager $sessionManager)
	{
		$consultaventafechas=TDetalleVenta::with('TProducto.TDetalleVenta.TVenta.TUsuario')->whereBetween('fechaVenta',[$request->input('date1'),$request->input('date2')])->whereRaw('idUsuario=?',[trim($sessionManager->get('idUsuario'))])->get();
		return view('reportes/listarventasentredosfechasporusuario',['consultaventafechas'=>$consultaventafechas]);
	}
	*/
}
