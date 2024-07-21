

<div class="bg-white overflow-auto">
    <table class="min-w-full bg-white">
        <thead class="bg-gray-800 text-white">
            <tr>
                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Project Manager</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Start Date</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">End Date</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Description</th>
                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
            </tr>
        </thead>
        <tbody class="text-gray-700">
            @foreach ($projects as $project)
            <tr class="{{ $loop->index % 2 == 1? 'bg-gray-300': '' }}">

                <td class="w-1/3 text-left py-3 px-4">{{ $project->title }}</td>
                <td class="w-1/3 text-left py-3 px-4">{{ $project->manager }}</td>
                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">{{ $project->start_date }}</a></td>
                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">{{ $project->end_date }}</a></td>
                <td class="w-1/3 text-left py-3 px-4">
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
                <td class="w-1/3 text-left py-3 px-4">{{ $project->description }}</td>
                <td>
                    <div class="flex">
                        <div class="px-1">
                            <div class=" mt-2">

                                <a href="{{ route('projects.edit', $project->id) }}" class="bg-blue-700 py-2 px-2 text-white rounded-md">View</a>
                            </div>

                        </div>
                        <div class="px-1">
                            <div class=" mt-2">

                                <a href="{{ route('projects.edit', $project->id) }}" class="bg-green-700 py-2 px-2 text-white rounded-md">Edit</a>
                            </div>

                        </div>
                        <div class="px-1">
                            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 py-2 px-2 text-white rounded-md" wire:confirm="Are you sure you want to delete this project?">Delete</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>


</div>
