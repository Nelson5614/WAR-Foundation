<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Project;
use App\Models\Library;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\StudentSession;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function dashboard(){
        // Get session data for the chart
        $sessions = StudentSession::selectRaw('count(*) as count, MONTH(created_at) as month')
            ->groupBy('month')
            ->get()
            ->keyBy('month')
            ->map(function ($item) {
                return $item->count;
            });

        // Get session counts for the last six months
        $sessionCounts = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i)->format('m');
            $sessionCounts[] = $sessions->get($month, 0);
        }

        // Get counts for dashboard stats
        $totalUsers = User::count();
        $totalProjects = Project::count();
        $totalArticles = Library::count();
        
        // Get recent activities (last 5)
        $recentActivities = Activity::with('user')
            ->latest()
            ->take(5)
            ->get();

        // Get recent users (last 5)
        $recentUsers = User::latest()
            ->take(5)
            ->get();
        
        return view('admin.dashboard', compact([
            'totalUsers',
            'totalProjects',
            'sessionCounts',
            'totalArticles',
            'recentActivities',
            'recentUsers'
        ]));
    }

}
