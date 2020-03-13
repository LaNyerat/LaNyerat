<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name' => 'admin'],
            ['name' => 'user']
        ];

        if($roles) {
            foreach($roles as $role) {
                Role::firstOrCreate($role);
            }
        }

        $permissions = [
            ['name' => 'create-post'],
            ['name' => 'create-tag'],
            ['name' => 'create-user'],
            ['name' => 'create-page'],
            ['name' => 'create-acl'],
            ['name' => 'delete-acl'],
            ['name' => 'delete-post'],
            ['name' => 'delete-user'],
            ['name' => 'delete-page'],
            ['name' => 'delete-tag'],
            ['name' => 'edit-user'],
            ['name' => 'edit-page'],
            ['name' => 'edit-tag'],
            ['name' => 'edit-acl'],
            ['name' => 'edit-post'],
            ['name' => 'access-dashboard'],
        ];

        if($permissions) {
            foreach($permissions as $permission) {
                Permission::firstOrCreate($permission);
            }
        }

        $admin = Role::whereName('admin')->first();
        $admin->syncPermissions($permissions);
    }
}
