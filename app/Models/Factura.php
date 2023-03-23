<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';

    protected $fillable = [
        'cantidad_producto',
        'precio_producto',
        'total_producto',
        'iva_producto',
        'venta_id',
        'producto_id',
        'almacen_id'
    ];

    public function venta()
    {
        return $this->belongsTo(Venta::class);
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }

    public function producto()
    {
        return $this->hasOne(Producto::class, 'id', 'producto_id');
    }

    public function getIvaProductoDivisaAttribute() {
        return Compra::valorDivisa($this->iva_producto);
    }

    public function getIvaProductoFormateadoAttribute() {
        return "{$this ->iva_producto} $ / Bs. {$this->iva_producto_divisa}";
    }

    public function getPrecioProductoDivisaAttribute() {
        return Compra::valorDivisa($this->precio_producto);
    }

    public function getPrecioProductoFormateadoAttribute() {
        return "{$this ->precio_producto} $ / Bs. {$this->precio_producto_divisa}";
    }

    public function getTotalProductoDivisaAttribute() {
        return Compra::valorDivisa($this->total_producto);
    }

    public function getTotalProductoFormateadoAttribute() {
        return "{$this ->total_producto} $ / Bs. {$this->total_producto_divisa}";
    }
}
