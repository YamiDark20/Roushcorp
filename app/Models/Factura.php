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
            'nombre_cliente',
            'rif_cliente',
            'direccion_cliente',
            'telefono_cliente',
            'nombre_almacen',
            'precio_antes_de_impuesto',
            'precio_total_factura',
            'venta_id',
            'compra_id'

    ];

    public function ventas()
    {
        return $this->belongsTo(Venta::class);
    }

    public function compras()
    {
        return $this->belongsTo(Compra::class);
    }
}
