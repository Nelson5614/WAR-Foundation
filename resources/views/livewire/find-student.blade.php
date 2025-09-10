<div>
    <!-- Search Input -->
    <div class="relative max-w-md mb-6">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <i class="text-gray-400 fas fa-search"></i>
        </div>
        <input 
            type="text" 
            wire:model.debounce.300ms="search" 
            placeholder="Search students by name, email, or ID..." 
            class="block w-full py-2 pl-10 pr-3 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
        >
    </div>

    <!-- Students Table -->
    <div class="overflow-hidden bg-white rounded-lg shadow">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Student</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Contact</th>
                        <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Files</th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($students as $student)
                    <tr class="transition-colors duration-150 hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 w-10 h-10">
                                    <div class="flex items-center justify-center w-10 h-10 text-white bg-blue-500 rounded-full">
                                        {{ strtoupper(substr($student->name, 0, 1)) }}{{ strtoupper(substr($student->surname, 0, 1)) }}
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $student->name }} {{ $student->surname }}</div>
                                    <div class="text-sm text-gray-500">{{ $student->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $student->phone }}</div>
                            <div class="text-sm text-gray-500">{{ $student->address }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <i class="mr-1 fas fa-file"></i> 3 files
                            </span>
                        </td>
                        <td class="px-6 py-4 text-sm font-medium text-right whitespace-nowrap">
                            <div class="flex items-center justify-end space-x-2">
                                <a href="{{ route('view-student-form', $student->id) }}" 
                                   class="p-1.5 text-blue-600 rounded-md hover:bg-blue-50" 
                                   title="View Details">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ url('/counselor/counselor-student-files/' . $student->id . '/edit') }}" 
                                   class="p-1.5 text-yellow-600 rounded-md hover:bg-yellow-50" 
                                   title="Edit Student File">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('studentfiles.download', $student->id) }}" 
                                   class="p-1.5 text-green-600 rounded-md hover:bg-green-50" 
                                   title="Download Files">
                                    <i class="fas fa-download"></i>
                                </a>
                                <form action="{{ url('/counselor/counselor-student-files/' . $student->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="p-1.5 text-red-600 rounded-md hover:bg-red-50" 
                                            title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this student\'s files?')">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-sm text-center text-gray-500">
                            No students found. Try adjusting your search.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    @if($students->hasPages())
    <div class="flex items-center justify-between px-4 py-3 bg-white border-t border-gray-200 sm:px-6">
        <div class="flex justify-between flex-1 sm:hidden">
            @if($students->onFirstPage())
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 rounded-md cursor-not-allowed">
                Previous
            </span>
            @else
            <a href="{{ $students->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                Previous
            </a>
            @endif
            
            @if($students->hasMorePages())
            <a href="{{ $students->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                Next
            </a>
            @else
            <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-400 bg-white border border-gray-300 rounded-md cursor-not-allowed">
                Next
            </span>
            @endif
        </div>
    </div>
    @endif
</div>
