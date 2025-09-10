<?php

namespace App\Http\Controllers\Counselor;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\StudentSession;
use App\Http\Controllers\Controller;



class StudentFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('counselors.studentfiles');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $studentfile = StudentSession::findOrFail($id);
        return view('counselors.studentfiles.edit', compact('studentfile'));
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
            'description' => 'required|string',
        ]);

        $studentfile = StudentSession::findOrFail($id);
        
        // Get the current description
        $currentDescription = $studentfile->description;
        
        // Add a separator and timestamp for the new entry
        $timestamp = now()->format('Y-m-d H:i:s');
        $separator = "\n\n---\n**Update on {$timestamp}**\n\n";
        
        // Prepend the new notes to the existing ones
        $updatedDescription = $validated['description'] . $separator . $currentDescription;
        
        // Update the student file
        $studentfile->update([
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'description' => $updatedDescription,
        ]);

        // Send email notification if requested
        if ($request->has('notify_student')) {
            // TODO: Implement email notification
            // Mail::to($studentfile->email)->send(new StudentFileUpdated($studentfile));
        }

        return redirect('/counselor/counselor-student-files')
                         ->with('success', 'Student file updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentfile = StudentSession::findOrFail($id);
        $studentfile->delete();

        return redirect()->back()->with('success', 'File deleted successfully');
    }




}
