@extends('layouts.student')
@section('content')

<div class="container">
    <h1>My Library Files</h1>
    <ul class="list-group">
        @foreach($files as $file)
            <li class="list-group-item">
                {{ $file->file_name }}
                <a href="{{ route('files.download', $file->id) }}" class="btn btn-primary btn-sm float-right">Download</a>
                <a href="{{ Storage::url($file->file_path) }}" target="_blank" class="btn btn-secondary btn-sm float-right mr-2">View</a>
            </li>
        @endforeach
    </ul>
</div>

@endsection
