<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\StudentTasks;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class TaskStatus extends Component
{
 // // This property will hold all the tasks from the database
    public $tasks;
// This method is called when the component is initialized
    public function mount(){
         // Retrieve all tasks and assign them to the $tasks property
        $this->tasks = StudentTasks::all();
        $this->tasks = StudentTasks::orderBy('created_at', 'desc')->get();// sort created task on the descending order by created_at colunm

        // Call the method to update the status of each task
        $this->updateStatuses();
    }

    public function updateStatuses(){

        // Get the current date and time
        $now =Carbon::now();

        // Loop through each task to check and update its status
        foreach($this->tasks as $tasks){
            // If the task's status is 'active' and the start date has passed, set it to 'in_progress'
            if($tasks->status === 'active' && $tasks->start_date <= $now){
                $tasks->status = 'in_progress';
                $tasks->save(); // Save the updated task to the database
            }

            // If the task's status is 'in_progress' and the end date has passed, set it to 'complete'
            if($tasks->status === 'in_progress' && $tasks->end_date < $now){

                $tasks->status = 'Completed';
                $tasks->save();// Save the updated task to the database


            }
        }
    }
    public function render()
    {
        return view('livewire.task-status',  ['tasks' => $this->tasks]);
    }
}
