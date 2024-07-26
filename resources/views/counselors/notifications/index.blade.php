@extends('layouts.counselor')

@section('content')
<div class="min-h-screen container flex justify-center ">
    <div class="py-10 px-8 ">

        <h3>Your Notifications</h3>
        <ul>
            @forelse($notifications as $notification)
                <li class="py-1">
                    <strong>{{ $notification->created_at->diffForHumans() }}:</strong>
                    {{ $notification->data['details'] }}
                    <a href="{{ route('counselor.session-requests.show', $notification->data['session_request_id']) }}">View Request</a>
                </li>
            @empty
                <li>No notifications</li>
            @endforelse
        </ul>
    </div>
</div>
@endsection
