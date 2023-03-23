<?php

namespace App\Http\Livewire;

use App\Models\Almacen;
use App\Models\User;
use Livewire\Component;

class AlmacenCreate extends Component
{
    public $nombre, $capacidad, $vendedor_seleccionado, $direccion;
    public $vendedores;

    public function mount(){
        $this->nombre = "";
        $this->capacidad = 0;
        $this->vendedor_seleccionado = 1;
        $this->direccion = "";
        $this->vendedores = User::role('Vendedor')->get();
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'nombre' => 'required',
            'capacidad' => 'required|numeric',
            'vendedor_seleccionado' => 'required',
            'direccion' => 'required'
        ]);

        Almacen::create($validatedData);

        return redirect('almacen.index');
    }

    public function store(){
        return redirect('almacen.create');
    }

    public function render()
    {
        return view('livewire.almacen-create');
    }
}
