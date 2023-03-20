<?php

namespace Database\Seeders;

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
        // $documento->rifcliente = 'v28462041';
        $documento->fecha = '26/03/22';
        $documento->numguia = '6372';
        $documento->moneda = 'Bs';
        $documento->estado = 'Pagado';
        $documento->tipocambio = 'T';
        $documento->total = 32.32;
        $documento->subtotal = 25.25;
        $documento->impuesto = 6.78;
        $documento->save();

        $documento1 = new Documento();
        $documento1->codfact = '2362';
        // $documento1->rifcliente = 'v28462041';
        $documento1->fecha = '28/12/22';
        $documento1->numguia = '8372';
        $documento1->moneda = 'Bs';
        $documento1->estado = 'No pagado';
        $documento1->tipocambio = 'T';
        $documento1->total = 62.32;
        $documento1->subtotal = 44.25;
        $documento1->impuesto = 18.78;
        $documento1->save();

        $documento2 = new Documento();
        $documento2->codfact = '2223';
        // $documento2->rifcliente = 'v28462041';
        $documento2->fecha = '12/03/19';
        $documento2->numguia = '5641';
        $documento2->moneda = 'Bs';
        $documento2->estado = 'Pagado';
        $documento2->tipocambio = 'PM';
        $documento2->total = 32.32;
        $documento2->subtotal = 25.25;
        $documento2->impuesto = 6.78;
        $documento2->save();

        $documento3 = new Documento();
        $documento3->codfact = '1185';
        // $documento3->rifcliente = 'v28462041';
        $documento3->fecha = '02/12/12';
        $documento3->numguia = '3884';
        $documento3->moneda = 'Bs';
        $documento3->estado = 'No pagado';
        $documento3->tipocambio = 'T';
        $documento3->total = 654.54;
        $documento3->subtotal = 444.25;
        $documento3->impuesto = 118.78;
        $documento3->save();

        $documento4 = new Documento();
        $documento4->codfact = '6633';
        // $documento4->rifcliente = 'v28462041';
        $documento4->fecha = '09/03/19';
        $documento4->numguia = '2225';
        $documento4->moneda = 'Bs';
        $documento4->estado = 'Abonado';
        $documento4->tipocambio = 'PM';
        $documento4->total = 123.32;
        $documento4->subtotal = 95.25;
        $documento4->impuesto = 29.78;
        $documento4->save();

        $documento5 = new Documento();
        $documento5->codfact = '5540';
        // $documento5->rifcliente = 'j25262041';
        $documento5->fecha = '12/03/19';
        $documento5->numguia = '5641';
        $documento5->moneda = 'Bs';
        $documento5->estado = 'Pagado';
        $documento5->tipocambio = 'PM';
        $documento5->total = 32.32;
        $documento5->subtotal = 25.25;
        $documento5->impuesto = 6.78;
        $documento5->save();

        $documento6 = new Documento();
        $documento6->codfact = '9820';
        // $documento6->rifcliente = 'v26228041';
        $documento6->fecha = '09/03/19';
        $documento6->numguia = '2225';
        $documento6->moneda = 'Bs';
        $documento6->estado = 'Abonado';
        $documento6->tipocambio = 'PM';
        $documento6->total = 123.32;
        $documento6->subtotal = 95.25;
        $documento6->impuesto = 29.78;
        $documento6->save();

        $documento7 = new Documento();
        $documento7->codfact = '3440';
        // $documento7->rifcliente = 'v26228041';
        $documento7->fecha = '12/03/19';
        $documento7->numguia = '5641';
        $documento7->moneda = 'Bs';
        $documento7->estado = 'Pagado';
        $documento7->tipocambio = 'PM';
        $documento7->total = 32.32;
        $documento7->subtotal = 25.25;
        $documento7->impuesto = 6.78;
        $documento7->save();

        $documento8 = new Documento();
        $documento8->codfact = '3040';
        // $documento8->rifcliente = 'v26228041';
        $documento8->fecha = '12/03/19';
        $documento8->numguia = '5641';
        $documento8->moneda = '';
        $documento8->estado = '';
        $documento8->tipocambio = '';
        $documento8->total = 32.32;
        $documento8->subtotal = 25.25;
        $documento8->impuesto = 6.78;
        $documento8->save();

        $documento9 = new Documento();
        $documento9->codfact = '9020';
        // $documento9->rifcliente = 'v26228041';
        $documento9->fecha = '09/03/19';
        $documento9->numguia = '2225';
        $documento9->moneda = '';
        $documento9->estado = '';
        $documento9->tipocambio = '';
        $documento9->total = 123.32;
        $documento9->subtotal = 95.25;
        $documento9->impuesto = 29.78;
        $documento9->save();
    }
}
