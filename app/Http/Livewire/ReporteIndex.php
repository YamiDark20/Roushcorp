<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Documento;
use App\Models\Venta;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Livewire\WithPagination;

class ReporteIndex extends Component
{
    protected $casts = [
        'fecha_inicio' => 'date:Y-m-d',
        'fecha_fin' => 'date:Y-m-d',
        'cliente_id' => '0'
    ];

    public $fecha_inicio;
    public $fecha_fin;
    public $cliente_id = "0", $clientes;
    public $results;
    public $condicion_cliente = ">=";

    public $results_debug;

    public function mount(){
        $this->fecha_inicio = now();
        $this->fecha_fin = now();
        $this->results = [];
        $this->clientes = Customer::all();
    }

    public function updatedCedulaCliente() {
        if ($this->cliente_id == "0") {
            $this->condicion_cliente = ">";
        }else{
            $this->condicion_cliente = "=";
        }
        $this->actualizarResultados();
    }

    public function updatedClienteId() {
        $this->actualizarResultados();
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
        $this->results = Venta::where('created_at', '>=' , $this->fecha_inicio_formateada)
        ->where('created_at', '<=' , $this->fecha_fin_formateada)->where('cliente_id', $this->condicion_cliente, (int)$this->cliente_id)->where('estado', 'Pagado')->get();
    }

    public function generarFactura() {
        if(!count($this->results)) {
            return;
        }

        $nombre_cliente = Customer::find($this->condicion_cliente)?->name ?? "";
        $fecha_actual = now();
        $fecha_formateada = Carbon::parse($fecha_actual)->isoFormat('dddd, D [de] MMMM [de] YYYY');
        $fecha_formateada = ucfirst($fecha_formateada);
        $pdf = Pdf::loadView('reporte.reporte-pdf', [
            'nombre_cliente' => $nombre_cliente,
            'fecha_inicio_formateada' => $this->fecha_inicio_formateada,
            'fecha_fin_formateada' => $this->fecha_fin_formateada,
            'results' => $this->results,
            'fecha_formateada' => $fecha_formateada
        ]);
        $pdf = $pdf->output();

        return response()->streamDownload(
            fn () => print($pdf),
            "reporte-{$fecha_actual}.pdf"
        );
    }


    public function render()
    {
        return view('livewire.reporte-index');
    }
}
