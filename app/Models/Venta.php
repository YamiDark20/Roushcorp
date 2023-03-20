<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';

    protected $fillable =['valor_compra','cancelado','por_cancelar',
                        'vuelto','tipo_pago', 'tipo_documento', 'cliente_id', 'almacen_id'];

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }

    public function almacen()
    {
        return $this->belongsTo(Almacen::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Customer::class);
    }
}
