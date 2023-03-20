<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use App\Models\Documento;
use Livewire\WithPagination;

class CobrosIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

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

    #public $pagado = -1; #-1 -nada, 0-nopagado, 1-pagado
    #public $mostrarPag;
    public $activarpagofact = 0, $activarabono = 0;
    public $selectedState = NULL;
    #public $opciones = [["1", "Pagado"], ["2", "No pagado"]];
    public $customers;
    public $documentos;
    public $result = "";
    public $tipo_pago, $tipocambio, $rif;

    public $cliente_seleccionado;
    public $cliente_seleccionado_obj;

    public $cancelados = [];

    public function mount(){
        $this->customers = Customer::all();
        $this->documentos = Documento::all();
        $this->cliente_seleccionado_obj = $this->customers[0];
        $this->cliente_seleccionado = $this->cliente_seleccionado_obj?->id ?? 0;
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    public function updatedClienteSeleccionado()
    {
        $this->cliente_seleccionado_obj = Customer::where('id', '=', $this->cliente_seleccionado)->first();
        $this->emit('clienteSeleccionado', $this->cliente_seleccionado);
    }

    public function pagar($documento_id) {
        $documento = $this->documentos[$documento_id];
        $total = $documento->total;
        $cancelado = $this->cancelados[$documento_id];
        $documento->cancelado += $cancelado;
        $cancelado_actualizado = $documento->cancelado;

        if($cancelado_actualizado >= $total) {
            $documento->estado = "Pagado";

            if($cancelado_actualizado > $total) {
                #TODO: agregar abono a cuenta cliente
            }
        } else {
            $documento->estado = "Abonado";
        }

        $documento->save();

        #TODO: agregar logica de abono aqui y corregirla en ventas para que se produzca en el documento y no en la venta
    }

    public function render()
    {
        return view('livewire.cobros-index');
    }
}
