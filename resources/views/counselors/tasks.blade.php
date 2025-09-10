
@extends('layouts.counselor')

@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Task Management</h1>
                <p class="text-gray-600 mt-1">Manage and track your tasks efficiently</p>
            </div>
            <a href="{{ route('counselor-tasks.create') }}" class="mt-4 md:mt-0 bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg flex items-center transition duration-200">
                <i class="fas fa-plus mr-2"></i> New Task
            </a>
        </div>

        <!-- Alerts -->
        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <i class="fas fa-check-circle mr-3"></i>
                    </div>
                    <div>
                        <p class="font-bold">Success</p>
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded" role="alert">
                <div class="flex">
                    <div class="py-1">
                        <i class="fas fa-exclamation-circle mr-3"></i>
                    </div>
                    <div>
                        <p class="font-bold">Error</p>
                        <p>{{ session('error') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Search and Filter -->
        <div class="bg-white rounded-lg shadow-sm p-4 mb-6">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input type="text" 
                               class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                               placeholder="Search tasks...">
                    </div>
                </div>
                <div class="w-full md:w-64">
                    <select class="block w-full px-3 py-2 border border-gray-300 rounded-lg bg-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">All Status</option>
                        <option value="active">Active</option>
                        <option value="in_progress">In Progress</option>
                        <option value="complete">Completed</option>
                    </select>
                </div>
                <button class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                    <i class="fas fa-filter mr-2"></i>Filter
                </button>
            </div>
        </div>

        <!-- Tasks Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @livewire('counselor-task-status')
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $tasks->links() }}
        </div>
    </main>

    <footer class="w-full bg-white text-right p-4 text-sm text-gray-500">
        Built by <a href="#" class="text-blue-600 hover:underline">Nelson Mathebeng</a>
    </footer>
</div>
@endsection

@push('styles')
<style>
    .task-card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .task-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    }
    .status-badge {
        @apply px-2 py-1 rounded-full text-xs font-medium;
    }
    .status-active {
        @apply bg-green-100 text-green-800;
    }
    .status-in-progress {
        @apply bg-yellow-100 text-yellow-800;
    }
    .status-complete {
        @apply bg-blue-100 text-blue-800;
    }
</style>
@endpush

