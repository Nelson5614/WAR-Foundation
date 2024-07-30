<?php

namespace App\Http\Controllers\Counselor;
use Illuminate\Http\Request;
use App\Models\SetANewSession;
use App\Models\StudentSession;
use App\Http\Controllers\Controller;

class ViewStudentFormController extends Controller
{
    public function view($id){

        $student = StudentSession::findOrFail($id);
        return view('counselors.studentfile.index', compact('student'));
    }


}
