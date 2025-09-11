<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;
use App\Mail\AdminContactNotification;
use App\Notifications\NewContactMessage;
use App\Models\User;

class ContactController extends Controller
{
    /**
     * Display a listing of the messages (admin only).
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $this->authorize('viewAny', Contact::class);
        
        $messages = Contact::latest()->paginate(10);
        $unreadCount = Contact::where('is_read', false)->count();
        
        return view('admin.contacts.index', compact('messages', 'unreadCount'));
    }

    /**
     * Store a newly created contact message in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = Contact::create($validated);

        // Send confirmation email to user
        Mail::to($contact->email)->send(new ContactFormSubmitted($contact));

        // Notify all admin users
        $admins = User::whereIn('role', ['admin', 'super-admin'])->get();
        foreach ($admins as $admin) {
            $admin->notify(new NewContactMessage($contact));
        }

        // Also send to admin email if configured
        $adminEmail = config('mail.admin_email');
        if ($adminEmail) {
            Mail::to($adminEmail)->send(new AdminContactNotification($contact));
        }

        return redirect()->route('contact')
            ->with('success', 'Thank you for your message. We will get back to you soon!');
    }

    /**
     * Display the specified message (admin only).
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $this->authorize('view', Contact::class);
        
        $message = Contact::findOrFail($id);
        
        // Mark as read when viewed
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }
        
        // Mark any unread notifications for this contact as read
        if (auth()->check()) {
            auth()->user()->unreadNotifications()
                ->where('type', 'App\\Notifications\\NewContactMessage')
                ->where('data->contact_id', $message->id)
                ->update(['read_at' => now()]);
        }
        
        return view('admin.contacts.show', compact('message'));
    }

    /**
     * Remove the specified message from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->authorize('delete', Contact::class);
        
        $message = Contact::findOrFail($id);
        $message->delete();
        
        return redirect()->route('admin.contacts.index')
                         ->with('success', 'Message deleted successfully');
    }
    
    /**
     * Mark a message as read (admin only).
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function markAsRead($id)
    {
        $message = Contact::findOrFail($id);
        $this->authorize('update', $message);
        
        $message->update(['is_read' => true]);
        
        return response()->json(['success' => true]);
    }
}
