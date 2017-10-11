<?php

	namespace App\Http\Controllers;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Session\SessionManager;
	use App\Model\TProducto;
	use DB;
	 class ProductoController extends Controller
	 {
	 	
	 	public function actionRegistrar(Request $request, SessionManager $sessionManager)
	 	{
	 		if($_POST)
	 		{
	 			DB::beginTransaction();
	 			try
	 			{
	 				$tproducto=new TProducto();
	 				$tproducto->nombreProducto=$request->input('txtNombre');
	 				$tproducto->imagen='';//$request->input('fileImagen');
	 				$tproducto->descripcion=$request->input('txtAreaDescripcion');
	 				$tproducto->stock=$request->input('txtStock');
	 				$tproducto->precio=$request->input('txtPrecio');
	 				$tproducto->fechaRegistro=date('Y-m-d H:m:s');
	 				$tproducto->fechaModificacion=date('Y-m-d H:m:s');

	 				$tproducto->save();

	 				$tproductoTemp=TProducto::whereRaw('idProducto=(select max(idProducto) from tproducto)')->first();
	 				if($request->hasFile('fileImagen'))
	 				{
	 					$fileGetClientOriginalExtension=strtolower($request->file('fileImagen')->getClientOriginalExtension());
      					$tproductoTemp->imagen=$tproductoTemp->idProducto.'.'.$fileGetClientOriginalExtension;
      					$tproductoTemp->save();
      					$request->file('fileImagen')->move(public_path().'/imagenes/producto', $tproductoTemp->idProducto.'.'.$fileGetClientOriginalExtension);
	 				}
	 				DB::commit();
	 				$sessionManager->flash('mensajeGeneral','Producto registrado correctamente');
	 				$sessionManager->flash('color',env('COLOR_CORRECTO'));
	 			}
	 			catch (\Exception $ex)
	 			{
	 				DB::rollback();
	 				$sessionManager->flash('mensajeGeneral','Producto no registrado');
	 				$sessionManager->flash('color',env('COLOR_ERROR'));
	 			}
	 			return redirect('/producto/registrar');
	 		}
	 		return view('producto/registrar');
	 	}
	 	/*lista de productos*/
	 	public function actionVer()
	 	{
	 		$listaProducto=TProducto::all();
	 		return view('producto/ver',['listaProducto'=>$listaProducto]);
	 	}
	 	/*editar producto*/
	 	public function actionEditar(Request $request,$idProducto=null,SessionManager $sessionManager)
	 	{
	 		if($_POST)
	 		{
	 			
	 			try
	 			{
	 				DB::beginTransaction();
	 				$tproducto=TProducto::find($request->input('hdIdProducto'));

	 				$tproducto->nombreProducto=$request->input('txtNombre');
	 				$tproducto->imagen='';//$request->input('fileImagen');
	 				$tproducto->descripcion=$request->input('txtAreaDescripcion');
	 				$tproducto->stock=$request->input('txtStock');
	 				$tproducto->precio=$request->input('txtPrecio');
	 				$tproducto->fechaModificacion=date('Y-m-d H:m:s');

	 				$tproducto->save();

	 				$tproductoTemp=TProducto::whereRaw('idProducto=?',[$request->input('hdIdProducto')])->first();
	 				if($request->hasFile('fileImagen'))
	 				{
	 					$fileGetClientOriginalExtension=strtolower($request->file('fileImagen')->getClientOriginalExtension());
      					$tproductoTemp->imagen=$tproductoTemp->idProducto.'.'.$fileGetClientOriginalExtension;
      					$tproductoTemp->save();
      					$request->file('fileImagen')->move(public_path().'/imagenes/producto', $tproductoTemp->idProducto.'.'.$fileGetClientOriginalExtension);
	 				}
	 				DB::commit();
	 				$sessionManager->flash('mensajeGeneral','Actualizacion de datos producto correcta');
	 				$sessionManager->flash('color',env('COLOR_CORRECTO'));
	 			}
	 			catch (\Exception $ex)
	 			{
	 				DB::rollback();
	 				$sessionManager->flash('mensajeGeneral','Datos de producto no actualizado');
	 				$sessionManager->flash('color',env('COLOR_ERROR'));
	 			}
	 
	 			return redirect('/producto/ver');
	 		}
	 		$tproductos=TProducto::find($idProducto);

	 			if($tproductos==null)
	 			{
	 				return redirect('/producto/ver');
	 			}
	 			//dd($tproductos);
	 		return view('producto/editar',['tproductos'=>$tproductos]);
	 	}
	 	/*eliminar*/
	 	public function actionEliminar($idproducto)
	    {
	        $tproducto=TProducto::find($idproducto);
	        if(file_exists(public_path().'/imagenes/producto/'.$tproducto->imagen))
            {
            	unlink(public_path().'/imagenes/producto/'.$tproducto->imagen);
            }
	        if($tproducto!=null)
	        {
	          $tproducto->delete();
	        }
	        return redirect('/producto/ver');
	    }
	    public function actionBuscar(Request $request)
	    {
	    	
	    	
	        return view('producto/buscar');
	    }
	    public function actionListar(Request $request)
	    {
	    	
    		$bProductoNombre=TProducto::whereRaw('nombreProducto=?',[$request->input('nombrep')])->get();

    		return view('producto/listar',['bProducto'=>$bProductoNombre]);
	    	
	    }
	    
	 } 
 ?>