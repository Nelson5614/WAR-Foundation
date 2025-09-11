@extends('layouts.student')



@section('header', 'My Library')

@section('content')
<div class="space-y-6">

    <!-- Files List -->
    <div class="bg-white shadow overflow-hidden sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-gray-900">My Library Files</h3>
        </div>
        
        @if($files->count() > 0)
            <div class="border-t border-gray-200">
                <ul class="divide-y divide-gray-200">
                    @foreach($files as $file)
                        <li class="hover:bg-gray-50">
                            <div class="px-4 py-4 sm:px-6">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        @php
                                            $fileIcon = 'file';
                                            $fileColor = 'gray';
                                            
                                            if (str_contains($file->file_type, 'pdf')) {
                                                $fileIcon = 'file-pdf';
                                                $fileColor = 'red';
                                            } elseif (str_contains($file->file_type, 'word') || str_contains($file->file_type, 'document')) {
                                                $fileIcon = 'file-word';
                                                $fileColor = 'blue';
                                            } elseif (str_contains($file->file_type, 'excel') || str_contains($file->file_type, 'spreadsheet')) {
                                                $fileIcon = 'file-excel';
                                                $fileColor = 'green';
                                            } elseif (str_contains($file->file_type, 'image')) {
                                                $fileIcon = 'file-image';
                                                $fileColor = 'yellow';
                                            }
                                        @endphp
                                        
                                        <div class="flex-shrink-0">
                                            <div class="p-2 bg-{{ $fileColor }}-100 rounded-md">
                                                <i class="text-{{ $fileColor }}-600 fas fa-{{ $fileIcon }} text-lg"></i>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm font-medium text-gray-900 truncate">
                                                {{ $file->file_name }}
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                {{ strtoupper(pathinfo($file->file_path, PATHINFO_EXTENSION)) }} • 
                                                {{ $file->file_size ? round($file->file_size / 1024, 1) . ' KB' : 'N/A' }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="ml-2 flex-shrink-0 flex space-x-2">
                                        <a href="{{ Storage::url($file->file_path) }}" target="_blank" 
                                           class="w-8 h-8 inline-flex items-center justify-center bg-white text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            <i class="fas fa-eye"></i>
                                            <span class="sr-only">View</span>
                                        </a>
                                        <a href="{{ route('files.download', $file->id) }}" 
                                           class="w-8 h-8 inline-flex items-center justify-center bg-white text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            <i class="fas fa-download"></i>
                                            <span class="sr-only">Download</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-2 sm:flex sm:justify-between">
                                    <div class="sm:flex">
                                        <p class="flex items-center text-sm text-gray-500">
                                            <i class="far fa-calendar-alt mr-1.5 h-5 w-5 text-gray-400"></i>
                                            Uploaded {{ $file->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        @else
            <div class="text-center py-12">
                <i class="far fa-folder-open text-4xl text-gray-400 mb-4"></i>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No files found</h3>
                <p class="mt-1 text-sm text-gray-500">There are no files available in your library.</p>
            </div>
        @endif
    </div>
</div>



@endsection
