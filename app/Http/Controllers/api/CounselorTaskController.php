<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\CounselorTask;
use Illuminate\Console\View\Components\Task;
use Illuminate\Http\Request;

class CounselorTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = CounselorTask::paginate(10);

        return response()->json($tasks);
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
            'title' => 'required|string|max:255',
            'start_date' => 'required|date|max:255',
            'end_date' => 'required|date|max:255',
            'status' => 'required|string|in:active,in_progress,complete',
            'description' => 'required|string|max:255'
        ]);

        $task = CounselorTask::create($request->all());
        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = CounselorTask::findOrFail($id);
        return response()->json($task);

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
        $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date|max:255',
            'end_date' => 'required|date|max:255',
            'status' => 'required|string|in:active,in_progress,complete',
            'description' => 'required|string|max:255'
        ]);

        $task = CounselorTask::findOrFail($id);
        $task->update($request->all());

        return response()->json($task);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = CounselorTask::findOrFail($id);
        $task->delete($id);

        return response()->json(null, 204);
    }
}
