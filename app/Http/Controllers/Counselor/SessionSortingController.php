<?php

namespace App\Http\Controllers\Counselor;
use App\Http\Controllers\Controller;
use App\Models\StudentSession;
use Illuminate\Http\Request;

class SessionSortingController extends Controller
{
    public function sort(Request $request){
        $ids = $request->input('ids'); //get the session ids

        //update the session order in the database
        foreach($ids as $index=>$id){
            StudentSession::where('id', $id)->update(['order'=>$index + 1]);
        }

        return response()->json(['success' => true]);

    }
}
