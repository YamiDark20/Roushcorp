<?php

namespace App\Http\Livewire;

use App\Models\TasaDia as ModelsTasaDia;
use Livewire\Component;

class TasaDia extends Component
{
    public $tasa;
    public $tasa_actual;

    public function mount(){
        $this->tasa = 0;
        $this->tasa_actual = ModelsTasaDia::all()->first()->tasa;
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'tasa' => 'required',
        ]);

        ModelsTasaDia::all()->first()->updateOrFail($validatedData);

        return redirect('/dash');
    }

    public function store(){
        return redirect('/dash');
    }

    public function render()
    {
        return view('livewire.tasa-dia');
    }
}
