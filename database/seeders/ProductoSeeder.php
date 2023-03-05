<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $prod1 = new Producto();
        $prod1->codigo = '6372';
        $prod1->nombre = 'Harina';
        $prod1->marca = 'Pan';
        $prod1->peso = 5.0;
        $prod1->descripcion = 'kakjsjaksjaksksja';
        $prod1->cantidad = 5;
        $prod1->precio = 45.00;
        $prod1->exonerado = 1;
        $prod1->save();

        $prod2 = new Producto();
        $prod2->codigo = '1232';
        $prod2->nombre = 'Leche';
        $prod2->marca = 'Guana';
        $prod2->peso = 6.0;
        $prod2->descripcion = 'Leche nuevo';
        $prod2->cantidad = 18;
        $prod2->precio = 233.98;
        $prod2->exonerado = 1;
        $prod2->save();

        $prod3 = new Producto();
        $prod3->codigo = '8399';
        $prod3->nombre = 'Arroz';
        $prod3->marca = 'Mveza';
        $prod3->peso = 23.0;
        $prod3->descripcion = 'Arroz maria de Vzla';
        $prod3->cantidad = 12;
        $prod3->precio = 62.32;
        $prod3->exonerado = 0;
        $prod3->save();

        $prod4 = new Producto();
        $prod4->codigo = '2728';
        $prod4->nombre = 'Pasta';
        $prod4->marca = 'Elio';
        $prod4->peso = 43.0;
        $prod4->descripcion = 'Pasta Leista de Vzla';
        $prod4->cantidad = 23;
        $prod4->precio = 22.32;
        $prod4->exonerado = 0;
        $prod4->save();
    }
}
