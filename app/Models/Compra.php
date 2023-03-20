<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras';

    protected $fillable =['valor_compra','tipo_pago', 'cliente_id', 'almacen_id', 'guias_id'];

    public function facturas()
    {
        return $this->hasOne(Factura::class);
    }
}
