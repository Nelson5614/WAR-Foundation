@extends('layouts.student')

@section('title', 'Dashboard')

@section('header', 'Overview')

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endpush

@section('content')
<div class="space-y-6">
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Total Sessions Card -->
        <div class="overflow-hidden bg-white rounded-lg shadow">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="p-3 bg-blue-100 rounded-md">
                            <i class="text-blue-600 fas fa-calendar-check text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Total Sessions
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900">{{ $totalSessions }}</div>
                                <div class="ml-2 flex items-baseline text-sm font-semibold text-green-600">
                                    <span class="sr-only">This month</span>
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Upcoming Sessions Card -->
        <div class="overflow-hidden bg-white rounded-lg shadow">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="p-3 bg-green-100 rounded-md">
                            <i class="text-green-600 fas fa-calendar-alt text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Upcoming Sessions
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900">{{ $upcomingSessionsCount }}</div>
                                <div class="ml-2 flex items-baseline text-sm font-semibold {{ $daysToNextSession !== null && $daysToNextSession <= 2 ? 'text-red-600' : 'text-green-600' }}">
                                    @if($daysToNextSession !== null)
                                        <span class="sr-only">Next session in</span>
                                        {{ $daysToNextSession === 0 ? 'Today' : ($daysToNextSession === 1 ? 'Tomorrow' : "in $daysToNextSession days") }}
                                    @else
                                        <span class="sr-only">No upcoming sessions</span>
                                        No upcoming sessions
                                    @endif
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks Card -->
        <div class="overflow-hidden bg-white rounded-lg shadow">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="p-3 bg-yellow-100 rounded-md">
                            <i class="text-yellow-600 fas fa-tasks text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Pending Tasks
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900">{{ $pendingTasks }}</div>
                                <div class="ml-2 flex items-baseline text-sm font-semibold {{ $overdueTasks > 0 ? 'text-red-600' : 'text-yellow-600' }}">
                                    <span class="sr-only">Overdue</span>
                                    {{ $overdueTasks }} {{ Str::plural('overdue', $overdueTasks) }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Resources Card -->
        <div class="overflow-hidden bg-white rounded-lg shadow">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="p-3 bg-purple-100 rounded-md">
                            <i class="text-purple-600 fas fa-book text-xl"></i>
                        </div>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                My Resources
                            </dt>
                            <dd class="flex items-baseline">
                                <div class="text-2xl font-semibold text-gray-900">{{ $totalResources }}</div>
                                <div class="ml-2 flex items-baseline text-sm font-semibold text-purple-600">
                                    <span class="sr-only">Recently added</span>
                                    {{ $recentResources }} {{ Str::plural('new', $recentResources) }} this week
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Upcoming Sessions & Quick Actions -->
    <div class="grid grid-cols-1 gap-6 mt-6 lg:grid-cols-2">
        <!-- Upcoming Sessions -->
        <div class="overflow-hidden bg-white rounded-lg shadow">
            <div class="p-5">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Upcoming Sessions</h3>
                    <a href="{{ route('upcomingsessions.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500">View all</a>
                </div>
                <div class="mt-4 flow-root">
                    <ul role="list" class="-mb-8">
                        @forelse($upcomingSessions as $index => $session)
                        <li>
                            <div class="relative pb-8">
                                @if(!$loop->last)
                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                @endif
                                <div class="relative flex space-x-3">
                                    <div>
                                        <span class="h-8 w-8 rounded-full {{ $index % 3 == 0 ? 'bg-blue-500' : ($index % 3 == 1 ? 'bg-green-500' : 'bg-yellow-500') }} flex items-center justify-center ring-8 ring-white">
                                            <i class="text-white fas {{ $session->is_online ? 'fa-video' : 'fa-calendar' }} text-xs"></i>
                                        </span>
                                    </div>
                                    <div class="min-w-0 flex-1 pt-1.5 flex justify-between space-x-4">
                                        <div>
                                            <p class="text-sm text-gray-500">
                                                <span class="font-medium text-gray-900">{{ $session->title ?? 'Session' }}</span>
                                            </p>
                                            @if($session->counselor)
                                            <p class="text-sm text-gray-500">With: {{ $session->counselor->name }}</p>
                                            @endif
                                        </div>
                                        <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                            <time datetime="{{ $session->date->format('Y-m-d') }}">
                                                {{ $session->date->isToday() ? 'Today' : ($session->date->isTomorrow() ? 'Tomorrow' : $session->date->format('M j')) }}, {{ $session->date->format('g:i A') }}
                                            </time>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        @empty
                        <li class="text-center py-4 text-gray-500">
                            No upcoming sessions scheduled.
                        </li>
                        @endforelse
                    
                    </ul>
                </div>
            </div>
        </div>

        <!-- Quick Actions & Tasks -->
        <div class="space-y-6">
            <!-- Quick Actions -->
            <div class="overflow-hidden bg-white rounded-lg shadow">
                <div class="p-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Quick Actions</h3>
                    <div class="mt-4 grid grid-cols-1 gap-4 sm:grid-cols-2">
                        <a href="{{ route('upcomingsessions.create') }}" class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                            <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                                <i class="text-white fas fa-plus"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class="text-sm font-medium text-gray-900">Request Session</p>
                            </div>
                        </a>
                        <a href="{{ route('tasks.index') }}" class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                            <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                                <i class="text-white fas fa-tasks"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class="text-sm font-medium text-gray-900">View Tasks</p>
                            </div>
                        </a>
                        <a href="{{ route('studentlibrary.index') }}" class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                            <div class="flex-shrink-0 bg-purple-500 rounded-md p-3">
                                <i class="text-white fas fa-book"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class="text-sm font-medium text-gray-900">Library</p>
                            </div>
                        </a>
                        <a href="#" class="relative rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm flex items-center space-x-3 hover:border-gray-400 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                            <div class="flex-shrink-0 bg-yellow-500 rounded-md p-3">
                                <i class="text-white fas fa-file-alt"></i>
                            </div>
                            <div class="flex-1 min-w-0">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                <p class="text-sm font-medium text-gray-900">View Reports</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

          
        </div>
    </div>
</div>
@endsection
