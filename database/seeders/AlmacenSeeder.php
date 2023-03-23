<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Almacen;
use App\Models\User;

class AlmacenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $vendedor_id = User::role('Vendedor')->get()->first()->id;

        $almacen1 = new Almacen();
        $almacen1->nombre = 'Almacen 1';
        $almacen1->direccion = 'Nidea';
        $almacen1->capacidad = '53211';
        $almacen1->estado = 'Activo';
        $almacen1->vendedor_id = $vendedor_id;
        $almacen1->save();

        $almacen2 = new Almacen();
        $almacen2->nombre = 'Almacen 2';
        $almacen2->direccion = 'Maricaba';
        $almacen2->capacidad = '631';
        $almacen2->estado = 'Activo';
        $almacen2->vendedor_id = $vendedor_id;
        $almacen2->save();

        $almacen3 = new Almacen();
        $almacen3->nombre = 'Almacen 3';
        $almacen3->direccion = 'Poryha';
        $almacen3->capacidad = '8211';
        $almacen3->estado = 'Activo';
        $almacen3->vendedor_id = $vendedor_id;
        $almacen3->save();

        $almacen4 = new Almacen();
        $almacen4->nombre = 'Almacen 4';
        $almacen4->direccion = 'Maricaba';
        $almacen4->capacidad = '666';
        $almacen4->estado = 'Activo';
        $almacen4->vendedor_id = $vendedor_id;
        $almacen4->save();

        $almacen5 = new Almacen();
        $almacen5->nombre = 'Almacen 5';
        $almacen5->direccion = 'Lucaba';
        $almacen5->capacidad = '4523';
        $almacen5->estado = 'Activo';
        $almacen5->vendedor_id = $vendedor_id;
        $almacen5->save();
    }
}
