<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create Roles

        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);

        $permissions = [
            [
                'group_name'  => 'dashboard',
                'permissions' => [
                    //dashboard
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],
            [
                'group_name'  => 'blog',
                'permissions' => [
                    // blog Permission
                    'blog.create',
                    'blog.view',
                    'blog.edit',
                    'blog.delete',
                    'blog.approve',
                ]
            ],
            [
                'group_name'  => 'admin',
                'permissions' => [
                    // Admin  Permissions
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ]
            ],
            [
                'group_name'  => 'superadmin',
                'permissions' => [
                    // superadmin  Permissions
                    'superadmin.create',
                    'superadmin.view',
                    'superadmin.edit',
                    'superadmin.delete',
                    'superadmin.approve',
                ]
            ],
            [
                'group_name'  => 'role',
                'permissions' => [
                    // Role  Permissions
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],
            [
                'group_name'  => 'profile',
                'permissions' => [
                    // Profile  Permissions
                    'profile.create',
                    'profile.view',
                    'profile.edit',
                ]
            ],
        ];

        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];

            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                // Create permission
                $permission =  Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
