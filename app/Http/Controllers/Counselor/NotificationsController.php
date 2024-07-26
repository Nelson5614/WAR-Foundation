<?php

namespace App\Http\Controllers\Counselor;
use App\Http\Controllers\Controller;
use App\Models\StudentSession;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index(){
        $notifications = Auth()->user()->notifications;
        $notificationcount = $notifications->count();
        return view('counselors.notifications.index', compact([
            'notifications',
            'notificationcount'
        ]));
    }


    public function showSessionRequest($id)
    {
        $sessionRequest = StudentSession::findOrFail($id);

        return view('counselors.notifications.show-session-request', compact('sessionRequest'));
    }
}
