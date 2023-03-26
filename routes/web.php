<?php

use App\Http\Controllers\AlmacenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobroController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;

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
    return view('index');
});

Route::get('register', function () {
    return view('auth.login');
});

Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['role:Super Admin']], function () {
        Route::resource('usuarios', UsuarioController::class);
    });

    Route::group(['middleware' => ['can:Gestionar Clientes']], function () {
        Route::resource('customers', CustomerController::class)
            ->except('destroy')->names('customers');
    });

    Route::group(['middleware' => ['can:Gestionar Productos']], function () {
        Route::resource('productos', ProductoController::class);
    });

    Route::group(['middleware' => ['can:Gestionar Cobros']], function () {
        Route::resource('cobros', CobroController::class)
            ->except('store', 'edit', 'update', 'show', 'destroy')->names('cobros');
    });

    Route::group(['middleware' => ['can:Gestionar Ventas']], function () {
        Route::resource('ventas', VentaController::class);
        Route::get('ventas/factura/{id}','App\Http\Controllers\VentaController@generarFactura');
    });

    Route::group(['middleware' => ['can:Gestionar Compras']], function () {
        Route::get('compras', function(){
            return view('compra.index');
        })->name('compra.index'); //Visualizar almacen

        Route::get('compras/{codalm}/create', function($codalm){
            return view('compra.create', compact('codalm'));
        })->name('compra.create'); //Agregar compra de un almacen x

        Route::get('compras/{codalm}/{codcompra}/show', function($codalm, $codcompra){
            return view('compra.show', compact('codalm', 'codcompra'));
        })->name('compra.show'); //Agregar compra de un almacen x
    });

    Route::group(['middleware' => ['can:Gestionar Reportes']], function () {
        Route::resource('reportes', ReporteController::class);
        Route::get('reportes/pdf/{id}','App\Http\Controllers\ReporteController@generarReporte');
    });

    Route::group(['middleware' => ['can:Gestionar Inventario']], function () {
        Route::resource('almacen', AlmacenController::class);

        Route::get('almacen', function(){
            return view('almacen.index');
        })->name('almacen.index'); // Usada para ver contenido de un almacen

        Route::get('almacen/create', function(){
            return view('almacen.create');
        })->name('almacen.create'); // Usada para mover contenido de un almacen a otro
    });

    Route::middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified'
    ])->group(function () {
        Route::get('/dash', function () {
            return view('dash.index');
        })->name('dash');
    });

});
