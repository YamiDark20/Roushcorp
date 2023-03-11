<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobroController;


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

<<<<<<< HEAD
Route::resource('cobros', CobroController::class)
->except('store', 'edit', 'update', 'show', 'destroy')->names('cobros');

Route::get('compras/almacen', function(){
    return view('compra.almacen.index');
})->name('compra.almacen'); //Gestionar almacen

Route::get('compras/almacen/{codalm}/create', function($codalm){
    return view('compra.create', compact('codalm'));
})->name('compra.almacen.create'); //Agregar compra de un almacen x

Route::get('compras/{codalm}', function($codalm){
    return view('compra.index');
})->name('compra.index'); //Visualizar compras de un almacen
=======
Route::resource('ventas', '\App\Http\Controllers\VentaController');
>>>>>>> Venta

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
