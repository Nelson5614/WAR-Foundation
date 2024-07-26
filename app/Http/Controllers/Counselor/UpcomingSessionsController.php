<?php

namespace App\Http\Controllers\Counselor;
use Illuminate\Http\Request;
use App\Models\SetANewSession;
use App\Models\StudentSession;
use App\Http\Controllers\Controller;

class UpcomingSessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsessions = SetANewSession::paginate(10);
        $sessions = StudentSession::paginate(10);
       return view('counselors.upcomingSessions.index', compact([
        'sessions',
        'newsessions'
       ]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upcomingSessions = StudentSession::findOrFail($id);
        $upcomingSessions->delete();

        return redirect()->back()->with('success', 'Session delete successfully');
    }
}
