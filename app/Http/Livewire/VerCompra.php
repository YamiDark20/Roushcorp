<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Compra;
use App\Models\ProductosComprados;
use App\Models\Guia;
use App\Models\Customer;
// use Livewire\Component;
use App\Models\Producto;
use App\Models\AlmacenProducto;

class VerCompra extends Component
{
    public $codalm, $proveedor, $fechallegada, $codprod, $total, $tipopago,
    $codcompra, $fechasalida, $origen, $destino, $estado;
    public $cantllevar = 0;
    public $nombrecliente = "";
    public $clientes, $productos, $productoscomprados;
    public $prodcomprados = [];
    public $result = "";

    public function mount(){
        $this->productos = Producto::all();
        $clientes = Customer::all();
        $this->productoscomprados = AlmacenProducto::all();
        $compras = Compra::all();
        $guias = Guia::all();
        $prodcomprados = ProductosComprados::all();
        foreach($compras as $compra){
            if ($compra->id == $this->codcompra && $compra->almacen_id == $this->codalm) {
                $this->total = $compra->valor_compra;
                $this->tipopago = $compra->tipo_pago;
                foreach ($clientes as $cliente) {
                    if ($cliente->id == $compra->cliente_id) {
                        $this->proveedor = $cliente->rif;
                        $this->nombrecliente = $cliente->name;
                        break;
                    }
                }
                foreach ($guias as $guia) {
                    if ($compra->guias_id == $guia->id) {
                        $this->origen = $guia->origen;
                        $this->destino = $guia->destino;
                        $this->fechallegada = $guia->fecha_llegada;
                        $this->fechasalida = $guia->fecha_salida;
                        break;
                    }
                }
                break;
            }
        }
    }

    public function render()
    {
        return view('livewire.ver-compra');
    }
}
