<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create admin role if it doesn't exist
        $adminRole = Role::firstOrCreate(['name' => 'admin'], [
            'name' => 'admin',
            'guard_name' => 'web'
        ]);

        // Create admin user
        $admin = User::firstOrCreate(
            ['email' => 'admin@warfoundation.com'],
            [
                'name' => 'Admin User',
                'email' => 'admin@warfoundation.com',
                'password' => Hash::make('password'), // Change this to a secure password
                'role_id' => 1, // Assuming 1 is the ID for admin role
                'phone' => '1234567890',
                'date_of_birth' => '1990-01-01',
                'address' => 'Admin Address',
                'email_verified_at' => now(),
            ]
        );

        // Assign admin role to the user
        $admin->assignRole('admin');

        // Create a default team for the admin if none exists
        if (! $admin->currentTeam) {
            $team = $admin->ownedTeams()->create([
                'name' => 'Admin Team',
                'personal_team' => true,
            ]);
            
            // Assign the team to the user
            $admin->current_team_id = $team->id;
            $admin->save();
        }

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: admin@warfoundation.com');
        $this->command->info('Password: password');

        // Create counselor role if it doesn't exist
        $counselorRole = Role::firstOrCreate(['name' => 'counselor'], [
            'name' => 'counselor',
            'guard_name' => 'web'
        ]);

        // Create counselor user
        $counselor = User::firstOrCreate(
            ['email' => 'counselor@warfoundation.com'],
            [
                'name' => 'Counselor User',
                'email' => 'counselor@warfoundation.com',
                'password' => Hash::make('password'), // Change this to a secure password
                'role_id' => 2, // Assuming 2 is the ID for counselor role
                'phone' => '0987654321',
                'date_of_birth' => '1990-01-01',
                'address' => 'Counselor Address',
                'email_verified_at' => now(),
            ]
        );

        // Assign counselor role to the user
        $counselor->assignRole('counselor');

        // Create a default team for the counselor if none exists
        if (! $counselor->currentTeam) {
            $team = $counselor->ownedTeams()->create([
                'name' => 'Counselor Team',
                'personal_team' => true,
            ]);
            
            // Assign the team to the user
            $counselor->current_team_id = $team->id;
            $counselor->save();
        }

        $this->command->info('\nCounselor user created successfully!');
        $this->command->info('Email: counselor@warfoundation.com');
        $this->command->info('Password: password');
    }
}
