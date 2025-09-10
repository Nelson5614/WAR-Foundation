@extends('layouts.admin')

@section('content')
<div class="flex flex-col w-full overflow-x-hidden border-t">
    <main class="flex-grow w-full p-6">
        @if (session('success'))
            <div class="p-4 mb-6 text-green-700 bg-green-100 border border-green-400 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 mb-6 text-red-700 bg-red-100 border border-red-400 rounded">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="p-4 mb-6 text-red-700 bg-red-100 border border-red-400 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Page Header and Back Button -->
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Add New Testimonial</h1>
            <a href="{{ route('admin.testimonials.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Back to Testimonials
            </a>
        </div>

        <!-- Testimonial Form -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <form class="space-y-6" action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Person's Name <span class="text-red-500">*</span></label>
                                <div class="mt-1">
                                    <input id="name" name="name" type="text" required value="{{ old('name') }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>
                            
                            <div>
                                <label for="occupation" class="block text-sm font-medium text-gray-700">Occupation <span class="text-red-500">*</span></label>
                                <div class="mt-1">
                                    <input id="occupation" name="occupation" type="text" required value="{{ old('occupation') }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>
                            
                            <div>
                                <label for="content" class="block text-sm font-medium text-gray-700">Testimonial Content <span class="text-red-500">*</span></label>
                                <div class="mt-1">
                                    <textarea id="content" name="content" rows="4" required class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ old('content') }}</textarea>
                                </div>
                            </div>
                            
                            <div>
                                <label for="photo" class="block text-sm font-medium text-gray-700">Photo <span class="text-red-500">*</span></label>
                                <div class="mt-1">
                                    <input type="file" name="photo" id="photo" required class="block w-full text-sm text-gray-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-md file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-indigo-50 file:text-indigo-700
                                    hover:file:bg-indigo-100">
                                    <p class="mt-1 text-xs text-gray-500">PNG, JPG, JPEG up to 2MB</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="pt-5">
                            <div class="flex justify-end">
                                <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Cancel
                                </a>
                                <button type="submit" class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Save Testimonial
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
</div>
@endsection
