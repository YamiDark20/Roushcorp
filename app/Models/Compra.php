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

    public function guia()
    {
        return $this->hasOne(Guia::class);
    }

    public static function valorDivisa($valor) {
        $tasa = TasaDia::all()->first()->tasa;
        return $valor * $tasa;
    }

    public function getValorCompraDivisaAttribute() {
        return $this->valorDivisa($this->valor_compra);
    }

    public function getValorCompraFormateadoAttribute() {
        return "{$this ->valor_compra} $ / Bs. {$this->valor_compra_divisa}";
    }
}
