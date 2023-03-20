<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    use HasFactory;

    protected $table = 'guias';

    protected $fillable = ['origen', 'destino', 'fecha_salida', 'fecha_llegada'];

    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }
}
