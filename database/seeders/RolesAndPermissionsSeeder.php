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
        $admin = Role::create(['name' => 'admin']);
        $counselor = Role::create(['name' => 'counselor']);
        $student = Role::create(['name' => 'student']);
        $member = Role::create(['name' => 'member']);

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
