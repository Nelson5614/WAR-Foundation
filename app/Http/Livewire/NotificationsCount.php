<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class NotificationsCount extends Component
{
    //declaring the property that hold the unviewd notifications
    public $notificationCount;

    //this method initializes the component
    public function mount(){
        //updates the notification count when the component is mounted
        $this->updateNotificationCount();
    }

    public function updateNotificationCount(){
        //get the count of unviewed notifications for the authenticated counselor user
        $this->notificationCount = Auth::user()->unreadNotifications->count();
    }


    // this method will mark all notifications as read
    public function markAsRead(){
        //mark all notifications as read
        Auth::user()->unreadNotifications->markAsRead();
        //update the notification count after reading them all as read
        $this->updateNotificationCount();

        $this->emit('redirectToNotifications');
    }

    // markAsRead event listener
    protected $listeners = ['markAsRead'];

    public function render()
    {

        return view('livewire.notifications-count');
    }
}
