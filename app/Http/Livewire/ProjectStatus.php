<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class ProjectStatus extends Component
{
 // // This property will hold all the projects from the database
    public $projects;
// This method is called when the component is initialized
    public function mount(){
         // Retrieve all projects and assign them to the $projects property
        $this->projects = Project::all();
        $this->projects = Project::orderBy('created_at', 'desc')->get();// sort created project on the descending order by created_at colunm

        // Call the method to update the status of each project
        $this->updateStatuses();
    }

    public function updateStatuses(){

        // Get the current date and time
        $now =Carbon::now();

        // Loop through each project to check and update its status
        foreach($this->projects as $project){
            // If the project's status is 'active' and the start date has passed, set it to 'in_progress'
            if($project->status === 'active' && $project->start_date <= $now){
                $project->status = 'in_progress';
                $project->save(); // Save the updated project to the database
            }

            // If the project's status is 'in_progress' and the end date has passed, set it to 'complete'
            if($project->status === 'in_progress' && $project->end_date < $now){

                $project->status = 'Completed';
                $project->save();// Save the updated project to the database
                Log::info('Project ' . $project->id . ' status changed to complete.');

            }
        }
    }
    public function render()
    {
        return view('livewire.project-status',  ['projects' => $this->projects]);
    }
}
