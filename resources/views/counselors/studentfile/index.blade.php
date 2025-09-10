@extends('layouts.counselor')

@section('title', 'Student Files')

@section('content')
<div class="flex flex-col w-full overflow-x-hidden">
    <main class="flex-grow w-full p-6">
        <!-- Header Section -->
        <div class="flex flex-col justify-between mb-8 md:items-center md:flex-row">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Student Files</h1>
                <p class="mt-2 text-gray-600">Search and manage student files and documents</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <i class="mr-2 fas fa-upload"></i> Upload New File
                </a>
            </div>
        </div>

        <!-- Livewire Component -->
        <livewire:find-student />
    </main>
</div>

@push('scripts')
<script>
    // Add any additional JavaScript here if needed
    document.addEventListener('livewire:load', function () {
        // Livewire component is loaded
    });
</script>
@endpush
@endsection