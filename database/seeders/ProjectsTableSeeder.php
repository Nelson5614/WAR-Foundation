<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        // Create some example projects
        Project::create([
            'title' => 'Project 1',
            'manager' => 'John Doe',
            'start_date' => '2023-01-01',
            'end_date' => '2023-06-01',
            'status' => 'active',
            'description' => 'Description for Project 1',
        ]);

        Project::create([
            'title' => 'Project 2',
            'manager' => 'Jane Smith',
            'start_date' => '2023-02-01',
            'end_date' => '2023-07-01',
            'status' => 'in_progress',
            'description' => 'Description for Project 2',
        ]);

        Project::create([
            'title' => 'Project 3',
            'manager' => 'Alice Johnson',
            'start_date' => '2023-03-01',
            'end_date' => '2023-08-01',
            'status' => 'complete',
            'description' => 'Description for Project 3',
        ]);
    }
}
