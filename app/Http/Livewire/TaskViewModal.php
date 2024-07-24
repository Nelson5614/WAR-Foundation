<?php

namespace App\Http\Livewire;

use App\Models\StudentTasks;
use Livewire\Component;

class TaskViewModal extends Component
{

    public $task;
    public $showModal = false;

    protected $listeners = ['openModal'];

    public function openModal($id){

        $this->task=StudentTasks::find($id);
        $this->showModal=true;
    }

    public function closeModal(){
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.task-view-modal');
    }
}
