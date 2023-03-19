<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Almacen;
use App\Models\AlmacenProducto;
use App\Models\Producto;

class GestionAlmacen extends Component
{
    public $vercontent = 0;
    public $almacenes, $prodalm, $productos;
    public $codalm = '0';
    public $result = "";

    public function mount(){
        $this->productos = Producto::all();
        $this->almacenes = Almacen::all();
        $this->prodalm = AlmacenProducto::all();
    }

    public function btnVerContent()
    {
        if ($this->vercontent == 0) {
            $this->vercontent = 1;
        } else {
            $this->vercontent = 0;
        }

    }

    public function agregarCompra(){
        if ($this->codalm != '0') {
            $codalm = $this->codalm;
            return redirect()->route('compra.almacen.create', compact('codalm'));
        } else {
            $this->result = "Noalmacen.";
        }
    }

    public function render()
    {
        return view('livewire.gestion-almacen');
    }
}
