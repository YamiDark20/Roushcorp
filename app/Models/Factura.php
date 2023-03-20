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
        'documento_id',
        'producto_id',
    ];

    public function documento()
    {
        return $this->belongsTo(Documento::class);
    }

    public function producto()
    {
        return $this->hasOne(Producto::class);
    }
}
