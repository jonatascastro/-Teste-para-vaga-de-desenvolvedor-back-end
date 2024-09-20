<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



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

#login  pagina inicial após login
Route::prefix("home")->controller('App\Http\Controllers\HomeController')->group(function () {
     Route::get('', 'index');
     Route::get('listar', 'listar')->name("home.listar");//datatable dados
     Route::delete('delete', 'delete')->name("home.delete");//datatable dados
     Route::put('update','update')->name("home.update");//datatable dados
     Route::post('create', 'create')->name('home.create');
     Route::post('getCidadesPorEstado', 'getCidadesPorEstado')->name('home.getCidadesPorEstado');

    
});


