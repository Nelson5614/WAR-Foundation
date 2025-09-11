<?php

namespace App\Http\Controllers\Student;
use App\Models\StudentTasks;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentTasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = StudentTasks::where('user_id', auth()->id())
            ->orderBy('status')
            ->orderBy('end_date')
            ->paginate(10);
            
        return view('students.mytasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.mytasks.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date|max:255',
            'end_date' => 'required|date|max:255',
            'status' => 'required|string|in:active,in_progress,complete',
            'description' => 'required|string|max:255'
        ]);

        // Add the authenticated user's ID to the validated data
        $validated['user_id'] = auth()->id();

        StudentTasks::create($validated);

        return redirect()->back()->with('success', 'Task added successfully!');
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
        $tasks = StudentTasks::findOrFail($id);
        return view('students.mytasks.edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentTasks $tasks)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'start_date'=>'required|date|max:255',
            'end_date'=>'required|date|max:255',
            'status' => 'required|string|in:active,in_progress,complete',
            'description'=>'required|string|max:255'
        ]);

       $tasks->update($request->all());

        return redirect()->back()->with('success', 'Task Updated successfully! ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = StudentTasks::findOrFail($id);
        $tasks->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
