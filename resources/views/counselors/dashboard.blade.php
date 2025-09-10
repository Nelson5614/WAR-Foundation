@extends('layouts.counselor')

@section('content')
<div class="flex flex-col w-full overflow-x-hidden">
    <main class="flex-grow w-full p-6">
        <!-- Header Section -->
        <div class="flex flex-col justify-between mb-8 md:items-center md:flex-row">
            <div>
                
                <p class="mt-2 text-gray-600">Welcome back, <span class="font-medium text-blue-600">{{ Auth::user()->name }}</span></p>
                <p class="text-sm text-gray-500" id="current-time"></p>
            </div>
            <div class="mt-4 md:mt-0">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <i class="text-gray-400 fas fa-search"></i>
                    </div>
                    <input type="text" class="block w-full py-2 pl-10 pr-3 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Search students, sessions...">
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-3">
            <!-- Upcoming Sessions Card -->
            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                <a href="{{ route('upcoming-sessions.index') }}" class="block">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Upcoming Sessions</p>
                            <h3 class="mt-1 text-2xl font-bold text-gray-900">{{ $upcomingSessions ?? '0' }}</h3>
                        </div>
                        <div class="p-3 bg-blue-50 rounded-xl">
                            <i class="text-blue-600 fas fa-calendar-alt text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center text-sm text-gray-500">
                            <span>View all sessions</span>
                            <i class="ml-1 text-xs fas fa-chevron-right"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Student Cases Card -->
            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                <a href="{{ route('counselor-student-files.index') }}" class="block">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Active Student Cases</p>
                            <h3 class="mt-1 text-2xl font-bold text-gray-900">{{ $activeCases ?? '0' }}</h3>
                        </div>
                        <div class="p-3 bg-green-50 rounded-xl">
                            <i class="text-green-600 fas fa-folder-open text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center text-sm text-gray-500">
                            <span>View all cases</span>
                            <i class="ml-1 text-xs fas fa-chevron-right"></i>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Tasks Card -->
            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                <a href="{{ route('counselor-tasks.index') }}" class="block">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Pending Tasks</p>
                            <h3 class="mt-1 text-2xl font-bold text-gray-900">{{ $pendingTasks ?? '0' }}</h3>
                        </div>
                        <div class="p-3 bg-yellow-50 rounded-xl">
                            <i class="text-yellow-600 fas fa-tasks text-xl"></i>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center text-sm text-gray-500">
                            <span>View all tasks</span>
                            <i class="ml-1 text-xs fas fa-chevron-right"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Recent Sessions -->
            <div class="lg:col-span-2">
                <div class="p-6 bg-white rounded-lg shadow-sm">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-semibold text-gray-900">Upcoming Sessions</h2>
                        <a href="{{ route('upcoming-sessions.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500">View all</a>
                    </div>
                    <div class="space-y-4">
                        @forelse($recentSessions ?? [] as $session)
                            <div class="flex items-center p-3 border border-gray-100 rounded-lg hover:bg-gray-50">
                                <div class="flex-shrink-0 p-2 bg-blue-100 rounded-lg">
                                    <i class="text-blue-600 fas fa-calendar-day"></i>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">{{ $session->title ?? 'Session with Student' }}</p>
                                    <div class="flex items-center mt-1 text-sm text-gray-500">
                                        <i class="mr-2 text-xs far fa-clock"></i>
                                        <span>{{ $session->scheduled_at ? $session->scheduled_at->format('M d, Y h:i A') : 'Not scheduled' }}</span>
                                    </div>
                                </div>
                                <div class="ml-auto">
                                    <span class="px-2 py-1 text-xs font-medium text-blue-800 bg-blue-100 rounded-full">
                                        {{ $session->status ?? 'Scheduled' }}
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="p-4 text-center text-gray-500 bg-gray-50 rounded-lg">
                                <p>No upcoming sessions scheduled.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="space-y-6">
                <!-- Quick Actions -->
                <div class="p-6 bg-white rounded-lg shadow-sm">
                    <h2 class="mb-4 text-lg font-semibold text-gray-900">Quick Actions</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('set-new-session.index') }}" class="flex flex-col items-center justify-center p-4 text-center transition-colors duration-200 bg-gray-50 rounded-md hover:bg-blue-50 group">
                            <div class="flex items-center justify-center w-10 h-10 mb-2 text-blue-600 bg-blue-100 rounded-full group-hover:bg-blue-200">
                                <i class="fas fa-plus"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-700">New Session</span>
                        </a>
                        <a href="{{ route('counselor-student-files.create') }}" class="flex flex-col items-center justify-center p-4 text-center transition-colors duration-200 bg-gray-50 rounded-md hover:bg-green-50 group">
                            <div class="flex items-center justify-center w-10 h-10 mb-2 text-green-600 bg-green-100 rounded-full group-hover:bg-green-200">
                                <i class="fas fa-file-alt"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-700">New Case File</span>
                        </a>
                        <a href="{{ route('counselor-tasks.create') }}" class="flex flex-col items-center justify-center p-4 text-center transition-colors duration-200 bg-gray-50 rounded-md hover:bg-yellow-50 group">
                            <div class="flex items-center justify-center w-10 h-10 mb-2 text-yellow-600 bg-yellow-100 rounded-full group-hover:bg-yellow-200">
                                <i class="fas fa-tasks"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-700">Add Task</span>
                        </a>
                        <a href="{{ route('counselor-sharedprojects.index') }}" class="flex flex-col items-center justify-center p-4 text-center transition-colors duration-200 bg-gray-50 rounded-md hover:bg-purple-50 group">
                            <div class="flex items-center justify-center w-10 h-10 mb-2 text-purple-600 bg-purple-100 rounded-full group-hover:bg-purple-200">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-700">Projects</span>
                        </a>
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="p-6 bg-white rounded-lg shadow-sm">
                    <h2 class="mb-4 text-lg font-semibold text-gray-900">Recent Activity</h2>
                    <div class="space-y-4">
                        @forelse($recentActivities ?? [] as $activity)
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center w-8 h-8 text-sm text-white bg-blue-600 rounded-full">
                                        {{ strtoupper(substr($activity->user->name, 0, 1)) ?? 'U' }}
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $activity->description ?? 'Activity' }}</p>
                                    <p class="mt-1 text-xs text-gray-500">{{ $activity->created_at ? $activity->created_at->diffForHumans() : 'Just now' }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="p-4 text-center text-gray-500 bg-gray-50 rounded-lg">
                                <p>No recent activities found.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@push('scripts')
<script>
    // Update current time
    function updateTime() {
        const now = new Date();
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            hour12: true
        };
        document.getElementById('current-time').textContent = now.toLocaleDateString('en-US', options);
    }

    // Update time immediately and then every minute
    updateTime();
    setInterval(updateTime, 60000);
</script>
@endpush

<!-- Include Chart.js -->
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart One - Monthly Sessions
    const ctx1 = document.getElementById('chartOne').getContext('2d');
    new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Sessions',
                data: [12, 19, 3, 5, 2, 3, 7, 8, 9, 10, 11, 12],
                backgroundColor: 'rgba(59, 130, 246, 0.5)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 5
                    }
                }
            }
        }
    });

    // Chart Two - Helped Students
    const ctx2 = document.getElementById('chartTwo').getContext('2d');
    new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Students Helped',
                data: [8, 12, 6, 15, 10, 18],
                fill: false,
                borderColor: 'rgba(16, 185, 129, 1)',
                tension: 0.3,
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 5
                    }
                }
            }
        }
    });
</script>
@endpush
@endsection


