@extends('layouts.student')

@section('title', 'Schedule New Session')

@section('header', 'Schedule a New Session')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Session Information</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Fill in the details to schedule a new counseling session.</p>
        </div>
        
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
            <form action="{{ route('upcomingsessions.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- User Information -->
                <div class="px-4 py-5 sm:px-6">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Your Information</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Your contact details for the session.</p>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 px-4 py-5">
                    <label for="name" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        First Name <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}" required class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('name')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 px-4 py-5">
                    <label for="surname" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Last Name <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="text" name="surname" id="surname" value="{{ old('surname', auth()->user()->last_name) }}" required class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('surname')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 px-4 py-5">
                    <label for="email" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}" required class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 px-4 py-5">
                    <label for="phone" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Phone <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="tel" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone) }}" required class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('phone')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 px-4 py-5">
                    <label for="address" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Address <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <textarea name="address" id="address" rows="2" required class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('address', auth()->user()->address) }}</textarea>
                        @error('address')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Session Information -->
                <div class="px-4 py-5 sm:px-6 border-t border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Session Information</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Details about your counseling session.</p>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 px-4 py-5">
                    <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Session Title <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="max-w-lg rounded-md shadow-sm">
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        @error('title')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 px-4 py-5">
                    <label for="date" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Date <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <input type="date" name="date" id="date" value="{{ old('date') }}" min="{{ now()->format('Y-m-d') }}" class="block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md">
                                @error('date')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <input type="time" name="time" id="time" value="{{ old('time') }}" class="block w-full shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-300 rounded-md">
                                @error('time')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 px-4 py-5">
                    <label for="duration" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Duration (minutes) <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <select id="duration" name="duration" class="max-w-lg block focus:ring-blue-500 focus:border-blue-500 w-full shadow-sm sm:max-w-xs sm:text-sm border-gray-300 rounded-md">
                            <option value="30" {{ old('duration') == '30' ? 'selected' : '' }}>30 minutes</option>
                            <option value="45" {{ old('duration') == '45' ? 'selected' : '' }}>45 minutes</option>
                            <option value="60" {{ old('duration') == '60' ? 'selected' : 'selected' }}>60 minutes</option>
                            <option value="90" {{ old('duration') == '90' ? 'selected' : '' }}>90 minutes</option>
                            <option value="120" {{ old('duration') == '120' ? 'selected' : '' }}>120 minutes</option>
                        </select>
                        @error('duration')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 px-4 py-5">
                    <label class="block text-sm font-medium text-gray-700">
                        Session Type
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <div class="flex items-center">
                            <!-- Hidden input to ensure a value is always sent -->
                            <input type="hidden" name="is_online" value="0">
                            <input id="is_online" name="is_online" type="checkbox" value="1" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" {{ old('is_online') ? 'checked' : '' }}>
                            <label for="is_online" class="ml-2 block text-sm text-gray-700">
                                This is an online session (e.g., video call)
                            </label>
                        </div>
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 px-4 py-5">
                    <label for="description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Additional Notes
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <textarea id="description" name="description" rows="3" class="max-w-lg shadow-sm block w-full focus:ring-blue-500 focus:border-blue-500 sm:text-sm border border-gray-300 rounded-md">{{ old('description') }}</textarea>
                        <p class="mt-2 text-sm text-gray-500">Brief description of what you'd like to discuss during the session.</p>
                    </div>
                </div>

                <div class="pt-5 border-t border-gray-200 px-4 py-5">
                    <div class="flex justify-end">
                        <a href="{{ route('upcomingsessions.index') }}" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Cancel
                        </a>
                        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Schedule Session
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Set default time to next hour
    document.addEventListener('DOMContentLoaded', function() {
        const now = new Date();
        const nextHour = new Date(now.getTime() + 60 * 60 * 1000);
        
        if (!document.getElementById('time').value) {
            document.getElementById('time').value = nextHour.toTimeString().substring(0, 5);
        }
        
        if (!document.getElementById('date').value) {
            document.getElementById('date').value = now.toISOString().substring(0, 10);
        }
    });
</script>
@endpush
@endsection
