@extends('layouts.admin')

@section('title', $blog->title)
@section('header', $blog->title)

@section('content')
<div class="flex flex-col w-full overflow-x-hidden border-t">
    <main class="flex-grow w-full p-6 space-y-6">
        <div class="bg-white p-6 rounded shadow space-y-6">
            <h2 class="text-2xl font-bold">{{ $blog->title }}</h2>
            <div class="prose max-w-none text-gray-800">
                {!! nl2br(e($blog->content)) !!}
            </div>
            @if($blog->images)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($blog->images as $img)
                        <img src="{{ Storage::url($img) }}" class="w-full h-56 object-cover rounded" />
                    @endforeach
                </div>
            @endif
            <p class="text-sm text-gray-500">Published {{ $blog->created_at->diffForHumans() }}</p>
        </div>
    </main>
</div>
@endsection
