<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create roles and permissions first
        $this->call(RolesAndPermissionsSeeder::class);
        
        // Create admin user
        $this->call(AdminUserSeeder::class);
        
        // Create test student user
        $this->call(StudentUserSeeder::class);
        
        // Create test users with different roles
        $this->call(UserRolesSeeder::class);
        $this->call(UserRolesSeeder::class);
        
        // Seed other data
        $this->call(ProjectsTableSeeder::class);
    }
}
