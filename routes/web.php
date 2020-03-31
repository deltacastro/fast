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

Auth::routes(['register' => false]);

Route::group(['namespace' => 'admin', 'prefix' => 'admin'], function(){
    Route::group(['prefix' => 'usuarios'], function(){
        Route::get('', 'UsersController@index')->name('admin.user.index');
        Route::get('nuevo', 'UsersController@create')->name('admin.user.create');
        Route::post('nuevo', 'UsersController@store')->name('admin.user.store');
        Route::get('lista', 'UsersController@list')->name('admin.user.list');
        Route::get('{user}/editar', 'UsersController@edit')->name('admin.user.edit');
        Route::post('{user}/editar', 'UsersController@update')->name('admin.user.update');
        Route::delete('{user}', 'UsersController@toggle')->name('admin.user.destroy');
        Route::put('{user}', 'UsersController@restore')->name('admin.user.restore');
    });
});

Route::group(['namespace' => 'TI', 'prefix' => 'ti'], function(){
    Route::group(['prefix' => 'servicio'], function(){
        Route::get('', 'ServicioController@index')->name('ti.servicio.index');
    });
    Route::group(['prefix' => 'equipo'], function () {
        Route::get('', 'EquiposController@index')->name('ti.equipo.index');
        Route::get('lista', 'EquiposController@list')->name('ti.equipo.list');
        Route::get('nuevo', 'EquiposController@create')->name('ti.equipo.create');
        Route::post('nuevo', 'EquiposController@store')->name('ti.equipo.store');
    });
});

Route::group(['prefix' => 'filtro'], function () {
    Route::get('usuario/{user}/departamentos', 'UsuariosController@departamentos')->name('user.departamentos');
    Route::get('so/{so}/versiones', 'SistemasOperativosController@versiones')->name('so.versiones');
});

Route::get('/home', 'HomeController@index')->name('home');



Route::get('/test', function(){
    return view('layouts.delta');
});
