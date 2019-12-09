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

		//Eliminar Imagen
		Route::post('Eliminar-Imagen', [
						'uses' => 'HomeController@eliminarImagen',
						'as' =>'eliminarImagen'
		]);

		//Route::get('Ver-Cuenta/{id}','HomeController@verCuenta2');

		//Cambia el estatus del usuario por ajax en la Función "estatusUsuario(id,estatus)" en custom.js
		Route::get('usuario/{id}/estatus/{estatus}','HomeController@estatusUsuario');

	 });

	//Para los Autores:

		//Crear Autor:
		Route::get('Crear-Autor', [
						'uses' => 'AutoresIlernusController@crearCuenta',
						'as' =>'registrarAu'
		]);

		Route::post('Crear-Autor', 'AutoresIlernusController@postCrearCuenta');

		//Buscar Autor:
		Route::get('Buscar-Autor', [
						'uses' => 'AutoresIlernusController@buscarCuenta',
						'as' =>'buscarCuentaAu'
		]);

		//Ver Autor:
		Route::get('Ver-Autor-{id}', [
						'uses' => 'AutoresIlernusController@verCuenta',
						'as' =>'cuentaAu'
		]);

		//Editar Autor
		Route::post('Editar-Autor', [
						'uses' => 'AutoresIlernusController@editarCuenta',
						'as' =>'editarCuentaAu'
		]);

		//Editar Autor
		Route::post('Editar-Imagen-Autor', [
						'uses' => 'AutoresIlernusController@editarImagen',
						'as' =>'editarImagenAu'
		]);

		//Eliminar Autor
		Route::post('Eliminar-Cuenta-Autor', [
						'uses' => 'AutoresIlernusController@eliminarCuenta',
						'as' =>'eliminarCuentaAu'
		]);

		//Eliminar Imágen Autor
		Route::post('Eliminar-Imagen-Autor', [
						'uses' => 'AutoresIlernusController@eliminarImagen',
						'as' =>'eliminarImagenAu'
		]);

	//Para los Post:

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

/********************************************************/

	//Para las Noticias:

		//Crear Noticias:
		Route::get('Crear-Noticias', [
						'uses' => 'NoticiasController@crearNoticia',
						'as' =>'registrarNoticia'
		]);

		Route::post('Crear-Noticias', 'NoticiasController@postCrearNoticia');

		//Buscar Noticia:
		Route::get('Buscar-Noticias', [
						'uses' => 'NoticiasController@buscarNoticia',
						'as' =>'buscarNoticia'
		]);

		//Ver Noticia:
		Route::get('Ver-Noticia-{id}', [
						'uses' => 'NoticiasController@verNoticia',
						'as' =>'verNoticia'
		]);

		//Editar Noticia
		Route::post('Editar-Noticia', [
						'uses' => 'NoticiasController@editarNoticia',
						'as' =>'editarNoticia'
		]);

		//Editar Noticia multimedia: simple
		Route::post('Editar-Noticia-Multimedia4', [
						'uses' => 'NoticiasController@editarMultimedia4',
						'as' =>'editarMu4Noticia'
		]);

		//Editar Noticia multimedia: una imagen
		Route::post('Editar-Noticia-Multimedia', [
						'uses' => 'NoticiasController@editarMultimedia',
						'as' =>'editarMuNoticia'
		]);

		//Editar Noticia multimedia: carrusel
		Route::post('Editar-Noticia-Multimedia2', [
						'uses' => 'NoticiasController@editarMultimedia2',
						'as' =>'editarMu2Noticia'
		]);

		//Editar Noticia multimedia: audio y video
		Route::post('Editar-Noticia-Multimedia3', [
						'uses' => 'NoticiasController@editarMultimedia3',
						'as' =>'editarMu3Noticia'
		]);

		//Editar Noticia Etiquetas:
		Route::post('Editar-Noticia-Etiquetas', [
						'uses' => 'NoticiasController@editarEtiquetas',
						'as' =>'editarEtiquetasNoticias'
		]);

		//Eliminar Noticia
		Route::post('Eliminar-Noticia', [
						'uses' => 'NoticiasController@eliminarNoticias',
						'as' =>'eliminarNoticia'
		]);
/********************************************************/

	//Para los tutoriales:

		//Crear Tutorial:
		Route::get('Crear-Tutorial', [
						'uses' => 'TutorialController@crearTutorial',
						'as' =>'registrarTutorial'
		]);

		Route::post('Crear-Tutorial', 'TutorialController@postCrearTutorial');

		//Buscar Tutorial:
		Route::get('Buscar-Tutorial', [
						'uses' => 'TutorialController@buscarTutorial',
						'as' =>'buscarTutorial'
		]);

		//Ver Tutorial:
		Route::get('Ver-Tutorial-{id}', [
						'uses' => 'TutorialController@verTutorial',
						'as' =>'verTutorial'
		]);

		//Editar Tutorial:
		Route::post('Editar-Tutorial', [
						'uses' => 'TutorialController@editarTutorial',
						'as' =>'editarTutorial'
		]);

		//Editar Tutorial multimedia: youtube
		Route::post('Editar-Tutorial-Youtube', [
						'uses' => 'TutorialController@editarMultimediaTutorial',
						'as' =>'editarTutorialMultimedia'
		]);

		//Eliminar Tutorial
		Route::post('Eliminar-Tutorial', [
						'uses' => 'TutorialController@eliminarTutorial',
						'as' =>'eliminarTutorial'
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
