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
        $documento->numguia = '6372';
        $documento->estado = 'Pagado';
        $documento->tipocambio = 'T';
        $documento->impuesto = 6.78;
        $documento->subtotal = 25.25;
        $documento->total = 32.32;
        $documento->customer_id = Customer::all()->first()->id;
        $documento->save();
    }
}
