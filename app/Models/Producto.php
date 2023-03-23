<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable =['codigo', 'nombre', 'marca', 'peso',
    'descripcion', 'cantidad', 'precio', 'exonerado'];

    public function getPrecioDivisaAttribute() {
        $tasa = TasaDia::all()->first()->tasa;
        return $this->precio * $tasa;
    }

    public function getPrecioFormateadoAttribute() {
        return "{$this ->precio} $ / Bs. {$this->precio_divisa}";
    }

    public function productos_almacen() {
        return $this->hasMany(AlmacenProducto::class);
    }
}
