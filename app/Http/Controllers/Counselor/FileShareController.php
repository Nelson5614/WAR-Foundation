<?php

namespace App\Http\Controllers\Counselor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\StudentSession;
use App\Notifications\FileShared;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Notification;

class FileShareController extends Controller
{
    public function show($id)
    {
        $file = StudentSession::findOrFail($id);
        return view('counselors.studentfile.index', compact('file'));
    }
    public function share(Request $request)
    {
        $file = StudentSession::findOrFail($request->input('file_id'));
        $recipients = array_map('trim', explode(',', $request->input('recipients')));
        $method = $request->input('method');
        $fileUrl = url('/files/' . $file->id);

        if ($method === 'email') {
            $recipientsList = implode(',', $recipients);
            $emailSubject = urlencode('A file has been shared with you.');
            $emailBody = urlencode("View it here: $fileUrl");

            $mailtoLink = "mailto:?to=$recipientsList&subject=$emailSubject&body=$emailBody";
            return Redirect::to($mailtoLink);
        } elseif ($method === 'whatsapp') {
            foreach ($recipients as $recipient) {
                $message = urlencode("A file has been shared with you. View it here: $fileUrl");
                $whatsappLink = "https://wa.me/$recipient?text=$message";

                // Open WhatsApp link in a new tab or window
                echo "<script>window.open('$whatsappLink', '_blank');</script>";
            }
            return redirect()->back()->with('success', 'File share links have been opened.');
        }

        return redirect()->back()->with('error', 'Invalid sharing method.');
    }

}
