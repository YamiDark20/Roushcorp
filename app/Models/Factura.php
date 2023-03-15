<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'facturas';

    protected $fillable = [
            'nombre_producto',
            'marca_producto',
            'peso_producto',
            'cantidad_producto',
            'precio_producto',
            'exonerado',
            'precio_antes_de_impuesto',
            'precio_total_factura',
            'venta_id',
            'compra_id',
            'cliente_id',
            'almacen_id',

    ];

    public function ventas()
    {
        return $this->belongsTo(Venta::class);
    }

    public function compras()
    {
        return $this->belongsTo(Compra::class);
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
