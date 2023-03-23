<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AlmacenProducto;

class AlmacenProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prodalma1 = new AlmacenProducto();
        $prodalma1->producto_id = 2;
        $prodalma1->almacen_id = 1;
        $prodalma1->estado = 'Bueno';
        $prodalma1->stock = '763';
        $prodalma1->cantidad_a_reponer = 45;
        $prodalma1->save();

        $prodalma2 = new AlmacenProducto();
        $prodalma2->producto_id = 4;
        $prodalma2->almacen_id = 1;
        $prodalma2->estado = 'Medio';
        $prodalma2->stock = '232';
        $prodalma2->cantidad_a_reponer = 25;
        $prodalma2->save();

        $prodalma2 = new AlmacenProducto();
        $prodalma2->producto_id = 3;
        $prodalma2->almacen_id = 1;
        $prodalma2->estado = 'Medio';
        $prodalma2->stock = '232';
        $prodalma2->cantidad_a_reponer = 25;
        $prodalma2->save();

        $prodalma3 = new AlmacenProducto();
        $prodalma3->producto_id = 1;
        $prodalma3->almacen_id = 1;
        $prodalma3->estado = 'Malo';
        $prodalma3->stock = '329';
        $prodalma3->cantidad_a_reponer = 13;
        $prodalma3->save();

        $prodalma4 = new AlmacenProducto();
        $prodalma4->producto_id = 4;
        $prodalma4->almacen_id = 2;
        $prodalma4->estado = 'Bueno';
        $prodalma4->stock = '403';
        $prodalma4->cantidad_a_reponer = 25;
        $prodalma4->save();

        $prodalma5 = new AlmacenProducto();
        $prodalma5->producto_id = 3;
        $prodalma5->almacen_id = 3;
        $prodalma5->estado = 'Medio';
        $prodalma5->stock = '555';
        $prodalma5->cantidad_a_reponer = 65;
        $prodalma5->save();
    }
}
