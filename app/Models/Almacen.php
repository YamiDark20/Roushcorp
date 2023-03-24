<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;

    protected $table = 'almacenes';

    protected $fillable = ['nombre', 'direccion', 'capacidad', 'estado', 'vendedor_id'];

    public function vendedor() {
        return $this->belongsTo(User::class);
    }

    public function productos_almacen() {
        return $this->hasMany(AlmacenProducto::class);
    }
}
