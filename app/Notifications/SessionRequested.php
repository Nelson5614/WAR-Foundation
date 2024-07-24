<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\DatabaseMessage;
use App\Models\StudentSession;

class SessionRequested extends Notification implements ShouldQueue
{
    use Queueable;

    protected $sessionRequest;

    public function __construct(StudentSession $sessionRequest)
    {
        $this->sessionRequest = $sessionRequest;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('A new counseling session has been requested.')
                    ->action('View Request', url('/counselor/dashboard'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'session_request_id' => $this->sessionRequest->id,
            'student_id' => $this->sessionRequest->student_id,
            'details' => $this->sessionRequest->details,
        ];
    }
}
