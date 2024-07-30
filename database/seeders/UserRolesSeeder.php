<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

         // Defining the role names associated with role_ids
         $roles = [
            1 => 'admin',
            2 => 'counselor',
            3 => 'member',
            4 => 'student'
        ];

        foreach ($roles as $roleId => $roleName) {
            // Retrieve the role or create if it does not exist
            $role = Role::firstOrCreate(['name' => $roleName]);

            // Assign the role to users with the corresponding role_id
            User::where('role_id', $roleId)->each(function ($user) use ($role) {
                $user->assignRole($role);
            });
        }
    }
}
