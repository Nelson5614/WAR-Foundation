<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
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

          // create roles and assign created permissions
          $admin = Role::create(['name' => 'admin']);
          $counselor = Role::create(['name' => 'counselor']);
          $student = Role::create(['name' => 'student']);
          $member = Role::create(['name' => 'member']);
    }
}
