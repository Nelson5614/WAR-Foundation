@extends('layouts.counselor')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg p-8 bg-white border border-gray-300 rounded-lg shadow-lg">
        <div class="flex justify-between mb-2">
            <div>
                <span>Logo</span></div> <!-- Empty div for alignment -->
            <div>
                <p class="text-right font-bold text-gray-500">ID: <span class="font-semibold text-red-500">#00{{ $student->id }}</span></p>
                <p class="text-right font-bold text-gray-500">Issue: <span class="font-light text-gray-800">{{ $student->student_issue }}Anxiety</span></p>
            </div>
        </div>
        <div class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700">Name:</label>
                <p class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm sm:text-sm">{{ $student->name }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Last Name:</label>
                <p class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm sm:text-sm">{{ $student->surname }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Email:</label>
                <p class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm sm:text-sm">{{ $student->email }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Address:</label>
                <p class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm sm:text-sm">{{ $student->address }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Phone:</label>
                <p class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm sm:text-sm">{{ $student->phone }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Note:</label>
                <p class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm sm:text-sm">{{ $student->description }}</p>
            </div>
        </div>
    </div>

</div>
@endsection
