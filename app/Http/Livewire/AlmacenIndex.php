<?php

namespace App\Http\Livewire;

use App\Models\Almacen;
use Livewire\Component;
use App\Models\Customer;
use App\Models\Documento;
use Livewire\WithPagination;

class AlmacenIndex extends Component
{
    public $almacenes;

    public function mount(){
        $this->almacenes = Almacen::all();
    }

    public function render()
    {
        return view('livewire.almacen-index');
    }
}
