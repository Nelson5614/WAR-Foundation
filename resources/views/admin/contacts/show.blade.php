@extends('admin.layouts.app')

@section('title', 'View Message')

@section('content')
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">Message Details</h2>
                <div class="flex space-x-3">
                    @if(!$message->is_read)
                        <form action="{{ route('admin.contacts.markAsRead', $message->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Mark as Read
                            </button>
                        </form>
                    @endif
                    <form action="{{ route('admin.contacts.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="px-6 py-6">
            <div class="mb-6">
                <h3 class="text-lg font-medium text-gray-900">{{ $message->subject }}</h3>
                <div class="mt-1 text-sm text-gray-500">
                    Received on {{ $message->created_at->format('F j, Y \a\t g:i A') }}
                </div>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg mb-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">From</h4>
                        <p class="mt-1 text-sm text-gray-900">{{ $message->name }}</p>
                    </div>
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Email</h4>
                        <p class="mt-1 text-sm text-gray-900">
                            <a href="mailto:{{ $message->email }}" class="text-blue-600 hover:text-blue-800">
                                {{ $message->email }}
                            </a>
                        </p>
                    </div>
                    @if($message->phone)
                        <div>
                            <h4 class="text-sm font-medium text-gray-500">Phone</h4>
                            <p class="mt-1 text-sm text-gray-900">
                                <a href="tel:{{ $message->phone }}" class="text-blue-600 hover:text-blue-800">
                                    {{ $message->phone }}
                                </a>
                            </p>
                        </div>
                    @endif
                    <div>
                        <h4 class="text-sm font-medium text-gray-500">Status</h4>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $message->is_read ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                            {{ $message->is_read ? 'Read' : 'Unread' }}
                        </span>
                    </div>
                </div>

                <div class="mt-6">
                    <h4 class="text-sm font-medium text-gray-500">Message</h4>
                    <div class="mt-1 text-sm text-gray-900 whitespace-pre-line bg-white p-4 rounded border border-gray-200">
                        {{ $message->message }}
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center mt-8 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.contacts.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Back to Messages
                </a>
                <div class="flex space-x-3">
                    <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                        Reply via Email
                    </a>
                    @if($message->phone)
                        <a href="tel:{{ $message->phone }}" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                            </svg>
                            Call
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
