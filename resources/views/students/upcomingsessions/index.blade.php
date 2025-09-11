@extends('layouts.student')

@section('title', 'Upcoming Sessions')

@section('header', 'My Upcoming Sessions')

@section('content')
<div class="space-y-6">
    <div class="flex justify-between items-center">
        <h2 class="text-lg font-medium text-gray-900">Scheduled Sessions</h2>
        <a href="{{ route('upcomingsessions.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <i class="fas fa-plus mr-2"></i> Schedule New Session
        </a>
    </div>

    @if(session('success'))
        <div class="rounded-md bg-green-50 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-check-circle h-5 w-5 text-green-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">
                        {{ session('success') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white shadow overflow-hidden sm:rounded-md">
        @if($upcomingSessions->count() > 0)
            <ul class="divide-y divide-gray-200">
                @foreach($upcomingSessions as $session)
                    <li class="hover:bg-gray-50">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <p class="text-sm font-medium text-blue-600 truncate">
                                        {{ $session->title }}
                                    </p>
                                    @if($session->is_online)
                                        <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <i class="fas fa-video mr-1"></i> Online
                                        </span>
                                    @else
                                        <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            <i class="fas fa-building mr-1"></i> In-Person
                                        </span>
                                    @endif
                                </div>
                                <div class="ml-2 flex-shrink-0 flex">
                                    <a href="{{ route('upcomingsessions.show', $session->id) }}" class="mr-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 hover:bg-blue-200">
                                        View
                                    </a>
                                    <a href="{{ route('upcomingsessions.edit', $session->id) }}" class="mr-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 hover:bg-yellow-200">
                                        Edit
                                    </a>
                                    <form action="{{ route('upcomingsessions.destroy', $session->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this session?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 hover:bg-red-200">
                                            Cancel
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="mt-2 sm:flex sm:justify-between">
                                <div class="sm:flex">
                                    <p class="flex items-center text-sm text-gray-500">
                                        <i class="fas fa-user-graduate mr-1.5 flex-shrink-0 text-gray-400"></i>
                                        {{ $session->counselor->name ?? 'No counselor assigned' }}
                                    </p>
                                    <p class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0 sm:ml-6">
                                        <i class="far fa-calendar-alt mr-1.5 flex-shrink-0 text-gray-400"></i>
                                        {{ $session->date->format('F j, Y, g:i a') }}
                                    </p>
                                </div>
                                <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                    <i class="far fa-clock mr-1.5 flex-shrink-0 text-gray-400"></i>
                                    {{ $session->date->diffForHumans() }}
                                </div>
                            </div>
                            @if($session->description)
                                <div class="mt-2">
                                    <p class="text-sm text-gray-600">{{ Str::limit($session->description, 200) }}</p>
                                </div>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="px-4 py-3 bg-gray-50 sm:px-6">
                {{ $upcomingSessions->links() }}
            </div>
        @else
            <div class="text-center py-12">
                <i class="far fa-calendar-plus text-4xl text-gray-400 mb-4"></i>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No upcoming sessions</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by scheduling a new session.</p>
                <div class="mt-6">
                    <a href="{{ route('upcomingsessions.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-plus -ml-1 mr-2 h-5 w-5"></i>
                        New Session
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
