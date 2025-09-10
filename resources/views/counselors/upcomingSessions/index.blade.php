
@extends('layouts.counselor')

@section('title', 'Upcoming Sessions')

@section('content')
<div class="flex flex-col w-full overflow-x-hidden">
    <main class="flex-grow w-full p-6">
        <!-- Header Section -->
        <div class="flex flex-col justify-between mb-8 md:items-center md:flex-row">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Upcoming Sessions</h1>
                <p class="mt-2 text-gray-600">Manage and schedule your counseling sessions</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('set-new-session.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <i class="mr-2 fas fa-plus"></i> Schedule New Session
                </a>
            </div>
        </div>

        <!-- Session Cards -->
        <div class="grid grid-cols-1 gap-6 mb-8">
            @forelse($sessions as $session)
            <div class="p-6 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 p-3 bg-blue-100 rounded-lg">
                            <i class="text-blue-600 fas fa-calendar-day text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Session with {{ $session->name }} {{ $session->surname }}</h3>
                            <div class="mt-1 space-y-1 text-sm text-gray-500">
                                <div class="flex items-center">
                                    <i class="w-4 h-4 mr-2 far fa-calendar"></i>
                                    <span>{{ \Carbon\Carbon::parse($session->date)->format('l, F j, Y') }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="w-4 h-4 mr-2 far fa-clock"></i>
                                    <span>{{ \Carbon\Carbon::parse($session->date)->format('g:i A') }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="w-4 h-4 mr-2 fas fa-phone"></i>
                                    <a href="tel:{{ $session->phone }}" class="text-blue-600 hover:text-blue-800">{{ $session->phone }}</a>
                                </div>
                                <div class="flex items-center">
                                    <i class="w-4 h-4 mr-2 far fa-envelope"></i>
                                    <a href="mailto:{{ $session->email }}" class="text-blue-600 hover:text-blue-800">{{ $session->email }}</a>
                                </div>
                                @if($session->address)
                                <div class="flex items-start">
                                    <i class="w-4 h-4 mt-1 mr-2 fas fa-map-marker-alt"></i>
                                    <span>{{ $session->address }}</span>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col mt-4 space-y-2 md:mt-0 md:flex-row md:space-y-0 md:space-x-2">
                        <a href="{{ route('counselor.session-requests.show', $session->id) }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <i class="mr-2 far fa-eye"></i> View Details
                        </a>
                        <form action="{{ route('upcoming-sessions.destroy', $session->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" onclick="return confirm('Are you sure you want to delete this session?')">
                                <i class="mr-2 far fa-trash-alt"></i> Cancel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            @empty
            <div class="p-8 text-center bg-white rounded-lg shadow-sm">
                <i class="mx-auto mb-4 text-gray-400 text-4xl far fa-calendar-times"></i>
                <h3 class="text-lg font-medium text-gray-900">No upcoming sessions</h3>
                <p class="mt-1 text-sm text-gray-500">You don't have any scheduled sessions yet.</p>
                <div class="mt-6">
                    <a href="{{ route('set-new-session.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="mr-2 fas fa-plus"></i> Schedule New Session
                    </a>
                </div>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($sessions->hasPages())
        <div class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200 sm:px-6 rounded-b-lg">
            <div class="flex justify-between flex-1 sm:hidden">
                @if($sessions->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 rounded-md cursor-not-allowed">
                    Previous
                </span>
                @else
                <a href="{{ $sessions->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    Previous
                </a>
                @endif
                
                @if($sessions->hasMorePages())
                <a href="{{ $sessions->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    Next
                </a>
                @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-400 bg-white border border-gray-300 rounded-md cursor-not-allowed">
                    Next
                </span>
                @endif
            </div>
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Showing
                        <span class="font-medium">{{ $sessions->firstItem() }}</span>
                        to
                        <span class="font-medium">{{ $sessions->lastItem() }}</span>
                        of
                        <span class="font-medium">{{ $sessions->total() }}</span>
                        results
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                        @if($sessions->onFirstPage())
                        <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-300 bg-white border border-gray-300 rounded-l-md cursor-not-allowed">
                            <span class="sr-only">Previous</span>
                            <i class="fas fa-chevron-left"></i>
                        </span>
                        @else
                        <a href="{{ $sessions->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        @endif

                        @foreach($sessions->getUrlRange(1, $sessions->lastPage()) as $page => $url)
                            @if($page == $sessions->currentPage())
                            <span aria-current="page" class="relative z-10 inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-blue-600 border border-blue-500 bg-blue-50">
                                {{ $page }}
                            </span>
                            @else
                            <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
                                {{ $page }}
                            </a>
                            @endif
                        @endforeach

                        @if($sessions->hasMorePages())
                        <a href="{{ $sessions->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                        @else
                        <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-300 bg-white border border-gray-300 rounded-r-md cursor-not-allowed">
                            <span class="sr-only">Next</span>
                            <i class="fas fa-chevron-right"></i>
                        </span>
                        @endif
                    </nav>
                </div>
            </div>
        </div>
        @endif
    </main>
</div>

@endsection

