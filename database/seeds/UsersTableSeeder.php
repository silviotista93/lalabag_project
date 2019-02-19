<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name' => 'Administrador']);
        $bodegaRole = Role::create(['name' => 'Bodega']);
        $vendedorRole = Role::create(['name' => 'Vendedor']);

        $admin = new User;
        $admin->name = 'Silvio Mauricio';
        $admin->apellidos = 'Gutierrez Quiñones';
        $admin->email = 'silviotista93@gmail.com';
        $admin->telefono = '318564382';
        $admin->foto = '';
        $admin->password = 'cantare.de.2310';

        $admin->save();
        $admin->assignRole($adminRole);

        $bodega = new User;
        $bodega->name = 'Silvio';
        $bodega->apellidos = 'Gutierrez';
        $bodega->email = 'smgutierrez@gmail.com';
        $bodega->telefono = '318564382';
        $bodega->foto = '';
        $bodega->password = '123';

        $bodega->save();
        $bodega->assignRole($bodegaRole);

        $vendedor = new User;
        $vendedor->name = 'Cristian';
        $vendedor->apellidos = 'Zalazar';
        $vendedor->email = 'cristian@gmail.com';
        $vendedor->telefono = '318564382';
        $vendedor->foto = '';
        $vendedor->password = '123';

        $vendedor->save();
        $vendedor->assignRole($vendedorRole);
    }
}
