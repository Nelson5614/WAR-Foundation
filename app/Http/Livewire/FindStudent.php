<?php

namespace App\Http\Livewire;
use App\Models\StudentSession;
use Livewire\Component;

class FindStudent extends Component
{

    public $search = '';



    public function render()
    {
        $students = StudentSession::search($this->search)->get();
        return view('livewire.find-student', compact('students'));

    }
}
