<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CobrosCreate extends Component
{
    public $btncrearprod = 0; // 0 - Agregar prod, 1 - Cancelar
    public $arrayProd = [];
    public $codprod, $nombreprod, $cantprod, $precioprod, $impuesto;
    public $rif = 0;
    public $codfact = "", $fecha = "", $descripcion = "", $moneda = "Bs",
    $nombreC = "", $apellidoC = "", $numguia = "", $estado = "No pagado";
    public $subtotal = 0;
    public $impuestoTotal = 0;

    public function eventBtnCrearProd(){
        if($this->btncrearprod == 0){
            $this->btncrearprod = 1;
        }else{
            $this->btncrearprod = 0;
        }
    }

    public function store(){
        return redirect()->route('cobros.index');
    }

    public function eventBtnArrayProd(){
        $this->arrayProd[] = array($this->codprod, $this->nombreprod, $this->cantprod, $this->precioprod);
        $this->codprod = "";
        $this->nombreprod = "";
        $this->subtotal += $this->cantprod * $this->precioprod;
        $this->impuestoTotal = $this->subtotal * ($this->impuesto / 100);
        $this->cantprod = "";
        $this->precioprod = "";
        $this->btncrearprod = 0;
    }

    public function eventBtnEliminarProd($codprod){
        $array = array();
        for($i=0; $i < count($this->arrayProd); $i++){
            if($codprod != $this->arrayProd[$i][0]){
                $array[] = $this->arrayProd[$i];
            }else{
                $this->subtotal -= $this->arrayProd[$i][2] * $this->arrayProd[$i][3];
                $this->impuestoTotal -= $this->subtotal * ($this->impuesto / 100);
            }
        }
        $this->arrayProd = $array;
    }

    public function render()
    {
        return view('livewire.cobros-create');
    }
}
