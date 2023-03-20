<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin@example.com'),
            'email_verified_at' => now(),
        ]);

        $adminRole = Role::create(['name' => 'Super Admin']);
        $adminUser->assignRole($adminRole);

        $this->call(CustomerSeeder::class);
        $this->call(AlmacenSeeder::class);
        $this->call(ProductoSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(VentaSeeder::class);
        $this->call(DocumentoSeeder::class);
    }
}
