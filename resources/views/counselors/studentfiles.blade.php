
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
                <h1 class="pb-6 text-3xl text-black">Student Files</h1>


                @livewire('find-student')
            </main>

            <footer class="w-full p-4 text-right bg-white">
                Built by <a class="underline">Nelson Mathebeng</a>.
            </footer>
        </div>
@endsection

