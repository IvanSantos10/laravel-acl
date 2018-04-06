<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'product-list',
            'product-create',
            'product-edit',
            'product-delete'
        ];

        $permiss = [];
        foreach ($permissions as $permission) {
            $permiss[] = Permission::create(['name' => $permission]);
        }

        $role_admin = Role::create(['name' => 'Super-Admin']);

        $role_admin->syncPermissions($permiss);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('secret')
        ]);

        $user->assignRole($role_admin);
    }
}
