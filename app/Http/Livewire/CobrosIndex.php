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
    public $tipopago, $tipocambio, $rif;

    public function mount(){
        $this->customers = Customer::all();
        $this->documentos = Documento::all();
    }

    public function updatingSearch(){
        $this->resetPage();
    }

    // public function btnEventPagado(){
    //     if(($this->pagado == 0)||($this->pagado == -1)){
    //         $this->pagado = 1;
    //     }else{
    //         $this->pagado = -1;
    //     }
    // }

    // public function incrementar()
    // {
    //     $this->pagado = 1;
    // }

    // Al presionar el botón atrás disminuye el contador
    // public function decremento()
    // {
    //     $this->pagado = 0;
    // }

    public function procesarpagofactura(){
        // if(($this->rif != '0')&&($this->tipocambio != '0')&&($this->tipopago != '0')){
        //     $this->result = $this->rif.$this->tipocambio.$this->tipopago;
        // }

        if(($this->rif != '0')
        && ($this->tipocambio != '0') && ($this->tipopago != '0')){
            foreach($this->documentos as $documento){
                if($documento->codfact == $this->rif){
                    $documento->tipocambio = $this->tipocambio;
                    $documento->moneda = $this->tipopago;
                    if ($this->activarpagofact == 1) {
                        $documento->estado = 'Pagado';
                    }
                    $documento->save();
                    $this->result = "Se agrego correctamente";
                    break;
                }
            }
        }else{
            $this->result = "No se pudo agregar el cobro";
        }
        $this->activarabono = 0;
        #$this->mostrarPag = $this->tipopago;
    }

    public function procesarabono(){
        if(($this->rif != '0')
        && ($this->tipocambio != '0') && ($this->tipopago != '0')){
            foreach($this->documentos as $documento){
                if($documento->codfact == $this->rif){
                    $documento->tipocambio = $this->tipocambio;
                    $documento->moneda = $this->tipopago;
                    if ($this->activarabono == 1) {
                        $documento->estado = 'Abonado';
                    }
                    $documento->save();
                    $this->result = "Se agrego correctamente";
                    break;
                }
            }
        }else{
            $this->result = "No se pudo agregar el cobro";
        }
        $this->activarpagofact = 0;
    }

    public function pagofactura()
    {
        if($this->activarpagofact == 0){
            $this->activarpagofact = 1;
            $this->activarabono = 0;
        }else{
            $this->activarpagofact = 0;
        }
    }

    public function abono()
    {
        if($this->activarabono == 0){
            $this->activarabono = 1;
            $this->activarpagofact = 0;
        }else{
            $this->activarabono = 0;
        }
    }

    public function render()
    {
        $cliente = Customer::where('rif', 'LIKE', '%'.$this->search.'%')->firstOrFail();
        $cobros = $cliente->documentos;
        return view('livewire.cobros-index', compact('cobros'));
    }

    #La siguiente funcion es usado para hacer cambios en el html select
    public function updatedSelectedState($state)
    {
        if (!is_null($state)) {
            $this->opciones;
        }
    }
}
