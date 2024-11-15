<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\PermissionTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $adminPermissions = [
            'view_profile',
            'edit_profile',
            'manage_users',
            'manage_roles',
            'manage_permissions',
            'add_course',

        ];

        $trainerPermissions = [
            'view_profile',
            'edit_profile',
            'view_courses',
            'view_own_courses',
            'edit_courses',
            'delete_courses',
            'view_students',
        ];

        $studentPermissions = [
            'view_profile',
            'edit_profile',
            'view_courses',
            'enroll_in_courses',
        ];

        foreach ($adminPermissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        foreach ($trainerPermissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        foreach ($studentPermissions as $permission) {
            Permission::create(['name' => $permission]);
        }


        //  assigning permissions to admin , trainer , student

        $adminRole = Role::where('id', '1')->first();
        $adminPermissions = Permission::whereIn('name', $adminPermissions)->get();
        $adminRole->permissions()->sync($adminPermissions);

        $trainerRole = Role::where('id', '2')->first();
        $trainerPermissions = Permission::whereIn('name', $trainerPermissions)->get();
        $trainerRole->permissions()->sync($trainerPermissions);

        $studentRole = Role::where('id', '3')->first();
        $studentPermissions = Permission::whereIn('name', $studentPermissions)->get();
        $studentRole->permissions()->sync($studentPermissions);
    }
}
