<?php

namespace App\Http\Livewire;

use App\Models\AlmacenProducto;
use App\Models\Compra;
use App\Models\Customer;
use App\Models\Documento;
use App\Models\Factura;
use App\Models\User;
use App\Models\Venta;
use Livewire\Component;

class VentaCreate extends Component
{

    protected $listeners = ['eliminarProducto', 'cantidadProductoActualizada'];

    public $vendedor_seleccionado, $almacen_seleccionado, $cliente_seleccionado, $producto_seleccionado;
    public $vendedores, $clientes, $productos;
    public $cancelado;
    public $check_efectivo_exacto;
    public $cantidades;
    public $tipo_pago, $tipo_documento;

    public function mount(){
        $this->clientes = Customer::all();
        $this->vendedores = User::role('Vendedor')->get();

        $primer_vendedor = $this->vendedores->first();
        $primer_almacen = $primer_vendedor->almacenes->first();
        $productos_primer_almacen = $primer_almacen?->productos_almacen;
        $this->vendedor_seleccionado = $primer_vendedor->id;
        $this->cliente_seleccionado = Customer::first()->id;
        $this->almacen_seleccionado = $primer_almacen?->id;
        $this->producto_seleccionado = $productos_primer_almacen?->first()?->id ?? 0;
        $this->productos = [];
        $this->cantidades = [];
        $this->tipo_pago = 0;
        $this->tipo_documento = 0;
    }

    public function getAlmacenesProperty() {
        return $this->vendedores->find($this->vendedor_seleccionado)->almacenes;
    }

    public function getProductosAlmacenProperty() {
        return $this->almacenes->find($this->almacen_seleccionado)?->productos_almacen ?? [];
    }

    public function getSumaTotal() {
        $suma_total = 0;

        foreach($this->productos as $producto) {
            $suma_total += $producto['total'];
        }

        return $suma_total;
    }

    public function getTotalProperty() {
        $suma_total = $this->getSumaTotal();

        $total = $suma_total - (floatval($this->cancelado) ?? 0);
        $total = $total < 0 || $total == 0 ? 0 : $total;

        return floatval(number_format($total, 2));
    }

    public function getVueltoProperty() {
        $suma_total = $this->getSumaTotal();

        $total = $suma_total - (floatval($this->cancelado) ?? 0);
        $total = $total > 0 || $total == 0 ? 0 : ($total * -1);

        return floatval(number_format($total, 2));
    }

    public function getIvaDivisasProperty() {
        $iva_divisas = Compra::valorDivisa($this->iva);
        $iva_divisas = number_format($iva_divisas, 2);

        return "{$this ->iva} $ / Bs. {$iva_divisas}";
    }

    public function getTotalDivisasProperty() {
        $total_divisas = Compra::valorDivisa($this->total);
        $total_divisas = number_format($total_divisas, 2);

        return "{$this ->total} $ / Bs. {$total_divisas}";
    }

    public function getSubtotalDivisasProperty() {
        $subtotal_divisas = Compra::valorDivisa($this->subtotal);
        $subtotal_divisas = number_format($subtotal_divisas, 2);

        return "{$this ->subtotal} $ / Bs. {$subtotal_divisas}";
    }

    public function getSubtotalProperty() {
        return $this->getSumaTotal() - $this->iva;
    }

    public function getIvaProperty() {
        $suma_iva_total = 0;

        foreach($this->productos as $producto) {
            $suma_iva_total += $producto['iva'];
        }

        return $suma_iva_total;
    }

    public function anadirProducto() {
        $key = $this->producto_seleccionado;

        $object = array(
            'id' => $key,
            'cantidad' => 0,
            'iva' => 0,
            'precio' => 0,
            'total' => 0,
        );

        $this->productos[$key] = $object;
    }

    public function eliminarProducto($producto_eliminar) {
        if (isset($this->productos[$producto_eliminar])) {
            unset($this->productos[$producto_eliminar]);
        }
    }

    public function cantidadProductoActualizada($nueva_cantidad, $producto_actualizar, $precio, $iva, $total) {
        if (isset($this->productos[$producto_actualizar])) {
            $this->productos[$producto_actualizar]['cantidad'] = $nueva_cantidad;
            $this->productos[$producto_actualizar]['precio'] = $precio;
            $this->productos[$producto_actualizar]['iva'] = $iva;
            $this->productos[$producto_actualizar]['total'] = $total;
        }
    }

    public function updated($property, $new_value) {
        if($property == 'almacen_seleccionado') {
            $this->producto_seleccionado = $this->productos_almacen->first()->id;
        }
    }

    public function submit()
    {
        $validatedData = $this->validate([
            'vendedor_seleccionado' => 'required',
            'cliente_seleccionado' => 'required',
            'almacen_seleccionado'=> 'required',
            'tipo_pago' => 'required',
            'tipo_documento' => 'required',
            'productos' => 'required|array',
            'cancelado' => 'required|numeric',
        ]);

        $venta = Venta::create([
            'valor_compra' => $this->getSumaTotal(),
            'cancelado' => floatval(($this->cancelado)),
            'por_cancelar' => floatval(($this->total)),
            'vuelto' => floatval(($this->vuelto)),
            'vendedor_id' => $validatedData['vendedor_seleccionado'],
            'cliente_id' => $validatedData['cliente_seleccionado'],
            'estado' => $this->vuelto? 'Pagado' : ($this->cancelado <= 0 ? 'No Pagado' : 'Abonado'),
            'subtotal' => floatval(($this->subtotal)),
            'iva' => floatval(($this->iva))
        ]);

        if($this->cancelado > 0 ) {
            $documento = new Documento();
            $documento->tipo_pago = $validatedData['tipo_pago'];
            $documento->tipo_cobro = $validatedData['tipo_documento'];
            $documento->cancelado = floatval(($this->cancelado));
            $documento->customer_id = $validatedData['cliente_seleccionado'];
            $documento->venta_id = $venta->id;
            $documento->save();
        }

        $products = $validatedData['productos'];

        foreach ($products as $product) {
            if($product['cantidad'] > 0) {
                $producto_id = AlmacenProducto::find($product['id'])->producto->id;
                Factura::create([
                    'numero_factura' => $venta->id,
                    'producto_id' => $producto_id,
                    'cantidad_producto' => $product['cantidad'],
                    'precio_producto' => $product['precio'],
                    'iva_producto' => $product['iva'],
                    'total_producto' => $product['total'],
                    'venta_id' => $venta->id,
                    'almacen_id' => $validatedData['almacen_seleccionado'],
                ]);
            }
        }

        return redirect('/ventas/'.$venta->id);
    }

    public function store(){
        return redirect()->route('venta.index');
    }

    public function render()
    {
        return view('livewire.venta-create');
    }
}
