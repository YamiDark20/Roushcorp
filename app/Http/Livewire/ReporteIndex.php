<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Documento;
use App\Models\Venta;
use Carbon\Carbon;
use Livewire\WithPagination;

class ReporteIndex extends Component
{
    protected $casts = [
        'fecha_inicio' => 'date:Y-m-d',
        'fecha_fin' => 'date:Y-m-d',
    ];

    public $fecha_inicio;
    public $fecha_fin;
    public $results;

    public $results_debug;

    public function mount(){
        $this->fecha_inicio = now();
        $this->fecha_fin = now();
        $this->results = [];
    }

    public function updatedFechaInicio() {
        $this->actualizarResultados();
    }

    public function updatedFechaFin() {
        $this->actualizarResultados();
    }

    public function actualizarResultados() {
        $this->fecha_inicio_formateada = Carbon::parse($this->fecha_inicio)->format('Y-m-d');
        $this->fecha_fin_formateada = Carbon::parse($this->fecha_fin)->format('Y-m-d');
        $this->results = Venta::where('created_at', '>=' , $this->fecha_inicio_formateada)->where('created_at', '<=' , $this->fecha_fin_formateada)->where('estado', 'Pagado')->get();
    }


    public function render()
    {
        return view('livewire.reporte-index');
    }
}
