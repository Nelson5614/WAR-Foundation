<?php

namespace App\Http\Controllers\Student;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\StudentSession;
use App\Http\Controllers\Controller;
use App\Notifications\SessionRequested;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.session');
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

        // Validate the incoming request data. In this case, only 'details' is required.
        $sessionRequest = StudentSession::create([
            'student_id' => auth()->id(),
            'description' => $request->description,
            'name' => $request->name,
            'surname' => $request->surname,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'date' => $request->date,
        ]);

        // Notify all counselors about the new session request.
        $counselors = User::where('role', User::ROLE_COUNSELOR)->get();
        foreach ($counselors as $counselor) {
            // Notify each counselor using the SessionRequested notification.
            $counselor->notify(new SessionRequested($sessionRequest));
       }


        return redirect()->back()->with('success', 'Your request has been submited, We will contact you shortly');
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
        //
    }
}
