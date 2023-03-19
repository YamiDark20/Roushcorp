<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AlmacenProducto;

class ProductoAlmacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodalma1 = new AlmacenProducto();
        $prodalma1->idprod = '1232';
        $prodalma1->idalm = 1;
        $prodalma1->estado = 'Bueno';
        $prodalma1->stock = '7636273';
        $prodalma1->cantReponer = 45;
        $prodalma1->save();

        $prodalma2 = new AlmacenProducto();
        $prodalma2->idprod = '2728';
        $prodalma2->idalm = 1;
        $prodalma2->estado = 'Medio';
        $prodalma2->stock = '23233323';
        $prodalma2->cantReponer = 25;
        $prodalma2->save();

        $prodalma3 = new AlmacenProducto();
        $prodalma3->idprod = '6372';
        $prodalma3->idalm = 1;
        $prodalma3->estado = 'Malo';
        $prodalma3->stock = '32939232';
        $prodalma3->cantReponer = 13;
        $prodalma3->save();

        $prodalma4 = new AlmacenProducto();
        $prodalma4->idprod = '2728';
        $prodalma4->idalm = 2;
        $prodalma4->estado = 'Bueno';
        $prodalma4->stock = '4039943';
        $prodalma4->cantReponer = 25;
        $prodalma4->save();

        $prodalma5 = new AlmacenProducto();
        $prodalma5->idprod = '6372';
        $prodalma5->idalm = 3;
        $prodalma5->estado = 'Medio';
        $prodalma5->stock = '55528776';
        $prodalma5->cantReponer = 65;
        $prodalma5->save();
    }
}
