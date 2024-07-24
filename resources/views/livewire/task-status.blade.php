
<div>

    @livewire('task-view-modal')
    <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Title</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Start Date</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">End Date</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Status</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Description</th>
                    <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($tasks as $task)
                <tr class="{{ $loop->index % 2 == 1? 'bg-gray-300': '' }}">

                    <td class="w-1/3 text-left py-3 px-4">{{ $task->title }}</td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500" >{{ $task->start_date }}</a></td>
                    <td class="text-left py-3 px-4"><a class="hover:text-blue-500">{{ $task->end_date }}</a></td>
                    <td class="w-1/3 text-left py-3 px-4">
                        @if ($task->status == 'complete')
                        <span class="text-red-500">{{ $task->status }}</span>
                        @endif
                        @if ($task->status == 'active')
                        <span class="text-green-500">{{ $task->status }}</span>
                        @endif
                        @if ($task->status == 'in_progress')
                        <span class="text-yellow-500">{{ $task->status }}</span>
                        @endif
                    </td>
                    <td class="w-1/3 text-left py-3 px-4">{{ $task->description }}</td>
                    <td>
                        <div class="flex">
                            <div class="px-1">
                                <div class="">


                                    <button  class="bg-blue-700 py-2 px-2 text-white rounded-md" wire:click="$emit('openModal', {{ $task->id }})">View</button>
                                </div>

                            </div>
                            <div class="px-1">
                                <div class=" mt-2">

                                    <a href="{{ route('tasks.edit', $task->id) }}" class="bg-green-700 py-2 px-2 text-white rounded-md">Edit</a>
                                </div>

                            </div>
                            <div class="px-1">
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 py-2 px-2 text-white rounded-md">Delete</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>


    </div>
</div>

