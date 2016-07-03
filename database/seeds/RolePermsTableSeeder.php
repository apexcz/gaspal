<?php

use Illuminate\Database\Seeder;
use Bican\Roles\Models\Role;
use Bican\Roles\Models\Permission;

class RolePermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            [
                'name' => 'Super Admin',
                'slug' => 'super.admin',
                'description' => 'Super Admin', // optional
                'level' => 15, // optional, set to 1 by default
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'description' => '', // optional
                'level' => 10, // optional, set to 1 by default
            ],
            [
                'name' => 'Poster',
                'slug' => 'poster',
                'description' => 'Manages posts of product prices', // optional
                'level' => 3, // optional, set to 1 by default
            ],
            [
                'name' => 'User',
                'slug' => 'user',
                'description' => 'User', // optional
                'level' => 1, // optional, set to 1 by default
            ],
        ];

        DB::table('roles')->insert($roles);

        //Seed permissions

        $perms = [
            [
                'name' => 'View users',
                'slug' => 'view.users',
                'description' => 'View users', // optional
            ],
            [
                'name' => 'Create users',
                'slug' => 'create.users',
                'description' => 'Create users', // optional
            ],
            [
                'name' => 'Edit users',
                'slug' => 'edit.users',
                'description' => 'Edit users', // optional
            ],
            [
                'name' => 'Activate users',
                'slug' => 'activate.users',
                'description' => 'Activate users', // optional
            ],
            [
                'name' => 'View settings',
                'slug' => 'view.settings',
                'description' => 'View settings', // optional
            ],
            [
                'name' => 'Edit settings',
                'slug' => 'edit.settings',
                'description' => 'Edit Settings', // optional
            ],
        ];

        DB::table('permissions')->insert($perms);

        $superAdminRole = Role::findOrFail(1);
        $superAdminRole->permissions()->sync([1,2,3,4]);
    }
}
