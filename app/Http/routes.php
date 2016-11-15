<?php


Route::get('/', 'HomeController@welcome');

Route::auth();
Route::get('/home', 'HomeController@index');
Route::post('/nuevo', 'HomeController@nuevo');
Route::get('/archivos', 'HomeController@archivos');
Route::post('/archivos/{id}/borrar', 'HomeController@borrarProject');
Route::post('/archivos/{id}', 'HomeController@project');

Route::get('/usuarios', 'HomeController@usuarios');
Route::get('/usuarios/{id}', 'HomeController@editarUsuarios');
Route::post('/usuarios/{id}/borrar', 'HomeController@borrarUsuarios');
