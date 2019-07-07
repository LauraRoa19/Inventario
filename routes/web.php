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
Route::put('/productos/comprar/{id}','ProductosController@confirm_buy')->name('productos.confirm');
Route::get('/productos/comprar/{id}','ProductosController@buy')->name('productos.comprar');
Route::resource('productos','ProductosController');
