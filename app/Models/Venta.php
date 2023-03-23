<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';

    protected $fillable =['valor_compra','cancelado','por_cancelar',
                        'vuelto','tipo_pago', 'tipo_documento', 'cliente_id', 'vendedor_id', 'subtotal', 'iva', 'vuelto'];

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Customer::class);
    }

    public function vendedor()
    {
        return $this->belongsTo(User::class);
    }

    public function getVueltoDivisaAttribute() {
        return Compra::valorDivisa($this->vuelto);
    }

    public function getVueltoFormateadoAttribute() {
        return "{$this ->vuelto} $ / Bs. {$this->vuelto_divisa}";
    }

    public function getCanceladoDivisaAttribute() {
        return Compra::valorDivisa($this->cancelado);
    }

    public function getCanceladoFormateadoAttribute() {
        return "{$this ->cancelado} $ / Bs. {$this->cancelado_divisa}";
    }

    public function getValorCompraDivisaAttribute() {
        return Compra::valorDivisa($this->valor_compra);
    }

    public function getValorCompraFormateadoAttribute() {
        return "{$this ->valorCompra} $ / Bs. {$this->valor_compra_divisa}";
    }

    public function getSubtotalDivisaAttribute() {
        return Compra::valorDivisa($this->subtotal);
    }

    public function getSubtotalFormateadoAttribute() {
        return "{$this ->subtotal} $ / Bs. {$this->subtotal_divisa}";
    }

    public function getIvaDivisaAttribute() {
        return Compra::valorDivisa($this->iva);
    }

    public function getIvaFormateadoAttribute() {
        return "{$this ->iva} $ / Bs. {$this->iva_divisa}";
    }

    public function getPorCancelarDivisaAttribute() {
        return Compra::valorDivisa($this->por_cancelar);
    }

    public function getPorCancelarFormateadoAttribute() {
        return "{$this ->por_cancelar} $ / Bs. {$this->por_cancelar_divisa}";
    }
}
