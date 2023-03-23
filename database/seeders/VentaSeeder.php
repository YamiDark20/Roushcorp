<?php

namespace Database\Seeders;

use App\Models\Almacen;
use App\Models\Customer;
use App\Models\User;
use App\Models\Venta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $venta = new Venta();
        $venta->vuelto = 0;
        $venta->cancelado = 0;
        $venta->iva = 0;
        $venta->subtotal = 32.32;
        $venta->valor_compra = 32.32;
        $venta->por_cancelar = 32.32;
        $venta->cliente_id = Customer::all()->first()->id;
        $venta->vendedor_id = User::role('Vendedor')->first()->id;
        $venta->save();
    }
}
