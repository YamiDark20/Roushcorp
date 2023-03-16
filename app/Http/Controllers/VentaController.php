<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Almacen;
use App\Models\Customer;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;

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
        return view('venta.create', compact('productos', 'clientes', 'almacenes'));
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
            'tipo_documento' => $request['tipo_documento'],
            'tipo_pago' => $request['tipo_pago'],
            'cliente_id' => $request['cliente_id'],
            'almacen_id' => $request['almacen_id']
        ]);

        $products = $request['productos'];

        foreach ($products as $product) {
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

        return $venta;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Venta::find($id);
    }

}
