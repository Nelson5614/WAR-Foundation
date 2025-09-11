<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class CreateStudentUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create-student {email=student@example.com} {password=password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new student user with the given email and password';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');

        // Create student role if it doesn't exist
        $studentRole = Role::firstOrCreate(
            ['name' => 'student'],
            ['guard_name' => 'web']
        );

        // Create or update the student user
        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Test Student',
                'email' => $email,
                'password' => Hash::make($password),
                'email_verified_at' => now(),
                'status' => 'active',
            ]
        );

        // Assign student role if not already assigned
        if (!$user->hasRole('student')) {
            $user->assignRole('student');
        }

        $this->info('Student user created successfully!');
        $this->line('Email: ' . $email);
        $this->line('Password: ' . $password);
    }
}
