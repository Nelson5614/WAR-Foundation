
@extends('layouts.counselor')

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

        <div class="flex flex-col w-full overflow-x-hidden border-t">
            <main class="flex-grow w-full p-6">
                <h1 class="pb-6 text-3xl text-black">Manage Projects</h1>


                <div class="w-full mt-12">
                    <div class="flex">
                        <div>

                            <p class="flex items-center pb-3 text-xl">
                                <i class="mr-3 fas fa-list"></i> Projects
                            </p>
                        </div>
                        @can('add projects')

                        <div class="mx-4">
                            <a href="{{ route('projects.create') }}" class="px-2 py-1 text-white bg-blue-700 rounded-md ">
                                Add New Project
                                <i class="mx-2 fas fa-plus"></i>
                            </a>
                        </div>
                        @endcan
                    </div>
                    @livewire('project-status')
                    {{ $sharedprojects->links() }}
                </div>
            </main>

            <footer class="w-full p-4 text-right bg-white">
                Built by <a class="underline">Nelson Mathebeng</a>.
            </footer>
        </div>
@endsection

