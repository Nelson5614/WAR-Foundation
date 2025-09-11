<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Notifications extends Component
{
    public $unreadCount = 0;
    public $notifications = [];
    public $showDropdown = false;

    protected $listeners = ['refreshNotifications' => '$refresh'];

    public function mount()
    {
        $this->authorize('viewNotifications', \App\Models\Contact::class);
        $this->loadNotifications();
    }

    public function loadNotifications()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $this->unreadCount = $user->unreadNotifications->count();
            $this->notifications = $user->notifications()->take(10)->get();
        }
    }

    public function markAsRead($notificationId)
    {
        $notification = Auth::user()->notifications()->find($notificationId);
        if ($notification) {
            $notification->markAsRead();
            $this->emit('refreshNotifications');
        }
    }

    public function markAllAsRead()
    {
        Auth::user()->unreadNotifications->markAsRead();
        $this->emit('refreshNotifications');
    }

    public function toggleDropdown()
    {
        $this->showDropdown = !$this->showDropdown;
        if ($this->showDropdown) {
            $this->markNotificationsAsRead();
        }
    }

    protected function markNotificationsAsRead()
    {
        if (Auth::check()) {
            Auth::user()->unreadNotifications->markAsRead();
            $this->unreadCount = 0;
        }
    }

    public function render()
    {
        return view('livewire.notifications');
    }
}
