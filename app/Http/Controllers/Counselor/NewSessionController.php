<?php

namespace App\Http\Controllers\Counselor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SetANewSession;

class NewSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('counselors.createsession');
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
        $request->validate([
            'description' => 'required|string|max:255',
            'name'=>'required|string|max:255',
            'surname'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:staff',
            'phone'=>'required|string|max:255',
            'address'=>'required|string|max:255',
            'date'=>'required|date|max:255'
        ]);

        SetANewSession::create($request->all());
        return redirect()->back()->with('success', 'New Session created Successfully');
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
        $setnewsession = SetANewSession::findOrFail($id);
        return view('counselors.upcomingSessions.edit', compact('setnewsession'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,SetANewSession $setnewsession)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'name'=>'required|string|max:255',
            'surname'=>'required|string|max:255',
            'email'=>'required|string|email|max:255',
            'phone'=>'required|string|max:255',
            'address'=>'required|string|max:255',
            'date'=>'required|date|max:255'
        ]);

        $setnewsession->update($request->all());
        return redirect()->back()->with('success', 'Session Updated successfully! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setnewsession = SetANewSession::findOrFail($id);
        $setnewsession->delete();

        return redirect()->back()->with('success', 'Session delete successfully');
    }
}
