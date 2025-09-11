<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Our Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">Our Blog</h1>
                <p class="mt-4 text-xl text-gray-600">Helpful articles and resources for your journey to healing</p>
            </div>

            @if($posts->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($posts as $post)
                    <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                        <div class="h-48 overflow-hidden">
                            @if(!empty($post->images) && is_array($post->images) && count($post->images) > 0)
                                <img src="{{ asset('storage/' . $post->images[0]) }}" alt="{{ $post->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-400">No Image</span>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm text-gray-500">{{ $post->created_at->format('M d, Y') }}</span>
                                <span class="text-sm text-gray-500">{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min read</span>
                            </div>
                            <h2 class="text-xl font-semibold text-gray-900 mb-2">{{ $post->title }}</h2>
                            <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($post->content), 150) }}</p>
                            <a href="{{ route('blog.show', $post->id) }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Read More →</a>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500 text-lg">No blog posts available yet. Check back soon!</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
