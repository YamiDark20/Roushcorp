<?php

namespace App\Http\Livewire;

use App\Models\Almacen;
use App\Models\User;
use Livewire\Component;

class AlmacenCreate extends Component
{
    public $nombre, $capacidad, $vendedor_id, $direccion, $estado;
    public $vendedores;

    public function mount(){
        $this->nombre = "";
        $this->capacidad = 0;
        $this->vendedor_id = 1;
        $this->direccion = "";
        $this->vendedores = User::role('Vendedor')->get();
        $this->estado = "Activo";
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'nombre' => 'required',
            'capacidad' => 'required|numeric',
            'vendedor_id' => 'required',
            'direccion' => 'required',
            'estado' => 'required'
        ]);

        $almacen = Almacen::create($validatedData);

        return redirect("/almacen/{$almacen->id}");
    }

    public function store(){
        return redirect('almacen.create');
    }

    public function render()
    {
        return view('livewire.almacen-create');
    }
}
