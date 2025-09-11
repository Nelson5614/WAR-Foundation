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

class DashboardController extends Controller
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

        if (!$user) {
            return redirect()->route('login');
        }

        try {
            // Get total sessions this month
            $data['totalSessions'] = StudentSession::where('student_id', $user->id)
                ->whereBetween('date', [$startOfMonth, $endOfMonth])
                ->count();

            // Debug: Log the query being executed
            \Log::info('Fetching upcoming sessions for user: ' . $user->id);
            \Log::info('Current date: ' . $today->toDateString());
            
            // Get upcoming sessions (future sessions) with counselor info
            $query = StudentSession::with(['counselor' => function($query) {
                    $query->select('id', 'name', 'email');
                }])
                ->where('student_id', $user->id)
                ->whereDate('date', '>=', $today)
                ->orderBy('date')
                ->orderBy('start_time')
                ->take(3);
                
            // Debug: Log the raw SQL query
            \Log::info('Upcoming sessions SQL: ' . $query->toSql());
            \Log::info('Bindings: ', $query->getBindings());
            
            $data['upcomingSessions'] = $query->get()
                ->map(function($session) {
                    // Add a default title if not set
                    if (empty($session->title)) {
                        $session->title = 'Session with ' . ($session->counselor ? $session->counselor->name : 'Counselor');
                    }
                    // Add is_online flag if not set
                    if (!isset($session->is_online)) {
                        $session->is_online = false;
                    }
                    // Ensure date is a Carbon instance
                    if (!($session->date instanceof \Carbon\Carbon)) {
                        $session->date = \Carbon\Carbon::parse($session->date);
                    }
                    return $session;
                });

            // Debug: Log the results
            \Log::info('Found ' . $data['upcomingSessions']->count() . ' upcoming sessions');
            foreach ($data['upcomingSessions'] as $session) {
                \Log::info('Session ID: ' . $session->id . ', Date: ' . $session->date . ', Title: ' . $session->title);
            }

            $data['upcomingSessionsCount'] = $data['upcomingSessions']->count();
            $nextSession = $data['upcomingSessions']->first();
            $data['daysToNextSession'] = $nextSession ? $today->diffInDays(Carbon::parse($nextSession->date), false) : null;
            
            // Debug: Log next session info
            \Log::info('Next session: ' . ($nextSession ? $nextSession->date : 'None'));

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

            // Get recent activities from sessions and tasks
            $recentSessions = StudentSession::where('student_id', $user->id)
                ->where('date', '<=', $today)
                ->orderBy('date', 'desc')
                ->take(3)
                ->get()
                ->map(function($session) {
                    return (object)[
                        'type' => 'session_completed',
                        'title' => 'Completed: ' . ($session->title ?? 'Session'),
                        'description' => $session->description ?? 'No description provided',
                        'created_at' => $session->created_at,
                        'icon' => 'fa-calendar-check',
                        'color' => 'text-blue-500'
                    ];
                });

            $recentTasks = StudentTasks::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->get()
                ->map(function($task) {
                    return (object)[
                        'type' => 'task_' . $task->status,
                        'title' => 'Task: ' . $task->title,
                        'description' => ucfirst($task->status) . ($task->due_date ? ' - Due: ' . $task->due_date->format('M j, Y') : ''),
                        'created_at' => $task->created_at,
                        'icon' => 'fa-tasks',
                        'color' => $task->status === 'completed' ? 'text-green-500' : 'text-yellow-500'
                    ];
                });

            // Combine and sort activities
            $data['recentActivities'] = $recentSessions->merge($recentTasks)
                ->sortByDesc('created_at')
                ->take(3);
        } catch (\Exception $e) {
            // Log the error but don't break the page
            \Log::error('Dashboard error: ' . $e->getMessage());
        }

        return view('students.dashboard', $data);
    }
}
