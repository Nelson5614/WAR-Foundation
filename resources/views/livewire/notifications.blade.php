<div class="relative" x-data="{ open: false }">
    {{-- Be like water. --}}
    <!-- Notification Bell -->
    <button 
        @click="open = !open"
        class="relative p-1 text-gray-400 hover:text-gray-500 focus:outline-none"
        aria-label="Notifications"
    >
        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
        </svg>
        @if($unreadCount > 0)
            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-white transform translate-x-1/2 -translate-y-1/2 bg-red-500 rounded-full">
                {{ $unreadCount > 9 ? '9+' : $unreadCount }}
            </span>
        @endif
    </button>

    <!-- Notification Dropdown -->
    <div 
        x-show="open" 
        @click.away="open = false"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="transform opacity-0 scale-95"
        x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute right-0 mt-2 w-80 bg-white dark:bg-gray-800 rounded-md shadow-lg overflow-hidden z-50"
    >
        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Notifications</h3>
                @if(count($notifications) > 0)
                    <button wire:click="markAllAsRead" class="text-sm text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                        Mark all as read
                    </button>
                @endif
            </div>
        </div>

        <div class="max-h-96 overflow-y-auto">
            @forelse($notifications as $notification)
                <div class="border-b border-gray-200 dark:border-gray-700 last:border-0">
                    <a 
                        href="{{ route('admin.contacts.show', $notification->data['contact_id'] ?? '#') }}" 
                        class="block px-4 py-3 hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-150 ease-in-out"
                        @if($notification->unread())
                            wire:click.prevent="markAsRead('{{ $notification->id }}')"
                        @endif
                    >
                        <div class="flex items-start">
                            <div class="flex-shrink-0 pt-0.5">
                                <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                </svg>
                            </div>
                            <div class="ml-3 w-0 flex-1">
                                <p class="text-sm font-medium text-gray-900 dark:text-white">
                                    {{ $notification->data['subject'] ?? 'New Message' }}
                                </p>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400 line-clamp-2">
                                    {{ $notification->data['message'] ?? 'You have a new message' }}
                                </p>
                                <p class="mt-1 text-xs text-gray-400">
                                    {{ $notification->created_at->diffForHumans() }}
                                </p>
                            </div>
                            @if($notification->unread())
                                <div class="flex-shrink-0 ml-2">
                                    <span class="h-2 w-2 bg-blue-500 rounded-full"></span>
                                </div>
                            @endif
                        </div>
                    </a>
                </div>
            @empty
                <div class="p-4 text-center text-gray-500 dark:text-gray-400">
                    No notifications
                </div>
            @endforelse
        </div>

        @if(count($notifications) > 0)
            <div class="px-4 py-2 bg-gray-50 dark:bg-gray-700 text-center border-t border-gray-200 dark:border-gray-600">
                <a href="{{ route('admin.contacts.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300">
                    View all messages
                </a>
            </div>
        @endif
    </div>
</div>
