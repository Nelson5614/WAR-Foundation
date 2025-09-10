
<div class="space-y-6">
    @livewire('counselor-task-view-modal')
    
    @if($tasks->isEmpty())
        <div class="bg-white rounded-xl shadow-sm p-8 text-center">
            <div class="mx-auto w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-tasks text-gray-400 text-2xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-1">No tasks found</h3>
            <p class="text-gray-500 mb-4">Get started by creating a new task</p>
            <a href="{{ route('counselor-tasks.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-plus mr-2"></i> Create Task
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 gap-6">
            @foreach($tasks as $task)
                @php
                    $statusClass = [
                        'active' => 'bg-green-100 text-green-800',
                        'in_progress' => 'bg-yellow-100 text-yellow-800',
                        'complete' => 'bg-blue-100 text-blue-800',
                        'completed' => 'bg-blue-100 text-blue-800',
                    ][$task->status] ?? 'bg-gray-100 text-gray-800';
                    
                    $statusIcon = [
                        'active' => 'clock',
                        'in_progress' => 'spinner',
                        'complete' => 'check-circle',
                        'completed' => 'check-circle',
                    ][$task->status] ?? 'circle';
                @endphp
                
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden task-card">
                    <div class="p-6">
                        <div class="flex items-start justify-between">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center space-x-2 mb-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClass }}">
                                        <i class="fas fa-{{ $statusIcon }} mr-1"></i>
                                        {{ str_replace('_', ' ', ucfirst($task->status)) }}
                                    </span>
                                    <span class="text-sm text-gray-500">
                                        <i class="far fa-calendar-alt mr-1"></i>
                                        {{ \Carbon\Carbon::parse($task->start_date)->format('M d, Y') }} - 
                                        {{ \Carbon\Carbon::parse($task->end_date)->format('M d, Y') }}
                                    </span>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                    {{ $task->title }}
                                </h3>
                                @if($task->description)
                                    <p class="text-gray-600 mb-4 line-clamp-2">
                                        {{ $task->description }}
                                    </p>
                                @endif
                            </div>
                            <div class="ml-4 flex-shrink-0">
                                <div class="relative inline-block text-left" x-data="{ open: false }">
                                    <button @click="open = !open" type="button" class="text-gray-400 hover:text-gray-500 focus:outline-none">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    
                                    <div x-show="open" 
                                         @click.away="open = false"
                                         x-transition:enter="transition ease-out duration-100"
                                         x-transition:enter-start="transform opacity-0 scale-95"
                                         x-transition:enter-end="transform opacity-100 scale-100"
                                         x-transition:leave="transition ease-in duration-75"
                                         x-transition:leave-start="transform opacity-100 scale-100"
                                         x-transition:leave-end="transform opacity-0 scale-95"
                                         class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none z-10">
                                        <div class="py-1">
                                            <button wire:click="$emit('openModal', {{ $task->id }})" 
                                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                                <i class="fas fa-eye mr-2 text-gray-500"></i> View Details
                                            </button>
                                            <a href="{{ route('counselor-tasks.edit', $task->id) }}" 
                                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                                <i class="fas fa-edit mr-2 text-blue-500"></i> Edit
                                            </a>
                                            <form action="{{ route('counselor-tasks.destroy', $task->id) }}" method="POST" class="block w-full">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 hover:text-red-800"
                                                        onclick="return confirm('Are you sure you want to delete this task?')">
                                                    <i class="fas fa-trash-alt mr-2"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4 flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <span class="text-xs text-gray-500">
                                    <i class="far fa-clock mr-1"></i>
                                    Created {{ $task->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <div class="flex space-x-2">
                                <button wire:click="$emit('openModal', {{ $task->id }})" 
                                        class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-lg text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                    <i class="fas fa-eye mr-1"></i> View
                                </button>
                                <a href="{{ route('counselor-tasks.edit', $task->id) }}" 
                                   class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

