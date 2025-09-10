@extends('layouts.admin')

@section('title', 'Blog Posts')
@section('header', 'Blog Posts')

@section('content')
<div class="flex flex-col w-full overflow-x-hidden border-t">
    <main class="flex-grow w-full p-6">
        @if (session('success'))
            <div class="p-4 mb-6 text-green-700 bg-green-100 border border-green-400 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Blog Posts</h1>
            <a href="{{ route('admin.blogs.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-700">
                <i class="fas fa-plus mr-2"></i> New Post
            </a>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            @if($blogs->count())
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Published</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($blogs as $blog)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $blog->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                @if($blog->images && count($blog->images))
                                    <img src="{{ Storage::url($blog->images[0]) }}" class="w-10 h-10 rounded mr-3 object-cover" />
                                @endif
                                <span class="text-sm font-medium text-gray-900">{{ $blog->title }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $blog->created_at->diffForHumans() }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                            <a href="{{ route('admin.blogs.show', $blog) }}" class="text-indigo-600 hover:text-indigo-900">View</a>
                            <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-6 py-4">{{ $blogs->links() }}</div>
            @else
            <div class="p-8 text-center text-gray-500">No blog posts yet.</div>
            @endif
        </div>
    </main>
</div>
@endsection
