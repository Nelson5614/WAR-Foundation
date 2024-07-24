<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class ProjectViewModal extends Component
{

    public $project;
    public $showModal = false;

    protected $listeners = ['openModal'];

    public function openModal($id){

        $this->project=Project::find($id);
        $this->showModal=true;
    }

    public function closeModal(){
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.project-view-modal');
    }
}
