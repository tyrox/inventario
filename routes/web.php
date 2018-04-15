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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('sedes', 'SedeController');
Route::resource('productos', 'ProductoController');
Route::resource('inventarios', 'InventarioController');
Route::resource('compras', 'CompraController');
Route::resource('ventas', 'VentaController');