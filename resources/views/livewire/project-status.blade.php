
<div class="space-y-6">
    @livewire('project-view-modal')
    
    @if($projects->isEmpty())
        <div class="bg-white rounded-xl shadow-sm p-8 text-center">
            <div class="mx-auto w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                <i class="fas fa-project-diagram text-gray-400 text-2xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 mb-1">No projects found</h3>
            <p class="text-gray-500 mb-4">Get started by creating a new project</p>
            @can('add projects')
            <a href="{{ route('projects.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                <i class="fas fa-plus mr-2"></i> Create Project
            </a>
            @endcan
        </div>
    @else
        <div class="grid grid-cols-1 gap-6">
            @foreach($projects as $project)
                @php
                    $statusClass = [
                        'active' => 'bg-green-100 text-green-800',
                        'in_progress' => 'bg-yellow-100 text-yellow-800',
                        'complete' => 'bg-blue-100 text-blue-800',
                        'completed' => 'bg-blue-100 text-blue-800',
                    ][$project->status] ?? 'bg-gray-100 text-gray-800';
                    
                    $statusIcon = [
                        'active' => 'clock',
                        'in_progress' => 'spinner',
                        'complete' => 'check-circle',
                        'completed' => 'check-circle',
                    ][$project->status] ?? 'folder';
                    
                    $startDate = \Carbon\Carbon::parse($project->start_date);
                    $endDate = \Carbon\Carbon::parse($project->end_date);
                    $now = now();
                    $progress = 0;
                    
                    if ($now->between($startDate, $endDate)) {
                        $totalDays = $startDate->diffInDays($endDate);
                        $elapsedDays = $startDate->diffInDays($now);
                        $progress = min(100, max(0, ($elapsedDays / $totalDays) * 100));
                    } elseif ($now > $endDate) {
                        $progress = 100;
                    }
                @endphp
                
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden project-card">
                    <div class="p-6">
                        <div class="flex items-start justify-between">
                            <div class="flex-1 min-w-0">
                                <div class="flex items-center space-x-2 mb-2">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClass }}">
                                        <i class="fas fa-{{ $statusIcon }} mr-1"></i>
                                        {{ str_replace('_', ' ', ucfirst($project->status)) }}
                                    </span>
                                    <span class="text-sm text-gray-500">
                                        <i class="far fa-calendar-alt mr-1"></i>
                                        {{ $startDate->format('M d, Y') }} - {{ $endDate->format('M d, Y') }}
                                    </span>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                    {{ $project->title }}
                                </h3>
                                @if($project->manager)
                                    <div class="flex items-center text-sm text-gray-600 mb-3">
                                        <i class="fas fa-user-tie mr-2 text-gray-400"></i>
                                        Managed by {{ $project->manager }}
                                    </div>
                                @endif
                                @if($project->description)
                                    <p class="text-gray-600 mb-4 line-clamp-2">
                                        {{ $project->description }}
                                    </p>
                                @endif
                                
                                <!-- Progress Bar -->
                                <div class="mt-4">
                                    <div class="flex justify-between text-sm text-gray-600 mb-1">
                                        <span>Progress</span>
                                        <span>{{ round($progress) }}%</span>
                                    </div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $progress }}%"></div>
                                    </div>
                                    <div class="flex justify-between text-xs text-gray-500 mt-1">
                                        <span>Start: {{ $startDate->format('M d') }}</span>
                                        <span>End: {{ $endDate->format('M d, Y') }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Actions Dropdown -->
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
                                            @can('view projects')
                                            <button wire:click="$emit('openModal', {{ $project->id }})" 
                                                    class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                                <i class="fas fa-eye mr-2 text-gray-500"></i> View Details
                                            </button>
                                            @endcan
                                            
                                            @can('edit projects')
                                            <a href="{{ route('projects.edit', $project->id) }}" 
                                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900">
                                                <i class="fas fa-edit mr-2 text-blue-500"></i> Edit
                                            </a>
                                            @endcan
                                            
                                            @can('delete projects')
                                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="block w-full">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 hover:text-red-800"
                                                        onclick="return confirm('Are you sure you want to delete this project?')">
                                                    <i class="fas fa-trash-alt mr-2"></i> Delete
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-4 flex items-center justify-between pt-4 border-t border-gray-100">
                            <div class="flex items-center space-x-2">
                                <span class="text-xs text-gray-500">
                                    <i class="far fa-clock mr-1"></i>
                                    Created {{ $project->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <div class="flex space-x-2">
                                @can('view projects')
                                <button wire:click="$emit('openModal', {{ $project->id }})" 
                                        class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-lg text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                    <i class="fas fa-eye mr-1"></i> View
                                </button>
                                @endcan
                                
                                @can('edit projects')
                                <a href="{{ route('projects.edit', $project->id) }}" 
                                   class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                                    <i class="fas fa-edit mr-1"></i> Edit
                                </a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
