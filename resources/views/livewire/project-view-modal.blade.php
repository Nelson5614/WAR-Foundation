<div>
    @if ($showModal)
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

        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay -->
                <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true" @click="$wire.closeModal()"></div>

                <!-- Modal panel -->
                <div class="inline-block w-full max-w-3xl my-8 overflow-hidden text-left align-middle transition-all transform bg-white rounded-xl shadow-xl">
                    <!-- Header -->
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold leading-6 text-gray-900" id="modal-title">
                                Project Details
                            </h3>
                            <button type="button" 
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 flex items-center justify-center"
                                    wire:click="closeModal">
                                <i class="fas fa-times"></i>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="px-6 py-4">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">{{ $project->title }}</h2>
                            
                            <div class="flex flex-wrap items-center gap-2 mt-2 mb-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $statusClass }}">
                                    <i class="fas fa-{{ $statusIcon }} mr-1"></i>
                                    {{ str_replace('_', ' ', ucfirst($project->status)) }}
                                </span>
                                <span class="text-sm text-gray-500">
                                    <i class="far fa-calendar-alt mr-1"></i>
                                    {{ $startDate->format('M d, Y') }} - {{ $endDate->format('M d, Y') }}
                                </span>
                            </div>

                            @if($project->manager)
                                <div class="flex items-center text-gray-700 mb-4">
                                    <span class="w-24 text-sm font-medium text-gray-500">Managed by:</span>
                                    <div class="flex items-center">
                                        <i class="fas fa-user-tie mr-2 text-gray-400"></i>
                                        <span>{{ $project->manager }}</span>
                                    </div>
                                </div>
                            @endif

                            <!-- Progress Bar -->
                            <div class="mt-6 mb-6">
                                <div class="flex justify-between text-sm text-gray-600 mb-1">
                                    <span>Project Progress</span>
                                    <span>{{ round($progress) }}% Complete</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $progress }}%"></div>
                                </div>
                                <div class="flex justify-between text-xs text-gray-500 mt-1">
                                    <span>Start: {{ $startDate->format('M d, Y') }}</span>
                                    <span>Due: {{ $endDate->format('M d, Y') }}</span>
                                </div>
                            </div>

                            <!-- Project Description -->
                            <div class="mt-6">
                                <h3 class="text-sm font-medium text-gray-500 mb-2">DESCRIPTION</h3>
                                <div class="prose max-w-none text-gray-600">
                                    @if($project->description)
                                        {!! nl2br(e($project->description)) !!}
                                    @else
                                        <p class="text-gray-400 italic">No description provided.</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Additional Details -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6 pt-6 border-t border-gray-200">
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 mb-2">DATES</h4>
                                <div class="space-y-2">
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-calendar-day w-5 text-blue-500 mr-2"></i>
                                        <div>
                                            <div class="text-sm font-medium">Start Date</div>
                                            <div class="text-sm text-gray-500">{{ $startDate->format('F j, Y') }}</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-flag-checkered w-5 text-green-500 mr-2"></i>
                                        <div>
                                            <div class="text-sm font-medium">End Date</div>
                                            <div class="text-sm text-gray-500">{{ $endDate->format('F j, Y') }}</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-hourglass-half w-5 text-yellow-500 mr-2"></i>
                                        <div>
                                            <div class="text-sm font-medium">Duration</div>
                                            <div class="text-sm text-gray-500">{{ $startDate->diffInDays($endDate) }} days</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <h4 class="text-sm font-medium text-gray-500 mb-2">STATUS</h4>
                                <div class="space-y-2">
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-info-circle w-5 text-purple-500 mr-2"></i>
                                        <div>
                                            <div class="text-sm font-medium">Current Status</div>
                                            <div class="text-sm text-gray-500 capitalize">{{ str_replace('_', ' ', $project->status) }}</div>
                                        </div>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-clock w-5 text-gray-500 mr-2"></i>
                                        <div>
                                            <div class="text-sm font-medium">Created</div>
                                            <div class="text-sm text-gray-500" title="{{ $project->created_at->format('F j, Y g:i A') }}">
                                                {{ $project->created_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex items-center text-gray-700">
                                        <i class="fas fa-sync-alt w-5 text-gray-500 mr-2"></i>
                                        <div>
                                            <div class="text-sm font-medium">Last Updated</div>
                                            <div class="text-sm text-gray-500" title="{{ $project->updated_at->format('F j, Y g:i A') }}">
                                                {{ $project->updated_at->diffForHumans() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 sm:flex sm:flex-row-reverse">
                        <button type="button" 
                                class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                                wire:click="closeModal">
                            Close
                        </button>
                        @can('edit projects')
                        <a href="{{ route('projects.edit', $project->id) }}" 
                           class="inline-flex justify-center w-full px-4 py-2 mt-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            <i class="fas fa-edit mr-2"></i> Edit Project
                        </a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
