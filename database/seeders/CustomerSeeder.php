<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer();
        $customer->rif = 'v28462041';
        $customer->name = 'Leonel Araujo Jr';
        $customer->address = 'Anzoategui';
        $customer->telephone = '04245638975';
        $customer->email = 'leonel563@gmail.com';
        $customer->city = 'Barcelona';
        $customer->save();

        $customer1 = new Customer();
        $customer1->rif = 'j25262041';
        $customer1->name = 'Robson Gutierrez';
        $customer1->address = 'Pto La Cruz';
        $customer1->telephone = '04148647512';
        $customer1->email = 'godrobson@gmail.com';
        $customer1->city = 'San Diego';
        $customer1->save();

        $customer2 = new Customer();
        $customer2->rif = 'v26228041';
        $customer2->name = 'Victor Mujica';
        $customer2->address = 'Lecheria';
        $customer2->telephone = '04246694574';
        $customer2->email = 'mujicavictor@hotmail.com';
        $customer2->city = 'NiIdea';
        $customer2->save();
    }
}
