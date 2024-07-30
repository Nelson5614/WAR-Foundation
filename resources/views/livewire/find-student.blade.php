<div>
    <input type="text" wire:model="search" placeholder="Search students..."  class="w-full p-2 mb-3 border rounded">

    <div class="w-full mt-12">
        <div class="overflow-auto bg-white">
            <table class="min-w-full bg-white">
                <thead class="text-white bg-gray-800">
                    <tr>
                        <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Name</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Surname</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Email</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Phone</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Address</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach ($students as $student)
                    <tr class="{{ $loop->index % 2 == 1? 'bg-gray-300': '' }}">

                        <td class="w-1/3 px-4 py-3 text-left">{{ $student->name }}</td>
                        <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" >{{ $student->surname }}</a></td>
                        <td class="px-4 py-3 text-left"><a class="hover:text-blue-500">{{ $student->email }}</a></td>
                        <td class="px-4 py-3 text-left"><a class="hover:text-blue-500">{{ $student->phone }}</a></td>
                        <td class="px-4 py-3 text-left"><a class="hover:text-blue-500">{{ $student->address }}</a></td>


                        <td>
                            <div class="flex">
                                <div class="px-1">
                                    <div class="mt-2">
                                        <a href="{{ route('view-student-form', $student->id)}}"  class="px-2 py-2 text-white bg-blue-700 rounded-md"><i class="bi bi-eye"></i></a>
                                    </div>

                                </div>
                                <div class="px-1">
                                    <div class="mt-2">
                                        <a href="{{ route('studentfiles.download', $student->id)}}"  class="px-2 py-2 text-white bg-green-700 rounded-md"><i class="bi bi-arrow-down-circle"></i></a>
                                    </div>

                                </div>


                                <div class="px-1">
                                    <form action="{{ route('counselor-student-files.destroy', $student->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-2 py-2 text-white bg-red-600 rounded-md"><i class="bi bi-trash3"></i></button>
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
</div>
