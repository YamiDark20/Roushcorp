<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenProducto extends Model
{
    use HasFactory;

    public function documentos()
    {
        return $this->belongsTo(Documento::class);
    }

    public function almacen() {
        return $this->belongsTo(Almacen::class, 'almacen_id', 'id');
    }

    public function producto() {
        return $this->belongsTo(Producto::class, 'producto_id', 'id');
    }
}
