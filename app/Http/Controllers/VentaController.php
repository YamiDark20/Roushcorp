<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Almacen;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('venta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $clienteId, int $almacenId)
    {

        try {

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
            
            DB::beginTransaction();
            $cliente = Cliente::find($clienteId);
            $almacen = Almacen::find($almacenId);
            $venta = Venta::create([
                'valor_compra' => $valorCompra,
                'cancelado' => $cancelado,
                'por_cancelar' => $porCancelar,
                'vuelto' => $vuelto,
                'tipo_pago' => $request['tipo_pago'],
                'cliente_id' => $cliente->id,
                'almacen_id' => $almacen->id,
            ]);

            # 'request_creator_id' => $user->id
         
            
            foreach($request['nombre_producto'] as $key){
                if($key !== null){
                    $factura = Factura::create([
                        'numero_factura' => $venta->id,
                        'nombre_producto' => $request['nombre_producto'],
                        'marca_producto' => $request['marca_product'],
                        'peso_producto' => $request['peso_producto'],
                        'cantidad_producto' => $request['cantidad_producto'],
                        'precio_producto' => $request['precio_producto'],
                        'exonerado' => $request['exonerado'],
                        'nombre_cliente' => $cliente->name,
                        'rif_cliente' => $cliente->rif,
                        'direccion_cliente' => $cliente->address,
                        'telefono_cliente' => $cliente->telephone,
                        'nombre_almacen' => $almacen->nombre,
                        'precio_antes_de_impuesto' => $request['precio_antes_de_impuesto'],
                        'precio_total_factura' => $request['precio_total_factura'],
                        'venta_id' => $venta->id,
                    ]);
                }
            }

            
            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }

        $response = [
            'venta' => $venta, 
        ];
        
        
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
