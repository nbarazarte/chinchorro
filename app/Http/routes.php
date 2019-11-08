<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'auth'], function () {

	Route::get('/Dashboard', [
		'uses' => 'HomeController@index',
		'as' =>'home'
	]);

	Route::group(['middleware' => 'administrador'], function () {

	//Para los Usuarios del Sistema:
		
		//Crear Usuario:
		Route::get('Crear-Cuenta', [
						'uses' => 'HomeController@crearCuenta',
						'as' =>'registrar'
		]);

		Route::post('Crear-Cuenta', 'HomeController@postCrearCuenta');

		//Buscar usuarios:
		Route::get('Buscar-Cuenta', [
						'uses' => 'HomeController@buscarCuenta',
						'as' =>'buscarCuenta'
		]);

		//Ver Usuario:
		Route::get('Ver-Cuenta-{id}', [
						'uses' => 'HomeController@verCuenta',
						'as' =>'cuenta'
		]);

		//Editar Usuario
		Route::post('Editar-Cuenta', [
						'uses' => 'HomeController@editarCuenta',
						'as' =>'editarCuenta'
		]);

		//Editar Imágen
		Route::post('Editar-Imagen', [
						'uses' => 'HomeController@editarImagen',
						'as' =>'editarImagen'
		]);

		//Eliminar Cuenta
		Route::post('Eliminar-Cuenta', [
						'uses' => 'HomeController@eliminarCuenta',
						'as' =>'eliminarCuenta'
		]);

		//Eliminar Imágen
		Route::post('Eliminar-Imagen', [
						'uses' => 'HomeController@eliminarImagen',
						'as' =>'eliminarImagen'
		]);

		//Route::get('Ver-Cuenta/{id}','HomeController@verCuenta2');

		//Cambia el estatus del usuario por ajax en la Función "estatusUsuario(id,estatus)" en custom.js
		Route::get('usuario/{id}/estatus/{estatus}','HomeController@estatusUsuario');

	 });

	//Para el Equipo de Ilernus:

		//Crear Director o Gerente:
		Route::get('Crear-Equipo', [
						'uses' => 'EquipoIlernusController@crearCuenta',
						'as' =>'registrarPi'
		]);

		Route::post('Crear-Equipo', 'EquipoIlernusController@postCrearCuenta');

		//Buscar Director o Gerente:
		Route::get('Buscar-Equipo', [
						'uses' => 'EquipoIlernusController@buscarCuenta',
						'as' =>'buscarCuentaPi'
		]);

		//Ver Director o Gerente:
		Route::get('Ver-Equipo-{id}', [
						'uses' => 'EquipoIlernusController@verCuenta',
						'as' =>'cuentaPi'
		]);

		//Editar Director o Gerente
		Route::post('Editar-Equipo', [
						'uses' => 'EquipoIlernusController@editarCuenta',
						'as' =>'editarCuentaPi'
		]);

		//Editar Director o Gerente
		Route::post('Editar-Imagen-Equipo', [
						'uses' => 'EquipoIlernusController@editarImagen',
						'as' =>'editarImagenPi'
		]);

		//Eliminar Director o Gerente
		Route::post('Eliminar-Cuenta-Equipo', [
						'uses' => 'EquipoIlernusController@eliminarCuenta',
						'as' =>'eliminarCuentaPi'
		]);

		//Eliminar Director o Gerente
		Route::post('Eliminar-Imagen-Persona', [
						'uses' => 'EquipoIlernusController@eliminarImagen',
						'as' =>'eliminarImagenPi'
		]);

	//Para los Instructores de Ilernus:

		//Crear Instructores:
		Route::get('Crear-Instructor', [
						'uses' => 'InstructoresIlernusController@crearCuenta',
						'as' =>'registrarIns'
		]);

		Route::post('Crear-Instructor', 'InstructoresIlernusController@postCrearCuenta');

		//Buscar Instructores:
		Route::get('Buscar-Instructor', [
						'uses' => 'InstructoresIlernusController@buscarCuenta',
						'as' =>'buscarCuentaIns'
		]);

		//Ver Instructores:
		Route::get('Ver-Instructor-{id}', [
						'uses' => 'InstructoresIlernusController@verCuenta',
						'as' =>'cuentaIns'
		]);

		//Editar Instructores
		Route::post('Editar-Instructor', [
						'uses' => 'InstructoresIlernusController@editarCuenta',
						'as' =>'editarCuentaIns'
		]);

		//Editar Instructores
		Route::post('Editar-Imagen-Instructor', [
						'uses' => 'InstructoresIlernusController@editarImagen',
						'as' =>'editarImagenIns'
		]);

		//Eliminar Instructores
		Route::post('Eliminar-Cuenta-Instructor', [
						'uses' => 'InstructoresIlernusController@eliminarCuenta',
						'as' =>'eliminarCuentaIns'
		]);

		//Eliminar Instructores
		Route::post('Eliminar-Imagen-Instructor', [
						'uses' => 'InstructoresIlernusController@eliminarImagen',
						'as' =>'eliminarImagenIns'
		]);

	//Para los Autores de Blog:

		//Crear Autor:
		Route::get('Crear-Autor-Blog', [
						'uses' => 'AutoresIlernusController@crearCuenta',
						'as' =>'registrarAu'
		]);

		Route::post('Crear-Autor-Blog', 'AutoresIlernusController@postCrearCuenta');

		//Buscar Autor:
		Route::get('Buscar-Autor-Blog', [
						'uses' => 'AutoresIlernusController@buscarCuenta',
						'as' =>'buscarCuentaAu'
		]);

		//Ver Autor:
		Route::get('Ver-Autor-Blog-{id}', [
						'uses' => 'AutoresIlernusController@verCuenta',
						'as' =>'cuentaAu'
		]);

		//Editar Autor
		Route::post('Editar-Autor-Blog', [
						'uses' => 'AutoresIlernusController@editarCuenta',
						'as' =>'editarCuentaAu'
		]);

		//Editar Autor
		Route::post('Editar-Imagen-Autor-Blog', [
						'uses' => 'AutoresIlernusController@editarImagen',
						'as' =>'editarImagenAu'
		]);

		//Eliminar Autor
		Route::post('Eliminar-Cuenta-Autor-Blog', [
						'uses' => 'AutoresIlernusController@eliminarCuenta',
						'as' =>'eliminarCuentaAu'
		]);

		//Eliminar Imágen Autor
		Route::post('Eliminar-Imagen-Autor-Blog', [
						'uses' => 'AutoresIlernusController@eliminarImagen',
						'as' =>'eliminarImagenAu'
		]);



	//Para los Post de iLernus:

		//Crear Post:
		Route::get('Crear-Post', [
						'uses' => 'PostController@crearPost',
						'as' =>'registrarPost'
		]);

		Route::post('Crear-Post', 'PostController@postCrearPost');



		//Buscar Post:
		Route::get('Buscar-Post', [
						'uses' => 'PostController@buscarPost',
						'as' =>'buscarPost'
		]);


		//Ver Post:
		Route::get('Ver-Post-{id}', [
						'uses' => 'PostController@verPost',
						'as' =>'verPost'
		]);


		//Editar Post
		Route::post('Editar-Post', [
						'uses' => 'PostController@editarPost',
						'as' =>'editarPost'
		]);


		//Editar Post multimedia: simple
		Route::post('Editar-Post-Multimedia4', [
						'uses' => 'PostController@editarMultimedia4',
						'as' =>'editarMu4'
		]);

		//Editar Post multimedia: una imagen
		Route::post('Editar-Post-Multimedia', [
						'uses' => 'PostController@editarMultimedia',
						'as' =>'editarMu'
		]);

		//Editar Post multimedia: carrusel
		Route::post('Editar-Post-Multimedia2', [
						'uses' => 'PostController@editarMultimedia2',
						'as' =>'editarMu2'
		]);

		//Editar Post multimedia: audio y video
		Route::post('Editar-Post-Multimedia3', [
						'uses' => 'PostController@editarMultimedia3',
						'as' =>'editarMu3'
		]);

		//Editar Post Etiquetas:
		Route::post('Editar-Post-Etiquetas', [
						'uses' => 'PostController@editarEtiquetas',
						'as' =>'editarEtiquetas'
		]);

		//Eliminar Post
		Route::post('Eliminar-Post', [
						'uses' => 'PostController@eliminarPost',
						'as' =>'eliminarPost'
		]);




 });

Route::get('Recuperar-Clave', [
				'uses' => 'HomeController@getRecuperar',
				'as' =>'recuperar'
]);

Route::post('Recuperar-Clave', 'HomeController@postRecuperar');

Route::get('Acceso-Restringido', [
				'uses' => 'HomeController@denegado',
				'as' =>'denegado'
]);

// Authentication routes...
Route::get('/', [
				'uses' => 'Auth\AuthController@getLogin',
				'as' =>'login'
]);
Route::post('/', [
				'uses' => 'Auth\AuthController@postLogin',
				'as' =>'login'
]);
Route::get('Salir', [
				'uses' => 'Auth\AuthController@getLogout',
				'as' =>'logout'
]);
