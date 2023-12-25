<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $abilities = [
            'read',
            'delete',
            'create',
        ];

        $permissions_by_role = [
            'administrator' => [
                'departments',
                'statuses',
                'users',
                'roles',
                'permissions',
                'languages',
                'notifications',
                'content_management',
                'financial_management',
                'reporting',
                'payroll',
                'disputes_management',
                'api_controls',
                'database_management',
                'repository_management',
            ],
            'supporter' => [
                'api_controls',
                'database_management',
                'repository_management',
            ],
            'customer' => [
                'content_management',
                'financial_management',
                'reporting',
                'payroll',
            ]
        ];

        foreach ($permissions_by_role['administrator'] as $permission) {
            foreach ($abilities as $ability) {
                Permission::create(['name' => $ability . '_' . $permission]);
            }
        }

        foreach ($permissions_by_role as $role => $permissions) {
            $full_permissions_list = [];
            foreach ($abilities as $ability) {
                foreach ($permissions as $permission) {
                    $full_permissions_list[] = $ability . '_' . $permission;
                }
            }
            Role::create(['name' => $role])->syncPermissions($full_permissions_list);
        }

        User::find(1)->assignRole('administrator');
        User::find(2)->assignRole('supporter');
        User::find(3)->assignRole('customer');
    }
}
