@extends('admin.layouts.app')

@section('title', 'Contact Messages')

@section('content')
    <div class="bg-white shadow rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">Contact Messages</h2>
                <div class="relative">
                    @if($unreadCount > 0)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            {{ $unreadCount }} unread
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            From
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Subject
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($messages as $message)
                        <tr class="{{ !$message->is_read ? 'bg-blue-50' : 'hover:bg-gray-50' }}">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                        <span class="text-indigo-600 font-medium">{{ strtoupper(substr($message->name, 0, 1)) }}</span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">{{ $message->name }}</div>
                                        <div class="text-sm text-gray-500">{{ $message->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">{{ $message->subject }}</div>
                                <div class="text-sm text-gray-500 truncate max-w-xs">{{ Str::limit($message->message, 50) }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $message->created_at->format('M j, Y') }}</div>
                                <div class="text-sm text-gray-500">{{ $message->created_at->format('g:i A') }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.contacts.show', $message->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">View</a>
                                <form action="{{ route('admin.contacts.destroy', $message->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this message?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                No contact messages found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($messages->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
@endsection
