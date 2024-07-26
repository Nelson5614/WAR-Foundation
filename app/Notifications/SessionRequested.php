<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\StudentSession;

class SessionRequested extends Notification
{
    use Queueable;

    public $sessionRequest;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(StudentSession $sessionRequest)
    {
        $this->sessionRequest = $sessionRequest;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'session_request_id' => $this->sessionRequest->id,
            'details' => 'A new session request has been made.'
        ];
    }
}
