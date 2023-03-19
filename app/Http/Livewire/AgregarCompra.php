<?php

namespace App\Http\Livewire;

use App\Models\Compra;
use App\Models\Movimiento;
use App\Models\AlmacenMovimiento;
use Livewire\Component;
use App\Models\Producto;
use App\Models\AlmacenProducto;

class AgregarCompra extends Component
{
    public $codalm, $proveedor, $fecha, $codprod;
    public $cantllevar = 0;
    public $productos;
    public $prodcomprados = [];
    public $result = "";

    public function mount(){
        $this->productos = Producto::all();
        $this->productoscomprados = AlmacenProducto::all();
    }

    public function guardarCompra(){
        #$this->eliminar = $codalm;
        if ($this->codcompra != "" && $this->tipomov != "0" && $this->guiamov != "0"
        && $this->proveedor != "" && $this->moneda != "" && $this->prodcomprados != []
        && $this->fecha != "") {
            $compra = new Compra();
            $compra->codcompra = $this->codcompra;
            $compra->proveedor = $this->proveedor;
            $compra->total = $this->total;
            $compra->moneda = $this->moneda;
            $compra->impuesto = $this->impuesto;
            $compra->save();

            $movimiento = new Movimiento();
            $movimiento->codmov = $this->guiamov;
            $movimiento->codcompra = $this->codcompra;
            $movimiento->fecha = $this->fecha;
            $movimiento->tipomov = $this->tipomov;
            $movimiento->save();

            foreach ($this->prodcomprados as $producto) {
                $movalm = new AlmacenMovimiento();
                $movalm->codmov = $this->guiamov;
                $movalm->codalm = $this->codalm;
                $movalm->codprod = $producto[0];
                $movalm->save();
                $existe = False;

                foreach ($this->productoscomprados as $prodcomp) {
                    if ($prodcomp->idprod == $producto[0] && $prodcomp->idalm == $this->codalm) {
                        $prodcomp->stock += $producto[2];
                        $prodcomp->save();
                        $existe = True;
                        break;
                    }
                }
                if ($existe == False) {
                    $prodalm = new AlmacenProducto();
                    $prodalm->idprod = $producto[0];
                    $prodalm->idalm = $this->codalm;
                    $prodalm->estado = $producto[4];
                    $prodalm->stock = $producto[2];
                    $prodalm->cantReponer = 0;
                    $prodalm->save();
                }
                // $prodalm = new ProductosAlmacen();
                // $prodalm->idprod = $producto[0];

            }
            // $movalm = new MovimientoAlmacen();
            // $movalm->codmov = $this->guiamov;
            // $movalm->codalm = $this->codalm;
            // $movalm->codprod = $this->codalm;
            // $prodalm = new ProductosAlmacen();
            return redirect()->route('compra.almacen');
        }
    }

    public function eliminarProd($codprod){
        #$this->eliminar = $codprod;
        $prodcompradosnuevo = [];
        foreach ($this->prodcomprados as $producto) {
            if ($producto[0] != $codprod) {
                $prodcompradosnuevo[] = array($producto[0], $producto[1],
                $producto[2], $producto[3], $producto[4]);
            }else{
                $this->total -= ($producto[2] * $producto[3]);
            }
        }
        $this->prodcomprados = $prodcompradosnuevo;
    }

    public function agregarProd(){
        if ($this->cantllevar > 0) {
            foreach ($this->productos as $producto) {
                if ($producto->codigo == $this->codprod) {
                    $hayprod = False;
                    for ($i=0; $i < count($this->prodcomprados); $i++) {
                        if ($this->prodcomprados[$i][0] == $this->codprod) {
                            $this->prodcomprados[$i][2] += $this->cantllevar;
                            $hayprod = True;
                            break;
                        }
                    }
                    // foreach ($this->prodcomprados as $prodcomprado) {
                    //     if ($prodcomprado[0] == $this->codprod) {
                    //         $prodcomprado[2] += $this->cantllevar;
                    //         $hayprod = True;
                    //         break;
                    //     }
                    // }
                    if ($hayprod == False) {
                        $this->prodcomprados[] = array($this->codprod, $producto->nombre,
                        $this->cantllevar, $producto->precio);
                    }
                    $this->codprod = "0";
                    #$this->result = "Agregado";
                    break;
                }
            }
        }else{
            #$this->result = "0cant";
        }
    }

    public function render()
    {
        return view('livewire.agregar-compra');
    }
}
