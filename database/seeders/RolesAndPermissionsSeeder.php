<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles
        if (!Role::where('name', 'admin')->exists()) {
            $admin = Role::create(['name' => 'admin']);
        } else {
            $admin = Role::where('name', 'admin')->first();
        }

        if (!Role::where('name', 'counselor')->exists()) {
            $counselor = Role::create(['name' => 'counselor']);
        } else {
            $counselor = Role::where('name', 'counselor')->first();
        }
        if (!Role::where('name', 'student')->exists()) {
            $student = Role::create(['name' => 'student']);
        } else {
            $student = Role::where('name', 'student')->first();
        }

        if (!Role::where('name', 'member')->exists()) {
            $member = Role::create(['name' => 'member']);
        } else {
            $member = Role::where('name', 'member')->first();
        }

        //creating permmissions
        $viewProjects = Permission::create(['name' => 'view projects']);
        $editProjects = Permission::create(['name' => 'edit projects']);
        $deleteProjects = Permission::create(['name' => 'delete projects']);
        $addProjects = Permission::create(['name' => 'add projects']);

        //assign permissions to roles
        $admin->givePermissionTo($viewProjects, $editProjects, $deleteProjects, $addProjects);
        $counselor->givePermissionTo($viewProjects);
        $member->givePermissionTo($viewProjects);
    }
}
