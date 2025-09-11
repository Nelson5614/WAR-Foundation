<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewContactMessage extends Notification
{
    use Queueable;

    public $contact;

    /**
     * Create a new notification instance.
     *
     * @param  \App\Models\Contact  $contact
     * @return void
     */
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Contact Form Submission: ' . $this->contact->subject)
                    ->line('You have received a new contact form submission.')
                    ->line('Name: ' . $this->contact->name)
                    ->line('Email: ' . $this->contact->email)
                    ->line('Subject: ' . $this->contact->subject)
                    ->action('View Message', route('admin.contacts.show', $this->contact->id));
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
            'contact_id' => $this->contact->id,
            'subject' => $this->contact->subject,
            'name' => $this->contact->name,
            'email' => $this->contact->email,
            'message' => $this->contact->message,
        ];
    }
}
