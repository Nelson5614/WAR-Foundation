@extends('layouts.student')

@section('title', 'Session Details')

@section('header', 'Session Details')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <div class="flex justify-between items-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">
                    {{ $session->title }}
                </h3>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                    {{ $session->status === 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    {{ ucfirst($session->status) }}
                </span>
            </div>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">
                Scheduled for {{ $session->date->format('F j, Y') }} at {{ \Carbon\Carbon::parse($session->start_time)->format('g:i A') }}
            </p>
        </div>
        
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
            <dl class="sm:divide-y sm:divide-gray-200">
                <!-- Session Type -->
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Session Type</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $session->is_online ? 'Online' : 'In-Person' }}
                        @if($session->is_online)
                            <p class="text-sm text-gray-500 mt-1">A meeting link will be provided before the session.</p>
                        @else
                            <p class="text-sm text-gray-500 mt-1">
                                {{ $session->address }}
                            </p>
                        @endif
                    </dd>
                </div>
                
                <!-- Duration -->
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Duration</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $session->duration }} minutes
                    </dd>
                </div>
                
                <!-- Student Information -->
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Student</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $session->name }} {{ $session->surname }}
                        <p class="text-sm text-gray-500 mt-1">
                            {{ $session->email }}<br>
                            {{ $session->phone }}
                        </p>
                    </dd>
                </div>
                
                <!-- Description -->
                @if($session->description)
                <div class="py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500">Notes</dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                        {{ $session->description }}
                    </dd>
                </div>
                @endif
                
                <!-- Actions -->
                <div class="py-4 sm:py-5 sm:px-6 flex justify-between">
                    <a href="{{ route('upcomingsessions.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fas fa-arrow-left mr-2"></i> Back to Sessions
                    </a>
                    @if($session->status === 'pending')
                    <div class="space-x-3">
                        <a href="{{ route('upcomingsessions.edit', $session->id) }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="fas fa-edit mr-2"></i> Edit
                        </a>
                        <form action="{{ route('upcomingsessions.destroy', $session->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="return confirm('Are you sure you want to cancel this session?')">
                                <i class="fas fa-trash-alt mr-2"></i> Cancel
                            </button>
                        </form>
                    </div>
                    @endif
                </div>
            </dl>
        </div>
    </div>
</div>
@endsection
