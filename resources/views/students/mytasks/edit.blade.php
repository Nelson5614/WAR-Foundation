@extends('layouts.student')
@section('content')

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))

    <div class="alert alert-danger">
        {{ session('error') }}
    </div>

    @endif
    <div class="min-h-screen container mx-auto py-8 px-20 w-full">

        <div class=" min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Edit Task</h2>
            </div>

            <div class="mt-10 sm:mx-auto w-full ">
                <form class="space-y-6" action="{{ route('tasks.update', $tasks->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class=" grid md:grid-cols-2 md:gap-6">

                        <div>
                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Task Title</label>
                            <div class="mt-2">
                                <input id="title" name="title" type="text"{{ old('title', $tasks->title) }} required class="pl-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        {{-- <div>
                            <label for="manager" class="block text-sm font-medium leading-6 text-gray-900">Project manager</label>
                            <div class="mt-2">
                                <input id="manager" name="manager" type="text" autocomplete="manager" required class=" pl-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div> --}}
                    </div>
                    <div>
                    <div class=" grid md:grid-cols-2 md:gap-6">

                        <div>
                            <label for="start_date" class="block text-sm font-medium leading-6 text-gray-900">Start Date</label>
                            <div class="mt-2">
                                <input id="start_date" name="start_date" type="date" autocomplete="start_date" required class=" pl-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>

                        <div>
                            <label for="end_date" class="block text-sm font-medium leading-6 text-gray-900">End Date</label>
                            <div class="mt-2">
                                <input id="end_date" name="end_date" type="date" autocomplete="end_date" required class=" pl-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div class="form-group hidden">
                        <label for="status">Status</label>
                        <select id="status" name="status" class="form-control">
                            <option value="active" {{ (isset($task) && $task->status == 'active') ? 'selected' : '' }}>Active</option>
                            <option value="in_progress" {{ (isset($task) && $task->status == 'In progress') ? 'selected' : '' }}>In Progress</option>
                            <option value="complete" {{ (isset($task) && $task->status == 'complete') ? 'selected' : '' }}>Complete</option>
                        </select>
                    </div>

                    <div class="mt-2">
                        <label for="description" class="block text-sm font-medium leading-6 text-gray-900">description</label>
                        <div class="mt-2">
                            <textarea id="description" name="description" type="text-area" autocomplete="description" required class=" pl-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">{{ old('description', $tasks->description) }}</textarea>
                        </div>

                    </div>

                    <div class="mt-4">
                    <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                    </div>
                </form>

            <p class="mt-10 text-center text-sm text-gray-500">

                <a href="{{ route('tasks.index') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Go Back</a>
            </p>
            </div>
        </div>

    </div>


@endsection
