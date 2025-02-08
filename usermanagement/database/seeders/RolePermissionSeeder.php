<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['Admin', 'Manager', 'User'];
        $permissions = ['view users', 'create users', 'edit users', 'delete users'];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission, 'guard_name' => 'web']);
        }

        foreach ($roles as $role) {
            $roleInstance = Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);

            if ($role === 'Admin') {
                $roleInstance->syncPermissions($permissions);
            } elseif ($role === 'Manager') {
                $roleInstance->syncPermissions(['view users', 'create users']);
            }
        }
    }
}
