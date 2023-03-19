<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Documento;

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
        $documento->codfact = '5362';
        $documento->estado = 'Pagado';
        $documento->tipo_pago = 'Pago Móvil';
        $documento->cancelado = 25.25;
        $documento->total = 32.32;
        $documento->customer_id = Customer::all()->first()->id;
        $documento->save();
    }
}
