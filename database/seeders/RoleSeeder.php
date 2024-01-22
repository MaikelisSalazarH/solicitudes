<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::create(['name' => 'admin']);
        $role_usuario = Role::create(['name' => 'usuario']);

        $permission_create_solicitud = Permission::create(['name' => 'create solicitudes']);
        $permission_read_solicitud = Permission::create(['name' => 'read solicitudes']);
        $permission_update_solicitud = Permission::create(['name' => 'update solicitudes']);
        $permission_delete_solicitud = Permission::create(['name' => 'delete solicitudes']);

        $permission_create_usuario = Permission::create(['name' => 'create usuarios']);
        $permission_read_usuario = Permission::create(['name' => 'read usuarios']);
        $permission_update_usuario = Permission::create(['name' => 'update usuarios']);
        $permission_delete_usuario = Permission::create(['name' => 'delete usuarios']);


        $permission_admin = [
            $permission_create_solicitud,
            $permission_read_solicitud, 
            $permission_update_solicitud, 
            $permission_delete_solicitud,
            $permission_create_usuario,
            $permission_read_usuario,
            $permission_update_usuario,
            $permission_delete_usuario,
        ];

        $permission_usuario = [
            $permission_create_solicitud,
            $permission_read_solicitud,
        ];

        $role_admin->syncPermissions($permission_admin);
        $role_usuario->syncPermissions($permission_usuario);
    }
}
