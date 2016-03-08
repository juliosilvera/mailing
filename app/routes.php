<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	if (Auth::check())
{
   return Redirect::to('admin');
}else{

	return View::make('login');
}
});

Route::get('images/{id}', function($id){
	date_default_timezone_set('America/Guayaquil');
	$codigo = Input::get('codigo');
	$fecha = date('Y-m-d');
	DB::table('correos')
            ->where('codigo', $codigo)
            ->update(array('check' => 'si', 'fecha' => $fecha));
});

Route::get('delete/{id}', function($id){
	$codigo = Input::get('codigo');
	DB::table('correos')
            ->where('codigo', $codigo)
            ->update(array('borrar' => 'si'));
    echo "Correo Eliminado de Nuestras Listas";
});

Route::get('logout', function(){
	Auth::logout();
	return Redirect::to('/');
});

Route::get('login', function(){
	if (Auth::check())
{
   return Redirect::to('check_login');
}else{

	return View::make('login');
}
});

Route::post('check_login', function(){
	if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password'))))
{
	$type = Auth::user()->type;
	switch ($type) {
		case 'admin':
			return Redirect::intended('admin');
			break;
		
		case 'supervisor':
			return Redirect::intended('supervisor');
			break;
	}
    
}else{
	return Redirect::to('error');
}
});


Route::get('emails/welcome', function(){
	return View::make('emails/welcome');
});

Route::match(array('GET', 'POST'), '{page}', array('before' => 'auth', function($page){
	switch ($page) {
		case 'send':
			$envio = new SendMail();
			$envio->enviar();
	
			return Redirect::to('admin');
			break;

		case 'new_user':
			$new = new NewUser();
			$new->crear_user();
			return Redirect::to('admin');
			break;

		case 'crear_grupo':
			$crear = new CrearGrupo();
			$crear->nuevoGrupo();
			return Redirect::to('lista');
			break;

		case 'send_camp':
			set_time_limit(0);
			ini_set('memory_limit', '-1');
			$send_camp = new SendMail();
			$send_camp->enviar();
			return Redirect::to('admin');
			break;

		case 'update_camp':
			$update = new UpdateCamp();
			$update->update();
			return Redirect::to('crear_correo');
			break;

		case 'save_camp':
			$save_camp = new SaveCamp();
			$save_camp->guardar();
			return Redirect::to('crear_correo');
			break;

		case 'eliminar_correo':
			$deletUser = new DeleteUser();
			$deletUser->borrarUser();
			return Redirect::to('lista');
			break;

		case 'addUserGroup':
			$addUserGroup = new AddUserToGroup();
			$addUserGroup->agregarUsuario();
			return Redirect::to('lista');
			break;

		case 'prueba':
			$prueba = new Revisados();
			$prueba->codigos();
			break;

		case 'revisados':
			$rev = new Revisados();
    		$rev->enviar();
    		return Redirect::to('admin');
			break;

		case 'excel':
			$excel = new SendMail();
    		$excel->create_excel();
    		
			break;

		case 'cargar_vistas':
			DB::table('aperturas')->insert(
    		array('campania' => Input::get('camp'), 'cantidad' => Input::get('vistas'), 'fecha' => Input::get('fecha'))
			);
			return Redirect::to('cargar');
			break;

		
		
		default:
			return View::make($page);
			break;
	}
	
}));