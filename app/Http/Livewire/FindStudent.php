<?php

namespace App\Http\Livewire;

use App\Models\StudentSession;
use Livewire\Component;
use Livewire\WithPagination;

class FindStudent extends Component
{
    use WithPagination;
    
    public $search = '';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $students = StudentSession::when($this->search, function($query) {
            return $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('surname', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        })
        ->orderBy('created_at', 'desc')
        ->paginate($this->perPage);
            
        return view('livewire.find-student', [
            'students' => $students
        ]);
    }
}
