<?php
	namespace App\Http\Controllers;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Illuminate\Session\SessionManager;
	use App\Model\TUsuario;
	use Illuminate\Encryption\Encrypter;
	use DB;
	
	class UsuarioController extends Controller
	{
		
		public function actionRegistrar(Request $request, SessionManager $sessionManager,Encrypter $encrypter)
		{

			if($_POST)
			{
				
				try 
				{
					DB::beginTransaction();
				
					$tusuario=TUsuario::whereRaw('email=?',[trim($request->input('emailCorreo'))])->first();
					if($tusuario!=null)
					{
						$sessionManager->flash('mensajeCorreo','correo electronico en uso');
						$sessionManager->flash('color',env('COLOR_ERROR'));	
						return redirect('/usuario/registrar');
					}

					$tusuario=new TUsuario();
					$tusuario->nombre=$request->input('txtNombre');
					$tusuario->apellido=$request->input('txtApellido');
					$tusuario->sexo=$request->input('selectSexo');
					$tusuario->email=$request->input('emailCorreo');
					$tusuario->password=$encrypter->encrypt($request->input('passContrasenia'));
					$tusuario->imagen='';
					$tusuario->cargo=$request->input('selectCargo');
					$tusuario->fechaRegistro=date('Y-m-d H:m:s');
					$tusuario->fechaModificacion=date('Y-m-d H:m:s');

					$tusuario->save();

					  $tusuariotemp=TUsuario::whereRaw('idUsuario=(select max(idUsuario) from tusuario)')->first();

		              if($request->hasFile('fileImagen'))
		              {
		                $fileGetClientOriginalExtension=strtolower($request->file('fileImagen')->getClientOriginalExtension());
		      					$tusuariotemp->imagen=$tusuariotemp->idUsuario.'.'.$fileGetClientOriginalExtension;
		      					$tusuariotemp->save();
		      					$request->file('fileImagen')->move(public_path().'/imagenes/usuario', $tusuariotemp->idUsuario.'.'.$fileGetClientOriginalExtension);
		              }
	 				
					DB::commit();
					$sessionManager->flash('mensajeGeneral','Usuario registrado correctamente');
					$sessionManager->flash('color',env('COLOR_CORRECTO'));
				} 
				
				catch (\Exception $ex) 
				{
					DB::rollback();	
					
					$sessionManager->flash('mensajeGeneral','Usuario no registrado');
					$sessionManager->flash('color',env('COLOR_ERROR'));
					
				}

				return redirect('/usuario/registrar');
			}
			return view('usuario/registrar');
		}
		/*listar usuarios*/
		public function actionVer()
		{
			$listaUsuario=TUsuario::all();
			return view('usuario/ver',['listaUsuario'=>$listaUsuario]);
		}
		/*editar usuario*/
		public function actionEditar(Request $request,$idUsuario=null,SessionManager $sessionManager,Encrypter $encrypter)
	 	{
	 		if($_POST)
	 		{
	 			
	 			try
	 			{
	 				DB::beginTransaction();

	 				//validando correoElectronico por consulta base datos
			          $tusua=TUsuario::whereRaw('idUsuario!=? and email=?',[$request->input('hdIdUsuario'),trim($request->input('emailCorreo'))])->first();
			          if($tusua!=null){
			            return redirect('/usuario/editar/'.$request->input('hdIdUsuario'));
			          }
	 				$tusuario=TUsuario::find($request->input('hdIdUsuario'));

	 				$tusuario->nombre=$request->input('txtNombre');
					$tusuario->apellido=$request->input('txtApellido');
					$tusuario->sexo=$request->input('selectSexo');
					$tusuario->email=$request->input('emailCorreo');
					$tusuario->password=$encrypter->encrypt($request->input('passContrasenia'));
					$tusuario->imagen='';
					$tusuario->cargo=$request->input('selectCargo');
					$tusuario->fechaModificacion=date('Y-m-d H:m:s');

					$tusuario->save();


	 				$tusuariotemp=TUsuario::whereRaw('idUsuario=?',[$request->input('hdIdUsuario')])->first();
	 				if($request->hasFile('fileImagen'))
	 				{
	 					$fileGetClientOriginalExtension=strtolower($request->file('fileImagen')->getClientOriginalExtension());
      					$tusuariotemp->imagen=$tusuariotemp->idUsuario.'.'.$fileGetClientOriginalExtension;
      					$tusuariotemp->save();
      					$request->file('fileImagen')->move(public_path().'/imagenes/usuario', $tusuariotemp->idUsuario.'.'.$fileGetClientOriginalExtension);
	 				}
	 				DB::commit();
	 				$sessionManager->flash('mensajeGeneral','Actualizacion de datos usuario correcta');
	 				$sessionManager->flash('color',env('COLOR_CORRECTO'));
	 			}
	 			catch (\Exception $ex)
	 			{
	 				DB::rollback();
	 				$sessionManager->flash('mensajeGeneral','Datos de usuario no actualizado');
	 				$sessionManager->flash('color',env('COLOR_ERROR'));
	 			}
	 
	 			return redirect('/usuario/ver');
	 		}
	 		$tusario=TUsuario::find($idUsuario);
	 			if($tusario==null)
	 			{
	 				return redirect('/usuario/ver');
	 			}
	 		return view('usuario/editar',['tusarios'=>$tusario]);
	 	}
		/*eliminar*/
	 	public function actionEliminar($idusuario,SessionManager $sessionManager)
	      {

	        $tusuario=TUsuario::find($idusuario);
            if(file_exists(public_path().'/imagenes/usuario/'.$tusuario->imagen))
            {
            	unlink(public_path().'/imagenes/usuario/'.$tusuario->imagen);
            }
            if($tusuario!=null)
            {
          		$tusuario->delete();
            }
            //PREGUNTAR ING
            
        	return redirect('/usuario/ver');
	    }
	    /*Usuario ligin*/
	    public function actionLogIn(SessionManager $sessionManager,Encrypter $encrypter,Request $request)
	    {
	    	$tusuario=TUsuario::whereRaw('email=?',[$request->input('emalCorreoElectronicoLogin')])->first();
	    	/*if($tusuario==null or ($encrypter->decrypt($tusuario->password)!=$request->input('passContrasenia')))
			{
				$sessionManager->flash('mensajeGeneral','Dato incorrecto');
				$sessionManager->flash('color',env('COLOR_ERROR'));
				return redirect('/');
			}*/
			$sessionManager->put('idUsuario',$tusuario->idUsuario);
			$sessionManager->put('email',$tusuario->email);
			$sessionManager->put('imagen',$tusuario->imagen);

			$sessionManager->flash('mensajeGeneral','Datos correctos');
			$sessionManager->flash('color',env('COLOR_CORRECTO'));

			return redirect('index/inicio');
	    } 
	    public function actionLogOut(SessionManager $sessionManager)
	    {
	    	$sessionManager->flush();
	    	return redirect('/');
	    }
	}
 ?>