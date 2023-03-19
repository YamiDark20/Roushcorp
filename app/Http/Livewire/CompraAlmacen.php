<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Movimiento;
use App\Models\Compra;
use App\Models\AlmacenMovimiento;
use App\Models\AlmacenProducto;

class CompraAlmacen extends Component
{

    public $codalm, $proveedor, $fecha, $codprod, $codcompra, $moneda,
    $guiamov, $tipomov, $impuesto, $estado, $compras, $movimientos, $movalms;
    public $cantllevar = 0;
    public $total = 0.0;
    public $productos, $productoscomprados;
    public $prodcomprados = [];
    public $result = "";
    #public $eliminar = "";

    #Cuando se pasa de Bs a dolar, multiplicamos lo que esta en $cambioBsaDolar
    #por el monto en Bs
    public $cambioBsaDolar = (1 / 2406310);
    #Cuando se pasa de dolar a Bs, multiplicamos lo que esta en $cambioDolaraBs
    #por el monto en Dolar
    public $cambioDolaraBs = 2406310;

    #Cuando se pasa de Bs a euro, multiplicamos lo que esta en $cambioBsaEuro
    #por el monto en Bs
    public $cambioBsaEuro = (1 / 2581730);
    #Cuando se pasa de euro a Bs, multiplicamos lo que esta en $cambioEuroaBs
    #por el monto en Euro
    public $cambioEuroaBs = 2581730;

    #Cuando se pasa de dolar a Euro, multiplicamos lo que esta en $cambioDolaraEuro
    #por el monto en Dolar
    public $cambioDolaraEuro = 0.93177574;
    #Cuando se pasa de Euro a Dolar, multiplicamos lo que esta en $cambioEuroaDolar
    #por el monto en Euro
    public $cambioEuroaDolar = 1.07316;

    public function mount(){
        $this->compras = Compra::all();
        $this->movimientos = Movimiento::all();
        $this->movalms = AlmacenMovimiento::all();
        $this->productos = Producto::all();
        $this->productoscomprados = AlmacenProducto::all();
        foreach ($this->compras as $compra) {
            if ($compra->codcompra == $this->codcompra) {
                foreach ($this->movimientos as $mov) {
                    if ($mov->codcompra == $this->codcompra) {
                        $this->proveedor = $compra->proveedor;
                        $this->fecha = $mov->fecha;
                        $this->moneda = $compra->moneda;
                        $this->guiamov = $mov->codmov;
                        $this->tipomov = ucwords($mov->tipomov);
                        $this->impuesto = $compra->impuesto;
                        $this->total = $compra->total;
                        foreach ($this->movalms as $movalm) {
                            if ($movalm->codmov == $mov->codmov &&
                            $movalm->codalm == $this->codalm) {
                                foreach ($this->productos as $prod) {
                                    if ($prod->codigo == $movalm->codprod) {
                                        $this->prodcomprados[] = array($prod->codigo,
                                        $prod->nombre);
                                    }
                                }
                            }
                        }
                        break;
                    }
                }
                break;
            }
        }
    }

    public function render()
    {
        return view('livewire.compra-almacen');
    }
}
