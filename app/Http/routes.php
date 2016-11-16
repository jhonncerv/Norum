<?php


Route::get('/', 'HomeController@welcome');

Route::auth();
Route::get('/home', 'HomeController@index');
Route::post('/nuevo', 'HomeController@nuevo');
Route::post('/switch/{num}', 'HomeController@seleccion');

Route::get('/archivos', 'HomeController@archivos');
Route::post('/archivos/{id}/borrar', 'HomeController@borrarArchivo');
Route::post('/archivos/{id}/editar', 'HomeController@editarArchivo');

Route::get('/usuarios', 'HomeController@usuarios');
Route::get('/usuarios/{id}', 'HomeController@editarUsuarios');
Route::post('/usuarios/{id}/borrar', 'HomeController@borrarUsuarios');
