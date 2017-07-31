<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
	flash('Bienvenido !Pagina Principal!');
    return view('home');
});

Route::get('/ejemplo','ejemploController@index');

//proyectos

Route::get('/registrarProyecto','proyectosController@registrar');

Route::post('/guardarProyecto','proyectosController@guardar');

Route::get('/consultarProyectos','proyectosController@consultar');

Route::get('/eliminarProyecto/{id}','proyectosController@eliminar');

Route::get('/editarProyecto/{id}','proyectosController@editar');

Route::post('/actualizarProyecto/{id}','proyectosController@actualizar');

Route::get('/proyectosPDF','proyectosController@pdf');

Route::get('/asignarRecurso/{id}','proyectosController@asignarRecurso');

Route::post('/guardarAsignacion/{id}','proyectosController@guardarAsignacion');

Route::get('/eliminarAsignacion/{id}/{idp}','proyectosController@eliminarAsignacion');


//recursos

Route::get('/registrarRecursos','recursosController@registrar');

Route::post('/guardarRecurso','recursosController@guardar');

Route::get('/consultarRecursos','recursosController@consultar');

Route::get('/eliminarRecurso/{id}','recursosController@eliminar');

Route::get('/editarRecurso/{id}','recursosController@editar');

Route::post('/actualizarRecurso/{id}','recursosController@actualizar');

Route::get('/recursosPDF','recursosController@pdf');


//usuarios
route::get('/registroUsuario','usuariosController@registrar');

Route::post('/guardarUsuarios','usuariosController@guardar');

Route::get('/consultarUsuarios','usuariosController@consultar');

Route::get('/eliminarUsuario/{id}','usuariosController@eliminar');


Route::get('/editarUsuario/{id}','usuariosController@editar');

Route::post('/actualizarUsuario/{id}','usuariosController@actualizar');

Route::get('/enviarmail','usuariosController@enviarmail');


Route::get('/asignarPromo/{id}','usuariosController@asignarRe');

Route::post('/guardarAsig/{id}','usuariosController@guardarAsig');

Route::get('/eliminarAsig/{id}/{idp}','usuariosController@eliminarAsig');

//promociones

Route::get('/registroPromocion','promocionController@registrar');
Route::post('/guardarPromocion','promocionController@guardar');
Route::get('/consultarPromocion','promocionController@consultar');
Route::get('/eliminarPromocion/{id}','promocionController@eliminar');
Route::get('/editarPromocion/{id}','promocionController@editar');

Route::post('/actualizarPromocion/{id}','promocionController@actualizar');


Route::get('/preRegistro', function () {
	
return view('preRegistro');
});

Route::get('/registrado', function () {
	
return view('/registrado');
});