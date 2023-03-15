<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;

class AgregarCompra extends Component
{
    public $codalm, $proveedor, $fecha, $codprod;
    public $cantllevar = 0;
    public $productos;
    public $prodcomprados = [];
    public $result = "";

    public function mount(){
        $this->productos = Producto::all();
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
