<?php

namespace App\Http\Livewire;

use App\Models\AlmacenProducto;
use App\Models\Compra;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class ProductoRow extends Component
{
    public $producto, $temp_cantidad;

    public function mount($producto){
        $this->producto = $producto;
    }

    public function getIvaDivisasProperty() {
        $iva_divisas = Compra::valorDivisa($this->iva);
        $iva_divisas = number_format($iva_divisas, 2);
        $iva_formatted = number_format($this ->iva, 2);

        return "{$iva_formatted} $ / Bs. {$iva_divisas}";
    }

    public function getTotalDivisasProperty() {
        $total_divisas = Compra::valorDivisa($this->total);
        $total_divisas = number_format($total_divisas, 2);
        $total_formatted = number_format($this ->total, 2);

        return "{$total_formatted} $ / Bs. {$total_divisas}";
    }

    public function getIvaProperty() {
        $iva = ($this->producto_obj->exonerado ? 0 : 0.16) * floatval($this->total);
        return floatval($iva);
    }

    public function getTotalProperty() {
        $total = ($this->producto_obj->precio) * intval($this->producto['cantidad']);
        return floatval($total);
    }

    public function getProductoAlmacenProperty() {
        return AlmacenProducto::find($this->producto['id']);
    }

    public function getProductoObjProperty() {
        return $this->producto_almacen->producto;
    }

    public function handleEliminarProducto() {
        $this->emit('eliminarProducto', $this->producto['id']);
    }

    public function updated($property, $nuevo_valor) {
        if($property == 'producto.cantidad') {
            $this->emitUp('cantidadProductoActualizada', $nuevo_valor , $this->producto['id'], $this->producto_obj->precio , $this->iva, $this->total);
        }
    }

    public function render()
    {
        return view('livewire.producto-row');
    }
}
