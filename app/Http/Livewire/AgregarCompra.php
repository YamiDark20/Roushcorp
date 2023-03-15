<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;
use App\Models\Movimiento;
use App\Models\Compra;
use App\Models\MovimientoAlmacen;
use App\Models\ProductosAlmacen;

class AgregarCompra extends Component
{
    public $codalm, $proveedor, $fecha, $codprod, $codcompra, $moneda,
    $guiamov, $tipomov, $impuesto, $estado;
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
        $this->productos = Producto::all();
        $this->productoscomprados = ProductosAlmacen::all();
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
                $movalm = new MovimientoAlmacen();
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
                    $prodalm = new ProductosAlmacen();
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
                $producto[2], $producto[3]);
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
                        if ($this->prodcomprados[$i][0] == $this->codprod
                        && $this->prodcomprados[$i][4] == $this->estado) {
                            #$this->total += ($this->prodcomprados[$i][2] * $this->prodcomprados[$i][3]);
                            $this->total += ($this->cantllevar * $this->prodcomprados[$i][3]);
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
                        $this->total += ($this->cantllevar * $producto->precio);
                        $this->prodcomprados[] = array($this->codprod, $producto->nombre,
                        $this->cantllevar, $producto->precio, $this->estado);
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
