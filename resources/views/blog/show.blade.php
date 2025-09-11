<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
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
                    <div class="mb-8">
                        @if(count($post->images) === 1)
                            <div class="rounded-xl overflow-hidden">
                                <img src="{{ asset('storage/' . $post->images[0]) }}" alt="{{ $post->title }}" class="w-full h-auto rounded-lg shadow-md">
                            </div>
                        @else
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($post->images as $image)
                                    <div class="rounded-xl overflow-hidden h-64">
                                        <img src="{{ asset('storage/' . $image) }}" 
                                             alt="{{ $post->title }}" 
                                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300 rounded-lg shadow-md">
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif

                <div class="prose lg:prose-xl max-w-none">
                    {!! $post->content !!}
                </div>
            </article>

            @if($recentPosts->count() > 0)
                <div class="mt-16">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6">Recent Articles</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($recentPosts as $recentPost)
                            <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                                @if(!empty($recentPost->images) && is_array($recentPost->images) && count($recentPost->images) > 0)
                                    <div class="h-48 overflow-hidden">
                                        <img src="{{ asset('storage/' . $recentPost->images[0]) }}" alt="{{ $recentPost->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                                    </div>
                                @endif
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold text-gray-900 mb-2">{{ $recentPost->title }}</h3>
                                    <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($recentPost->content), 100) }}</p>
                                    <a href="{{ route('blog.show', $recentPost->id) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Read More →</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="mt-12 text-center">
                <a href="{{ route('blog.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                    <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to All Articles
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
