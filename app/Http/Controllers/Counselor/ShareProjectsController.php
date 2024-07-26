<?php

namespace App\Http\Controllers\Counselor;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ShareProjectsController extends Controller
{
    public function index(){
        $sharedprojects=Project::paginate(10);
        return view('counselors.sharedprojects', compact('sharedprojects'));
    }
}
