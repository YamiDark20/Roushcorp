<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobroController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ReporteController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

// Route::group(['middleware' => ['role:super-admin']], function () {
Route::group(['middleware' => ['auth']], function () {
    Route::resource('productos', ProductoController::class);

    Route::resource('customers', CustomerController::class)
    ->except('show', 'destroy')->names('customers');
    // Route::post('/create_cliente', [ClienteController::class, 'store']);

    Route::resource('cobros', CobroController::class)
    ->except('store', 'edit', 'update', 'show', 'destroy')->names('cobros');

    Route::resource('ventas', VentaController::class);
    Route::resource('reportes', ReporteController::class);

    Route::get('compras/almacen', function(){
        return view('compra.almacen.index');
    })->name('compra.almacen'); //Gestionar almacen

    Route::get('compras/almacen/{codalm}/create', function($codalm){
        return view('compra.create', compact('codalm'));
    })->name('compra.almacen.create'); //Agregar compra de un almacen x

    Route::get('compras/{codalm}', function($codalm){
        return view('compra.index');
    })->name('compra.index'); //Visualizar compras de un almacen

    Route::get('compras/{codcompra}/{codalm}', function($codcompra, $codalm){
        return view('compra.almacen.visualizar-compra', compact('codcompra', 'codalm'));
    })->name('compra.almacen.visualizar');  //Visualizar compra x de un almacen x


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

    Route::post('/crear_tipo_de_producto', [ListaProductosValidosController::class, 'create']);
    Route::get('/obtener_productos_validos', [ListaProductosValidosController::class, 'list']);

    Route::post('/nueva_venta/{cliente_id}/{almacen_id}', [VentaController::class, 'store']);

    Route::post('/nueva_compra/{cliente_id}/{almacen_id}', [CompraController::class, 'store']);
});
