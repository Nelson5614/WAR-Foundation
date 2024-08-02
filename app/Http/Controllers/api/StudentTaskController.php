<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\StudentTasks;
use Illuminate\Http\Request;

class StudentTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = StudentTasks::paginate(10);
        return response()->json($tasks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, )
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'start_date'=>'required|date|max:255',
            'end_date'=>'required|date|max:255',
            'status' => 'required|string|in:active,in_progress,complete',
            'description'=>'required|string|max:255'
        ]);

       $task = StudentTasks::create($request->all());
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StudentTasks $tasks)
    {
        return response()->json($tasks);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StudentTasks $task)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'start_date'=>'required|date|max:255',
            'end_date'=>'required|date|max:255',
            'status' => 'required|string|in:active,in_progress,complete',
            'description'=>'required|string|max:255'
        ]);

        $task->update($request->all());
        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( StudentTasks $task)
    {
        $task->delete();
        return response()->json($task, 203);
    }
}
