@extends('layouts.student')

@section('title', 'My Tasks')

@section('header', 'My Tasks')

@section('content')
<div class="space-y-6">
    @if (session('success'))
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

    @if (session('error'))
        <div class="rounded-md bg-red-50 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <i class="fas fa-exclamation-circle h-5 w-5 text-red-400"></i>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-red-800">
                        {{ session('error') }}
                    </p>
                </div>
            </div>
        </div>
    @endif

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <!-- Task List -->
        <div class="lg:col-span-2">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">My Tasks</h3>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                        {{ $tasks->total() }} tasks
                    </span>
                </div>
                <div class="border-t border-gray-200">
                    @if($tasks->count() > 0)
                        <ul class="divide-y divide-gray-200">
                            @foreach($tasks as $task)
                                <li class="hover:bg-gray-50">
                                    <div class="px-4 py-4 sm:px-6">
                                        <div class="flex items-center justify-between">
                                            <div class="flex items-center">
                                                <input type="checkbox" 
                                                       class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                                       {{ $task->status === 'complete' ? 'checked' : '' }}>
                                                <p class="ml-3 text-sm font-medium {{ $task->status === 'complete' ? 'text-gray-400 line-through' : 'text-gray-900' }}">
                                                    {{ $task->title }}
                                                </p>
                                            </div>
                                            <div class="flex space-x-2">
                                                @if($task->status === 'active')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        Active
                                                    </span>
                                                @elseif($task->status === 'in_progress')
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        In Progress
                                                    </span>
                                                @else
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                        Complete
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="mt-2 sm:flex sm:justify-between">
                                            <div class="sm:flex">
                                                <p class="flex items-center text-sm text-gray-500">
                                                    <i class="far fa-calendar-alt mr-1.5 h-5 w-5 text-gray-400"></i>
                                                    Due {{ \Carbon\Carbon::parse($task->end_date)->format('M d, Y') }}
                                                </p>
                                            </div>
                                            <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                                <i class="far fa-clock mr-1.5 h-5 w-5 text-gray-400"></i>
                                                Created {{ $task->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                            {{ $tasks->links() }}
                        </div>
                    @else
                        <div class="text-center py-12">
                            <i class="far fa-tasks text-4xl text-gray-400 mb-4"></i>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No tasks found</h3>
                            <p class="mt-1 text-sm text-gray-500">Get started by creating a new task.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Add New Task -->
        <div>
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Add New Task</h3>
                </div>
                <div class="border-t border-gray-200 px-4 py-5 sm:p-6">
                    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700">Task Title</label>
                            <div class="mt-1">
                                <input type="text" name="title" id="title" required 
                                       class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                                <div class="mt-1">
                                    <input type="date" name="start_date" id="start_date" required 
                                           class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div>
                                <label for="end_date" class="block text-sm font-medium text-gray-700">Due Date</label>
                                <div class="mt-1">
                                    <input type="date" name="end_date" id="end_date" required
                                           class="shadow-sm focus:ring-blue-500 focus:border-blue-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2">
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">description</label>
                        <div class="mt-2">
                            <textarea id="description" name="description" type="text-area" autocomplete="description" required class=" pl-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
                        </div>

                    </div>

                    <div class="mt-4">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <select name="status" id="status" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                            <option value="active">Active</option>
                            <option value="in_progress">In Progress</option>
                            <option value="complete">Complete</option>
                        </select>
                    </div>

                    <div class="mt-4">
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add Task</button>
                    </div>
                </form>

            <p class="mt-10 text-center text-sm text-gray-500">

                <a href="{{ route('tasks.index') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Go Back</a>
            </p>
            </div>
        </div>

    </div>


@endsection
