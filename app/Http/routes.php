<?php


Route::get('/', function () {
    return view('welcome');
});

Route::post('/actuales', 'HomeController@actuales');
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get('/proyectos', 'HomeController@proyectos');
Route::get('/proyectos/{id}', 'HomeController@editProject');
Route::post('/proyectos/{id}/borrar', 'HomeController@borrarProject');
Route::post('/proyectos/{id}', 'HomeController@project');
Route::get('/nuevo', 'HomeController@nuevo');
Route::post('/nuevo', 'HomeController@creaUnoNuevo');
Route::get('/usuarios', 'HomeController@usuarios');
Route::get('/usuarios/{id}', 'HomeController@editarUsuarios');
Route::post('/usuarios/{id}/borrar', 'HomeController@borrarUsuarios');
