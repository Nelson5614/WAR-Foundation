
<div>

    @livewire('project-view-modal')
    <div class="overflow-auto bg-white">
        <table class="min-w-full bg-white">
            <thead class="text-white bg-gray-800">
                <tr>
                    <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Title</th>
                    <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Project Manager</th>
                    <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Start Date</th>
                    <th class="px-4 py-3 text-sm font-semibold text-left uppercase">End Date</th>
                    <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Status</th>
                    <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Description</th>
                    <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($projects as $project)
                <tr class="{{ $loop->index % 2 == 1? 'bg-gray-300': '' }}">

                    <td class="w-1/3 px-4 py-3 text-left">{{ $project->title }}</td>
                    <td class="w-1/3 px-4 py-3 text-left">{{ $project->manager }}</td>
                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" >{{ $project->start_date }}</a></td>
                    <td class="px-4 py-3 text-left"><a class="hover:text-blue-500">{{ $project->end_date }}</a></td>
                    <td class="w-1/3 px-4 py-3 text-left">
                        @if ($project->status == 'complete')
                        <span class="text-red-500">{{ $project->status }}</span>
                        @endif
                        @if ($project->status == 'active')
                        <span class="text-green-500">{{ $project->status }}</span>
                        @endif
                        @if ($project->status == 'in_progress')
                        <span class="text-yellow-500">{{ $project->status }}</span>
                        @endif
                    </td>
                    <td class="w-1/3 px-4 py-3 text-left">{{ $project->description }}</td>
                    <td>
                        <div class="flex">
                            <div class="px-1">

                                @can('view projects')

                                <button  class="px-2 py-2 text-white bg-blue-700 rounded-md" wire:click="$emit('openModal', {{ $project->id }})">View</button>

                                @endcan



                            </div>
                            <div class="px-1">
                                <div class="mt-2 ">
                                    @can('edit projects')
                                    <a href="{{ route('projects.edit', $project->id) }}" class="px-2 py-2 text-white bg-green-700 rounded-md">Edit</a>
                                    @endcan
                                </div>

                            </div>

                            @can('delete projects')

                            <div class="px-1">
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-2 py-2 text-white bg-red-600 rounded-md" wire:confirm="Are you sure you want to delete this project?">Delete</button>
                                </form>
                            </div>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>


    </div>
</div>
