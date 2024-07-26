<?php

namespace App\Http\Livewire;

use App\Models\CounselorTask;
use Livewire\Component;

class CounselorTaskViewModal extends Component
{
    public $task;
    public $showModal = false;

    protected $listeners = ['openModal'];

    public function openModal($id){

        $this->task=CounselorTask::find($id);
        $this->showModal=true;
    }

    public function closeModal(){
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.counselor-task-view-modal');
    }
}
