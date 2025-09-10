@extends('layouts.counselor')

@section('content')
<div class="w-full overflow-x-hidden border-t flex flex-col">
    <main class="w-full flex-grow p-6">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Edit Student File</h1>
                <p class="text-gray-600 mt-1">Update student information and session notes</p>
            </div>
            <a href="{{ url('/counselor/counselor-student-files') }}" 
               class="flex items-center text-blue-600 hover:text-blue-800">
                <i class="fas fa-arrow-left mr-2"></i> Back to Student Files
            </a>
        </div>

        <!-- Form Section -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <form action="{{ url('/counselor/counselor-student-files/' . $studentfile->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Student Information -->
                <div class="mb-8">
                    <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Student Information</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">
                                First Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="name" name="name" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                   value="{{ old('name', $studentfile->name) }}">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="surname" class="block text-sm font-medium text-gray-700 mb-1">
                                Last Name <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="surname" name="surname" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                   value="{{ old('surname', $studentfile->surname) }}">
                            @error('surname')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                Email <span class="text-red-500">*</span>
                            </label>
                            <input type="email" id="email" name="email" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                   value="{{ old('email', $studentfile->email) }}">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                Phone Number
                            </label>
                            <input type="tel" id="phone" name="phone"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                   value="{{ old('phone', $studentfile->phone) }}">
                            @error('phone')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">
                                Address
                            </label>
                            <input type="text" id="address" name="address"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                   value="{{ old('address', $studentfile->address) }}">
                            @error('address')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Session Notes -->
                <div class="mb-8">
                    <h3 class="text-lg font-medium text-gray-900 border-b pb-2 mb-4">Session Notes & Updates</h3>
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">
                            Session Notes <span class="text-red-500">*</span>
                        </label>
                        <p class="text-xs text-gray-500 mb-2">
                            Add your session notes below. The current date and time will be automatically included.
                        </p>
                        <div class="relative">
                            <div class="absolute top-3 right-3 text-xs text-gray-500">
                                {{ now()->format('M d, Y h:i A') }}
                            </div>
                            <textarea id="description" name="description" rows="8" required
                                     class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                     placeholder="Enter session notes, updates, or any relevant information">{{ old('description', $studentfile->description) }}</textarea>
                        </div>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="pt-6 border-t border-gray-200 flex flex-col sm:flex-row justify-between space-y-4 sm:space-y-0 sm:space-x-3">
                    <div class="flex items-center">
                        <input id="notify_student" name="notify_student" type="checkbox" 
                               class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                               {{ old('notify_student') ? 'checked' : '' }}>
                        <label for="notify_student" class="ml-2 block text-sm text-gray-700">
                            Notify student of updates via email
                        </label>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ url('/counselor/counselor-student-files') }}" 
                           class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            Cancel
                        </a>
                        <button type="submit" 
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            <i class="fas fa-save mr-2"></i>
                            Save Changes
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>

@push('scripts')
<script>
    // Add any client-side validation or functionality here
    document.addEventListener('DOMContentLoaded', function() {
        // You can add any client-side interactivity here
    });
</script>
@endpush

@endsection
