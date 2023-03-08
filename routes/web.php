<?php

use Illuminate\Support\Facades\Route;


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
    return view('auth.login');
});

Route::resource('productos', '\App\Http\Controllers\ProductoController');

Route::resource('customers', '\App\Http\Controllers\CustomerController')
->except('show', 'destroy')->names('customers');

Route::resource('ventas', '\App\Http\Controllers\VentaController');

Route::resource('reporte', '\App\Http\Controllers\ReporteController');

/* Route::get('/', function(){
    return view('cliente.registro');
}); */

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dash', function () {
        return view('dash.index');
    })->name('dash');
});
