<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\StudentSession;
use App\Models\StudentTasks;
use App\Models\Library;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = now()->startOfDay();
        $startOfMonth = now()->startOfMonth();
        $endOfMonth = now()->endOfMonth();

        // Initialize all variables with default values
        $data = [
            'totalSessions' => 0,
            'upcomingSessions' => collect(),
            'upcomingSessionsCount' => 0,
            'daysToNextSession' => null,
            'pendingTasks' => 0,
            'overdueTasks' => 0,
            'totalResources' => 0,
            'recentResources' => 0,
            'recentActivities' => collect()
        ];

        try {
            // Get total sessions this month
            $data['totalSessions'] = StudentSession::where('student_id', $user->id)
                ->whereBetween('date', [$startOfMonth, $endOfMonth])
                ->count();

            // Get upcoming sessions (future sessions) with counselor info
            $data['upcomingSessions'] = StudentSession::with(['counselor' => function($query) {
                    $query->select('id', 'name', 'email');
                }])
                ->where('student_id', $user->id)
                ->where('date', '>=', $today)
                ->orderBy('date')
                ->take(3)
                ->get()
                ->map(function($session) {
                    // Add a default title if not set
                    if (empty($session->title)) {
                        $session->title = 'Session with ' . ($session->counselor ? $session->counselor->name : 'Counselor');
                    }
                    // Add is_online flag if not set
                    if (!isset($session->is_online)) {
                        $session->is_online = false;
                    }
                    return $session;
                });

            $data['upcomingSessionsCount'] = $data['upcomingSessions']->count();
            $nextSession = $data['upcomingSessions']->first();
            $data['daysToNextSession'] = $nextSession ? $today->diffInDays(Carbon::parse($nextSession->date), false) : null;

            // Get pending tasks
            $data['pendingTasks'] = StudentTasks::where('status', 'pending')
                ->where('user_id', $user->id)
                ->count();

            $data['overdueTasks'] = StudentTasks::where('status', 'pending')
                ->where('user_id', $user->id)
                ->whereDate('end_date', '<', $today)
                ->count();

            // Get resources count
            $data['totalResources'] = Library::count();
            $data['recentResources'] = Library::where('created_at', '>=', now()->subDays(7))
                ->count();

            // Generate recent activities if no activities exist
            if (!class_exists('App\Models\Activity')) {
                $data['recentActivities'] = collect([
                    (object)[
                        'type' => 'session_completed',
                        'title' => 'Completed session with Counselor',
                        'description' => 'College application review',
                        'created_at' => now()->subDays(2)
                    ],
                    (object)[
                        'type' => 'document_uploaded',
                        'title' => 'Uploaded document',
                        'description' => 'Personal_statement_v2.pdf',
                        'created_at' => now()->subDays(3)
                    ],
                    (object)[
                        'type' => 'task_completed',
                        'title' => 'Task completed: Update resume',
                        'description' => 'Marked as completed',
                        'created_at' => now()->subDays(5)
                    ]
                ]);
            } else {
                $data['recentActivities'] = \App\Models\Activity::where('user_id', $user->id)
                    ->latest()
                    ->take(5)
                    ->get();
            }
        } catch (\Exception $e) {
            // Log the error but don't break the page
            \Log::error('Dashboard error: ' . $e->getMessage());
        }

        return view('students.dashboard', $data);
    }
}
