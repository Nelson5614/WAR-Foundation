
@extends('layouts.admin')

@section('content')
<div class="flex flex-col w-full overflow-x-hidden">
    <main class="flex-grow w-full p-6">
        <!-- Header Section -->
        <div class="flex flex-col justify-between mb-8 md:items-center md:flex-row">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Dashboard Overview</h1>
                <p class="mt-2 text-gray-600">Welcome back, <span class="font-medium text-indigo-600">{{ Auth::user()->name }}</span>! Here's what's happening with your platform.</p>
                <p class="text-sm text-gray-500" id="current-time"></p>
            </div>
            <div class="mt-4 md:mt-0">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" class="block w-full py-2 pl-10 pr-3 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="Search reports, users, projects...">
                </div>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 gap-6 mb-8 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Staff Card -->
            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                <a href="{{ route('admin.staff.index') }}" class="block">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Staff</p>
                            <h3 class="mt-1 text-2xl font-bold text-gray-900">{{ $totalUsers ?? '0' }}</h3>
                        </div>
                        <div class="p-3 bg-indigo-50 rounded-xl">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center text-sm text-gray-500">
                            <span>View all staff members</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Projects Card -->
            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                <a href="{{ route('admin.projects.index') }}" class="block">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Total Projects</p>
                            <h3 class="mt-1 text-2xl font-bold text-gray-900">{{ $totalProjects ?? '0' }}</h3>
                        </div>
                        <div class="p-3 bg-blue-50 rounded-xl">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center text-sm text-gray-500">
                            <span>View all projects</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Library Card -->
            <div class="p-6 bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300 transform hover:-translate-y-1">
                <a href="{{ route('admin.library.index') }}" class="block">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-500">Library Items</p>
                            <h3 class="mt-1 text-2xl font-bold text-gray-900">{{ $totalArticles ?? '0' }}</h3>
                        </div>
                        <div class="p-3 bg-green-50 rounded-xl">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="flex items-center text-sm text-gray-500">
                            <span>Browse library</span>
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
            <!-- Recent Activity -->
            <div class="lg:col-span-2">
                <div class="p-6 bg-white rounded-lg shadow-sm">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-lg font-semibold text-gray-900">Recent Activity</h2>
                        @if(isset($recentActivities) && $recentActivities->count() > 0)
                            <a href="{{ route('admin.activities') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">View all</a>
                        @endif
                    </div>
                    <div class="space-y-4">
                        @forelse($recentActivities ?? [] as $activity)
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center w-10 h-10 text-white bg-indigo-600 rounded-full">
                                        {{ strtoupper(substr($activity->user->name, 0, 1)) }}
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-sm font-medium text-gray-900">{{ $activity->user->name }}</p>
                                    <p class="text-sm text-gray-600">{{ $activity->description }}</p>
                                    <p class="mt-1 text-xs text-gray-500">{{ $activity->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-gray-500">
                                <p>No recent activities found.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="space-y-6">
                <!-- Recent Users -->
                <div class="p-6 bg-white rounded-lg shadow-sm">
                    <h2 class="mb-4 text-lg font-semibold text-gray-900">Recent Users</h2>
                    <div class="space-y-4">
                        @forelse($recentUsers ?? [] as $user)
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="flex items-center justify-center w-10 h-10 text-white bg-indigo-600 rounded-full">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $user->name }}</p>
                                    <p class="text-xs text-gray-500">Joined {{ $user->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        @empty
                            <div class="text-center text-gray-500">
                                <p>No recent users found.</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="p-6 bg-white rounded-lg shadow-sm">
                    <h2 class="mb-4 text-lg font-semibold text-gray-900">Quick Actions</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('admin.projects.create') }}" class="flex flex-col items-center justify-center p-4 text-center transition-colors duration-200 bg-gray-50 rounded-md hover:bg-indigo-50 group">
                            <div class="flex items-center justify-center w-10 h-10 mb-2 text-indigo-600 bg-indigo-100 rounded-full group-hover:bg-indigo-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-700">New Project</span>
                        </a>
                        <a href="{{ route('admin.library.create') }}" class="flex flex-col items-center justify-center p-4 text-center transition-colors duration-200 bg-gray-50 rounded-md hover:bg-indigo-50 group">
                            <div class="flex items-center justify-center w-10 h-10 mb-2 text-green-600 bg-green-100 rounded-full group-hover:bg-green-200">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-medium text-gray-700">Add to Library</span>
                        </a>
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

    // Add animation to stats cards on scroll
    document.addEventListener('DOMContentLoaded', function() {
        const statsCards = document.querySelectorAll('.transform');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('translate-y-0', 'opacity-100');
                    entry.target.classList.remove('translate-y-4', 'opacity-0');
                }
            });
        }, { threshold: 0.1 });

        statsCards.forEach(card => {
            card.classList.add('transition-all', 'duration-500', 'ease-out', 'translate-y-4', 'opacity-0');
            observer.observe(card);
        });
    });
</script>
@endpush

@push('styles')
<style>
    /* Custom scrollbar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #c7d2fe;
        border-radius: 10px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #a5b4fc;
    }
    
    /* Smooth transitions */
    .transition-all {
        transition: all 0.3s ease-in-out;
    }
    
    /* Card hover effect */
    .hover-scale {
        transition: transform 0.2s ease-in-out;
    }
    .hover-scale:hover {
        transform: translateY(-2px);
    }
</style>
@endpush

<!-- Charts Section -->
<div class="grid grid-cols-1 gap-6 mt-8 md:grid-cols-2">
    <!-- Monthly Sessions Chart -->
    <div class="p-6 bg-white rounded-lg shadow-sm">
        <h3 class="mb-4 text-lg font-semibold text-gray-900">Monthly Sessions</h3>
        <div class="h-64">
            <canvas id="sessionsChart"></canvas>
        </div>
    </div>

    <!-- Recent Activity Summary -->
    <div class="p-6 bg-white rounded-lg shadow-sm">
        <h3 class="mb-4 text-lg font-semibold text-gray-900">Recent Activity</h3>
        <div class="space-y-4">
            @forelse($recentActivities->take(3) ?? [] as $activity)
                <div class="flex items-start">
                    <div class="flex items-center justify-center flex-shrink-0 w-8 h-8 text-white bg-indigo-600 rounded-full">
                        {{ strtoupper(substr($activity->user->name, 0, 1)) }}
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-gray-900">{{ $activity->user->name }}</p>
                        <p class="text-sm text-gray-600">{{ $activity->description }}</p>
                        <p class="mt-1 text-xs text-gray-500">{{ $activity->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-500">No recent activities found.</p>
            @endforelse
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Initialize charts after the page loads
    document.addEventListener('DOMContentLoaded', function() {
        // Monthly Sessions Chart
        const sessionsCtx = document.getElementById('sessionsChart').getContext('2d');
        const sessionCounts = @json($sessionCounts);
        
        new Chart(sessionsCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode(now()->subMonths(5)->monthsUntil(now())->map(function ($date) {
                    return $date->format('M Y');
                })) !!},
                datasets: [{
                    label: 'Sessions',
                    data: sessionCounts,
                    backgroundColor: 'rgba(79, 70, 229, 0.7)',
                    borderColor: 'rgba(79, 70, 229, 1)',
                    borderWidth: 1,
                    borderRadius: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: true,
                            drawBorder: false
                        },
                        ticks: {
                            stepSize: 1
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 13
                        },
                        padding: 12,
                        usePointStyle: true
                    }
                }
            }
        });
    });
</script>
@endpush

@endsection
