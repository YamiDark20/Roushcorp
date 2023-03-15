<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CobroController;
// use App\Http\Livewire\CobrosCreate;


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

Route::resource('productos', ProductoController::class);

Route::resource('customers', CustomerController::class)
->except('show', 'destroy')->names('customers');

Route::resource('cobros', CobroController::class)
->except('store', 'edit', 'update', 'show', 'destroy')->names('cobros');

Route::resource('ventas', '\App\Http\Controllers\VentaController');

Route::get('compras/almacen', function(){
    return view('compra.almacen.index');
})->name('compra.almacen');

Route::get('compras/almacen/{codalm}/create', function($codalm){
    return view('compra.create', compact('codalm'));
})->name('compra.almacen.create');

Route::get('compras/{codalm}', function($codalm){
    return view('compra.index', compact('codalm'));
})->name('compra.index');

Route::get('compras/{codcompra}/{codalm}', function($codcompra, $codalm){
    return view('compra.almacen.visualizar-compra', compact('codcompra', 'codalm'));
})->name('compra.almacen.visualizar');  //Visualizar compra x de un almacen x

Route::get('reporte', function(){
    return view('reporte.index');
})->name('reporte.index');

#Route::get('compras/almacen', CobrosCreate::class);
// Route::post('cobros', CobrosCreate::class);

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
