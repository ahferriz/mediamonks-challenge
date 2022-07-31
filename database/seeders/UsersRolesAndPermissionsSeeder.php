<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersRolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permisos
        Permission::create(['name' => 'crear articulo']);
        Permission::create(['name' => 'editar articulo']);
        Permission::create(['name' => 'borrar articulo']);
        Permission::create(['name' => 'restaurar articulo']);
        Permission::create(['name' => 'ver articulo']);

        // Roles
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(['crear articulo', 'editar articulo', 'ver articulo', 'borrar articulo', 'restaurar articulo']);

        $editorRole = Role::create(['name' => 'editor']);
        $editorRole->givePermissionTo(['editar articulo', 'ver articulo']);

        $usuarioRole = Role::create(['name' => 'usuario']);
        $usuarioRole->givePermissionTo('ver articulo');

        // Usuarios
        $adminUser = User::create([
            'name' => 'Administrador',
            'email' => 'admin@trapa.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => Carbon::now(),
        ]);
        $adminUser->assignRole('admin');

        $editorUser = User::create([
            'name' => 'Editor',
            'email' => 'editor@trapa.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => Carbon::now(),
        ]);
        $editorUser->assignRole('editor');

        $usuarioUser = User::create([
            'name' => 'Usuario',
            'email' => 'usuario@trapa.com',
            'password' => Hash::make('secret'),
            'email_verified_at' => Carbon::now(),
        ]);
        $usuarioUser->assignRole('usuario');
    }
}
