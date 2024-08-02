<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\StudentSession;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function dashboard(){
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
        $totalUsers = User::count();
        $totalProjects = Project::count();
        return view('admin.dashboard', compact([
          'totalUsers',
          'totalProjects',
          'sessionCounts'
        ]));
    }

}
