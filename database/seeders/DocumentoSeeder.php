<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Documento;
use App\Models\Venta;

class DocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documento = new Documento();
        // $documento->venta_id = Venta::all()->first()->id;
        $documento->venta_id = 1;
        // $documento->estado = 'Abonado';
        $documento->tipo_pago = 'Pago Móvil';
        $documento->cancelado = 0;
        $documento->tipo_cobro = 'Sin Pagar';
        // $documento->por_cancelar = 0;
        // $documento->total = 32.32;
        $documento->customer_id = Customer::all()->first()->id;
        $documento->save();
    }
}
