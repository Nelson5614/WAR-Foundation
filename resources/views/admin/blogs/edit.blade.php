@extends('layouts.admin')

@section('title', 'Edit Blog Post')
@section('header', 'Edit Blog Post')

@section('content')
<div class="flex flex-col w-full overflow-x-hidden border-t">
    <main class="flex-grow w-full p-6 space-y-6">
        <form action="{{ route('admin.blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title', $blog->title) }}" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" />
            </div>
            <div>
                <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                <textarea name="content" id="content" rows="6" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">{{ old('content', $blog->content) }}</textarea>
            </div>
            <div>
                <label for="images" class="block text-sm font-medium text-gray-700">Add Images</label>
                <input type="file" name="images[]" id="images" multiple accept="image/*" class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                <p class="mt-1 text-xs text-gray-500">You can upload additional images. Existing images are shown below.</p>
                @if($blog->images)
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 mt-4">
                        @foreach($blog->images as $img)
                            <div class="relative group">
                                <img src="{{ Storage::url($img) }}" class="object-cover w-full h-32 rounded" />
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="flex justify-end">
                <button type="submit" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-700">
                    Update Post
                </button>
            </div>
        </form>
    </main>
</div>
@endsection
