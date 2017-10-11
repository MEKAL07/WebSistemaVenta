<?php

	namespace App\Http\Controllers;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Session\SessionManager;
	use App\Model\TCliente;
	use DB;
	
	 class ClienteController extends Controller
	 {
	 	
	 	public function actionRegistrar(Request $request,SessionManager $sessionManager)
	 	{
	 		if($_POST)
	 		{
	 			try
	 			{
	 				DB::beginTransaction();
	 				//validacion 
	 				$tclienteemail=TCliente::whereRaw('email=?',[trim($request->input('emailCorreo'))])->first();
	 				$tclientedni=TCliente::whereRaw('dniCliente=?',[trim($request->input('txtDniCliente'))])->first();
	 				if($tclienteemail!=null or $tclientedni!=null  )
	 				{
	 					$sessionManager->flash('mensaje','Dato en uso');
                		$sessionManager->flash('color',env('COLOR_ERROR'));
                		return redirect('/cliente/registrar');
	 				}
	 				$tcliente=new TCliente();
	 				  $tcliente->dniCliente=$request->input('txtDniCliente');
		              $tcliente->nombre=$request->input('txtNombre');
		              $tcliente->apellido=$request->input('txtApellido');
		              $tcliente->direccion=$request->input('txtDireccion');
		              $tcliente->email=$request->input('emailCorreo');
		              $tcliente->telefono=$request->input('txtTelefono');
		              $tcliente->sexo=$request->input('listSexo');
		              $tcliente->fechaRegistro=date('Y-m-d H:m:s');
		              $tcliente->fechaModificacion=date('Y-m-d H:m:s');

		              $tcliente->save();
		              DB::commit();
		              $sessionManager->flash('mensajeGeneral','Cliente registrado correctamente');
              		  $sessionManager->flash('color',env('COLOR_CORRECTO'));
	 			}
	 			catch (\Exception $ex)
	 			{
	 				DB::rollback();
	 				$sessionManager->flash('mensajeGeneral','Cliente no registrado');
                    $sessionManager->flash('color',env('COLOR_ERROR'));
	 			}
	 			return redirect('/cliente/registrar');
	 		}
	 		return view('cliente/registrar');
	 	}
	 	/*lista de clientes*/
		public function actionVer()
		{
		 	$listaCliente=TCliente::all();
		 	return view('cliente/ver',['listaCliente'=>$listaCliente]);
		}
		/*editar cliente*/
		public function actionEditar(Request $request,$dniCliente=null,SessionManager $sessionManager)
		{
			if($_POST)
	 		{
				try
	 			{
	 				DB::beginTransaction();
	 				//validacion 
	 				$tclienteemail=TCliente::whereRaw('dniCliente!=? and email=?',[$request->input('hdDniCliente'),trim($request->input('emailCorreo'))])->first();
	 				if($tclienteemail!=null)
	 				{
	 					$sessionManager->flash('mensaje','Correo electronico en uso');
                		$sessionManager->flash('color',env('COLOR_ERROR'));
                		return redirect('/cliente/editar/'.$request->input('hdDniCliente'));
	 				}
	 				$tcliente=TCliente::find($request->input('hdDniCliente'));
		              $tcliente->nombre=$request->input('txtNombre');
		              $tcliente->apellido=$request->input('txtApellido');
		              $tcliente->direccion=$request->input('txtDireccion');
		              $tcliente->email=$request->input('emailCorreo');
		              $tcliente->telefono=$request->input('txtTelefono');
		              $tcliente->sexo=$request->input('listSexo');
		              $tcliente->fechaModificacion=date('Y-m-d H:m:s');

		              $tcliente->save();
		              DB::commit();
		              $sessionManager->flash('mensajeGeneral','Datos de cliente actualizado correctamente');
              		  $sessionManager->flash('color',env('COLOR_CORRECTO'));
	 			}
	 			catch (\Exception $ex)
	 			{
	 				DB::rollback();
	 				$sessionManager->flash('mensajeGeneral','Error al actualizar datos de cliente ');
                    $sessionManager->flash('color',env('COLOR_ERROR'));
	 			}
	 			return redirect('/cliente/ver');
		 	}
	 		$tclientes=TCliente::find($dniCliente);//se usa cuando es por id
	        if($tclientes==null)
	        {
	          return redirect('/cliente/ver');
	        }
	 		return view('cliente/editar',['tcliente'=>$tclientes]);
		}
		/*eliminar*/
	 	public function actionEliminar($dnicliente)
	    {
	        $tcliente=TCliente::find($dnicliente);
	 
	        if($tcliente!=null)
	        {
	          $tcliente->delete();
	        }
	        return redirect('/cliente/ver');
	    }
	    public function actionBuscar(Request $request)
	    {
	    	
	    	
	        return view('cliente/buscar');
	    }
	    public function actionListar(Request $request)
	    {
	    	
    		$dnicliente=TCliente::whereRaw('dniCliente=?',[$request->input('clientedni')])->get();

    		return view('cliente/listar',['bCliente'=>$dnicliente]);
	    	
	    }
	} 
 ?>