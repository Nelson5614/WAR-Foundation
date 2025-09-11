<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class StudentUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create student role if it doesn't exist
        $studentRole = Role::firstOrCreate(['name' => 'student'], [
            'guard_name' => 'web',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create or update the student user
        $student = User::updateOrCreate(
            ['email' => 'student@example.com'],
            [
                'name' => 'Test Student',
                'email' => 'student@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                
            ]
        );

        // Assign student role if not already assigned
        if (!$student->hasRole('student')) {
            $student->assignRole('student');
        }

        $this->command->info('Student user created successfully!');
        $this->command->info('Email: student@example.com');
        $this->command->info('Password: password');
    }
}
