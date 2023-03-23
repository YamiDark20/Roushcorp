<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Almacen;
use App\Models\Customer;
use App\Models\Documento;
use App\Models\Producto;
use App\Models\TasaDia;
use App\Models\AlmacenProducto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VentaController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $ventas = Venta::all();
        return view('venta.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        $clientes = Customer::all();
        $almacenes = Almacen::all();
        $tasa_dia = TasaDia::all()->first()->tasa;
        return view('venta.create', compact('productos', 'clientes', 'almacenes', 'tasa_dia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valorCompra = $request['valor_compra'];
        $cancelado = $request['cancelado'];
        $porCancelar = $valorCompra - $cancelado;

        if($porCancelar < 0){
            $porCancelar = $porCancelar * -1;
        }
        $vuelto = 0;

        if($valorCompra - $cancelado < 0){
            $vuelto = $cancelado - $valorCompra;
        }

        $venta = Venta::create([
            'valor_compra' => $valorCompra,
            'cancelado' => $cancelado,
            'por_cancelar' => $porCancelar,
            'vuelto' => $vuelto,
            'cliente_id' => $request['cliente_id'],
            'almacen_id' => $request['almacen_id'],
            'estado' => $vuelto? 'Pagado' : ($cancelado <= 0 ? 'No Pagado' : 'Abonado'),
            'subtotal' => $request['subtotal'],
            'iva' => $request['iva']
        ]);

        if($cancelado > 0 ) {
            $documento = new Documento();
            $documento->tipo_pago = $request['tipo_pago'];
            $documento->tipo_cobro = $request['tipo_documento'];
            $documento->cancelado = $cancelado;
            $documento->customer_id = $request['cliente_id'];
            $documento->venta_id = $venta->id;
            $documento->save();
        }

        $products = $request['productos'];
        $productosAlmacen = AlmacenProducto::all();

        foreach ($products as $product) {
            //Actualizar cantidad de productos de almacen
            foreach ($productosAlmacen as $productoAlmacen) {
                if ($productoAlmacen->idprod == $product['id'] &&
                $request['almacen_id'] == $productoAlmacen->idalm &&
                ($productoAlmacen->estado == 'Bueno' || $productoAlmacen->estado == 'Medio')) {
                    $productoAlmacen->stock = strval(intval($productoAlmacen->stock) - $product['cantidad']);
                    $productoAlmacen->save();
                    break;
                }
            }
            //
            Factura::create([
                'numero_factura' => $venta->id,
                'producto_id' => $product['id'],
                'cantidad_producto' => $product['cantidad'],
                'precio_producto' => $product['precio'],
                'iva_producto' => $product['iva'],
                'total_producto' => $product['total'],
                'venta_id' => $venta->id,
            ]);
        }

        $this->show($venta->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        return view('venta.show', compact('venta'));
    }

}
