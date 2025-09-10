@extends('layouts.app')

@section('content')
<div class="bg-white py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <article class="prose lg:prose-xl mx-auto">
            <header class="mb-12">
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">
                    {{ $post->title }}
                </h1>
                <div class="mt-4 flex items-center text-sm text-gray-500">
                    <time datetime="{{ $post->created_at->toDateString() }}">
                        {{ $post->created_at->format('F j, Y') }}
                    </time>
                    <span class="mx-2">•</span>
                    <span>{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min read</span>
                </div>
            </header>

            @if(!empty($post->images) && is_array($post->images) && count($post->images) > 0)
                <div class="mb-8 rounded-lg overflow-hidden">
                    <img src="{{ asset('storage/' . $post->images[0]) }}" alt="{{ $post->title }}" class="w-full h-auto">
                </div>
            @endif

            <div class="prose-lg text-gray-700">
                {!! $post->content !!}
            </div>
        </article>

        @if($recentPosts->count() > 0)
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Recent Articles</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach($recentPosts as $recentPost)
                        <div class="border border-gray-200 rounded-lg overflow-hidden hover:shadow-md transition-shadow duration-300">
                            @if(!empty($recentPost->images) && is_array($recentPost->images) && count($recentPost->images) > 0)
                                <a href="{{ route('blog.show', $recentPost->id) }}" class="block h-40 overflow-hidden">
                                    <img src="{{ asset('storage/' . $recentPost->images[0]) }}" alt="{{ $recentPost->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                </a>
                            @endif
                            <div class="p-4">
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                    <a href="{{ route('blog.show', $recentPost->id) }}" class="hover:text-blue-600 transition-colors">
                                        {{ $recentPost->title }}
                                    </a>
                                </h3>
                                <div class="flex items-center text-sm text-gray-500">
                                    <time datetime="{{ $recentPost->created_at->toDateString() }}">
                                        {{ $recentPost->created_at->format('M j, Y') }}
                                    </time>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="mt-12 text-center">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back to Blog
            </a>
        </div>
    </div>
</div>
@endsection
