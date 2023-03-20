<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'Solicitar Pedido']);
        Permission::create(['name' => 'Generar Pago']);
        Permission::create(['name' => 'Gestionar Compras']);
        Permission::create(['name' => 'Gestionar Inventario']);
        Permission::create(['name' => 'Gestionar Productos']);
        Permission::create(['name' => 'Gestionar Cobros']);
        Permission::create(['name' => 'Verificar Pagos']);
        Permission::create(['name' => 'Generar Reportes']);
        Permission::create(['name' => 'Generar Facturas']);
        Permission::create(['name' => 'Gestionar Ventas']);
        Permission::create(['name' => 'Gestionar Clientes']);

        // create roles and assign existing permissions
        $rol_vendedor = Role::create(['name' => 'Vendedor']);
        $rol_vendedor->givePermissionTo('Solicitar Pedido');
        $rol_vendedor->givePermissionTo('Generar Pago');
        $rol_vendedor->givePermissionTo('Gestionar Compras');
        $rol_vendedor->givePermissionTo('Generar Facturas');
        $rol_vendedor->givePermissionTo('Gestionar Ventas');
        $rol_vendedor->givePermissionTo('Gestionar Clientes');

        $rol_gerente = Role::create(['name' => 'Gerente Abastecimiento']);
        $rol_gerente->givePermissionTo('Gestionar Compras');
        $rol_gerente->givePermissionTo('Gestionar Productos');
        $rol_gerente->givePermissionTo('Gestionar Inventario');
        $rol_gerente->givePermissionTo('Gestionar Cobros');

        $rol_contador = Role::create(['name' => 'Contador']);
        $rol_contador->givePermissionTo('Gestionar Cobros');
        $rol_contador->givePermissionTo('Verificar Pagos');
        $rol_contador->givePermissionTo('Generar Reportes');
        $rol_contador->givePermissionTo('Gestionar Ventas');
        $rol_contador->givePermissionTo('Generar Facturas');

        $usuario_vendedor = User::create([
            'name' => 'vendedor',
            'email' => 'vendedor@example.com',
            'password' => Hash::make('vendedor@example.com'),
            'email_verified_at' => now(),
        ]);

        $usuario_vendedor->assignRole($rol_vendedor);

        $usuario_gerente = User::create([
            'name' => 'gerente',
            'email' => 'gerente@example.com',
            'password' => Hash::make('gerente@example.com'),
            'email_verified_at' => now(),
        ]);

        $usuario_gerente->assignRole($rol_gerente);

        $usuario_contador = User::create([
            'name' => 'contador',
            'email' => 'contador@example.com',
            'password' => Hash::make('contador@example.com'),
            'email_verified_at' => now(),
        ]);

        $usuario_contador->assignRole($rol_contador);
    }
}
