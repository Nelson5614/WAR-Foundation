
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

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Manage Tasks</h1>


                <div class="w-full mt-12">
                    <div class="flex">
                        <div>

                            <p class="text-xl pb-3 flex items-center">
                                <i class="fas fa-list mr-3"></i> Tasks
                            </p>
                        </div>
                        <div class="justify-end">

                            <div class="mx-4">
                                <a href="{{ route('tasks.create') }}" class=" px-2 py-1 rounded-md bg-blue-700 text-white">
                                    Add New Task
                                    <i class="fas fa-plus mx-2"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                    @livewire('task-status')
                    {{ $tasks->links() }}
                </div>
            </main>

            <footer class="w-full bg-white text-right p-4">
                Built by <a class="underline">Nelson Mathebeng</a>.
            </footer>
        </div>
@endsection

