<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpcomingSessionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $upcomingSessions = StudentSession::where('student_id', Auth::id())
            ->whereDate('date', '>=', now())
            ->orderBy('date')
            ->paginate(10); // Show 10 sessions per page

        return view('students.upcomingsessions.index', compact('upcomingSessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.upcomingsessions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            // User Information
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            
            // Session Information
            'title' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'duration' => 'required|integer|min:30|max:120',
            'description' => 'required|string|max:1000',
            'is_online' => 'required|boolean',
        ]);

        // Combine date and time
        $startTime = \Carbon\Carbon::parse($validated['date'] . ' ' . $validated['time']);
        
        // Create the session with all required fields
        $session = new StudentSession([
            'student_id' => $user->id,
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'date' => $validated['date'],
            'start_time' => $validated['time'],
            'duration' => $validated['duration'],
            'end_time' => $startTime->copy()->addMinutes($validated['duration']),
            'is_online' => (bool)($validated['is_online'] ?? false),
            'status' => 'pending',
        ]);

        $session->save();

        return redirect()
            ->route('upcomingsessions.index')
            ->with('success', 'Session scheduled successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $session = StudentSession::where('id', $id)
            ->where('student_id', auth()->id())
            ->firstOrFail();
            
        return view('students.upcomingsessions.show', compact('session'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session = StudentSession::where('id', $id)
            ->where('student_id', auth()->id())
            ->where('status', 'pending') // Only allow editing pending sessions
            ->firstOrFail();
            
        return view('students.upcomingsessions.edit', compact('session'));
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
        $session = StudentSession::where('id', $id)
            ->where('student_id', auth()->id())
            ->where('status', 'pending')
            ->firstOrFail();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:500',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
            'duration' => 'required|integer|min:15|max:240',
            'description' => 'nullable|string',
            'is_online' => 'required|boolean',
        ]);

        // Convert time to Carbon instance
        $startTime = \Carbon\Carbon::parse($validated['time']);

        // Update session
        $session->update([
            'title' => $validated['title'],
            'name' => $validated['name'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'date' => $validated['date'],
            'start_time' => $startTime->format('H:i:s'),
            'duration' => $validated['duration'],
            'end_time' => $startTime->copy()->addMinutes($validated['duration']),
            'is_online' => (bool)($validated['is_online'] ?? false),
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()
            ->route('upcomingsessions.show', $session->id)
            ->with('success', 'Session updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = StudentSession::where('id', $id)
            ->where('student_id', auth()->id())
            ->where('status', 'pending')
            ->firstOrFail();

        $session->delete();

        return redirect()
            ->route('upcomingsessions.index')
            ->with('success', 'Session cancelled successfully!');
    }
}
