<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Documento;
use App\Models\Venta;
use Livewire\Component;

class CobrosCreate extends Component
{
    public $btncrearprod = 0; // 0 - Agregar prod, 1 - Cancelar
    public $arrayProd = [];
    public $codprod, $nombreprod, $cantprod, $precioprod, $impuesto;
    public $rif = 0;
    public $fecha = "", $descripcion = "", $moneda = "Bs",
    $nombreC = "", $apellidoC = "", $numguia = "", $estado = "No pagado";
    public $subtotal = 0;
    public $impuestoTotal = 0;
    public $customers;
    public $ventas;

    public $cliente_seleccionado_obj, $cliente_seleccionado, $venta_seleccionada, $venta_seleccionada_obj;

    public $abono, $tipo_cobro, $tipo_pago;

    public function mount(){
        $this->customers = Customer::all();
        $this->cliente_seleccionado_obj = $this->customers[0];
        $this->cliente_seleccionado = $this->cliente_seleccionado_obj?->id ?? 0;
        $this->ventas = $this->cliente_seleccionado_obj->ventas;
    }

    public function updatedClienteSeleccionado()
    {
        $this->cliente_seleccionado_obj = Customer::where('id', '=', $this->cliente_seleccionado)->first();
        $this->emit('clienteSeleccionado', $this->cliente_seleccionado);

        $this->venta_seleccionada_obj = Venta::where('id', '=', $this->venta_seleccionada)->first();
        $this->emit('ventaSeleccionada', $this->venta_seleccionada);

        $this->ventas = $this->cliente_seleccionado_obj->ventas;
    }

    public function updatedVentaSeleccionada()
    {
        $this->venta_seleccionada_obj = Venta::where('id', '=', $this->venta_seleccionada)->first();
        $this->emit('ventaSeleccionada', $this->venta_seleccionada);
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'cliente_seleccionado' => 'required',
            'venta_seleccionada' => 'required',
            'abono' => 'required',
            'tipo_pago' => 'required',
            'tipo_cobro' => 'required',
        ]);

        $tipoCobro = $validatedData['tipo_cobro'];
        $venta = $this->venta_seleccionada_obj;
        $valorCompra = $venta->valor_compra;
        $cancelado = $validatedData['abono'];

        if($tipoCobro == "Nota de credito") {
            $venta->cancelado = $venta->cancelado - $validatedData['abono'];
            $cancelado = $venta->cancelado;
        } else {
            $cancelado += $venta->cancelado;
        }

        $porCancelar = $valorCompra - $cancelado;

        if($porCancelar < 0){
            $porCancelar = $porCancelar * -1;
        }
        $vuelto = 0;

        if($valorCompra - $cancelado < 0) {
            $vuelto = $cancelado - $valorCompra;
        }

        $documento = new Documento();
        $documento->tipo_pago = $validatedData['tipo_pago'];
        $documento->cancelado = $validatedData['abono'];
        $documento->customer_id = $validatedData['cliente_seleccionado'];
        $documento->venta_id = $venta->id;
        $documento->tipo_cobro = $tipoCobro;
        $documento->save();

        #TODO: los valores que aparecen aqui se deben remover de documento
        $venta->por_cancelar = $porCancelar;
        $venta->vuelto = $vuelto;
        $venta->cancelado = $cancelado;
        $venta->estado = $vuelto? 'Pagado' : ($cancelado <= 0 ? 'No Pagado' : 'Abonado');
        $venta->save();

        return redirect()->route('cobros.index');
    }

    public function store(){
        return redirect()->route('cobros.index');
    }

    public function render()
    {
        return view('livewire.cobros-create');
    }
}
