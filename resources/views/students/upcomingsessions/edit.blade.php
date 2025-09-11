@extends('layouts.student')

@section('title', 'Edit Session')

@section('header', 'Edit Session')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Edit Session Details</h3>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Update the details of your counseling session.</p>
        </div>
        
        <div class="border-t border-gray-200 px-4 py-5 sm:p-0">
            <form action="{{ route('upcomingsessions.update', $session->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
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
                        <input type="text" name="name" id="name" value="{{ old('name', $session->name) }}" required 
                               class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
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
                        <input type="text" name="surname" id="surname" value="{{ old('surname', $session->surname) }}" required 
                               class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
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
                        <input type="email" name="email" id="email" value="{{ old('email', $session->email) }}" required 
                               class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
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
                        <input type="tel" name="phone" id="phone" value="{{ old('phone', $session->phone) }}" required 
                               class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
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
                        <textarea name="address" id="address" rows="3" required 
                                 class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('address', $session->address) }}</textarea>
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
                        <input type="text" name="title" id="title" value="{{ old('title', $session->title) }}" required 
                               class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
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
                        <input type="date" name="date" id="date" value="{{ old('date', $session->date->format('Y-m-d')) }}" required 
                               min="{{ now()->format('Y-m-d') }}" 
                               class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('date')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 px-4 py-5">
                    <label for="time" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Start Time <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <input type="time" name="time" id="time" value="{{ old('time', \Carbon\Carbon::parse($session->start_time)->format('H:i')) }}" required 
                               class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        @error('time')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 px-4 py-5">
                    <label for="duration" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Duration (minutes) <span class="text-red-500">*</span>
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <select name="duration" id="duration" required 
                                class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            <option value="30" {{ old('duration', $session->duration) == 30 ? 'selected' : '' }}>30 minutes</option>
                            <option value="60" {{ old('duration', $session->duration) == 60 ? 'selected' : '' }}>1 hour</option>
                            <option value="90" {{ old('duration', $session->duration) == 90 ? 'selected' : '' }}>1.5 hours</option>
                            <option value="120" {{ old('duration', $session->duration) == 120 ? 'selected' : '' }}>2 hours</option>
                        </select>
                        @error('duration')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 px-4 py-5">
                    <div class="text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Session Type <span class="text-red-500">*</span>
                    </div>
                    <div class="mt-1 sm:mt-0 sm:col-span-2 space-y-2">
                        <div class="flex items-center">
                            <input id="is_online_yes" name="is_online" type="radio" value="1" 
                                   {{ old('is_online', $session->is_online) ? 'checked' : '' }} 
                                   class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                            <label for="is_online_yes" class="ml-3 block text-sm font-medium text-gray-700">
                                Online
                            </label>
                        </div>
                        <div class="flex items-center">
                            <input id="is_online_no" name="is_online" type="radio" value="0" 
                                   {{ !old('is_online', $session->is_online) ? 'checked' : '' }} 
                                   class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300">
                            <label for="is_online_no" class="ml-3 block text-sm font-medium text-gray-700">
                                In-Person
                            </label>
                        </div>
                        @error('is_online')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5 px-4 py-5">
                    <label for="description" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                        Additional Notes
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                        <textarea name="description" id="description" rows="4" 
                                 class="block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">{{ old('description', $session->description) }}</textarea>
                        @error('description')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <a href="{{ route('upcomingsessions.index') }}" 
                       class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update Session
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
