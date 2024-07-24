
@extends('layouts.admin')

@section('content')

        @if (session('success'))

        <div class="alert alert-success">
        {{ session('success') }}
        </div>

        @endif

        @if (session('error'))

        <div class="alert alert-danger">
        {{ session('error') }}
        </div>

        @endif

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-3xl text-black pb-6">Your Library</h1>


                <div class="w-full mt-12">
                    <div class="flex">
                        <div>

                            <p class="text-xl pb-3 flex items-center">
                                <i class="fas fa-list"></i> Library
                            </p>
                        </div>
                        <div class="">

                            <div class="mx-1 flex">
                                <a href="{{ route('library.create') }}" class=" px-2 py-1 rounded-md bg-blue-700 text-white" style="text-decoration: none;">
                                     Upload Material
                                     <i class="bi bi-upload mx-2"></i>
                                    </a>

                            </div>
                        </div>

                    </div>
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">File-name</th>

                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($library as $material)
                            <tr class="{{ $loop->index % 2 == 1? 'bg-gray-300': '' }}">

                                <td class="w-1/3 text-left py-3 px-4">{{ $material->file_name }}</td>

                                <td>
                                    <div class="flex">
                                        <div class="px-1">
                                        </div>
                                        <div class="px-1">
                                            <div class=" mt-2">

                                                <a href="{{ route('library.edit', $material->id) }}" class="bg-green-700 py-2 px-2 text-white rounded-md">Edit</a>
                                            </div>

                                        </div>
                                        <div class="px-1">
                                            <form action="{{ route('library.destroy', $material->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-red-600 py-2 px-2 text-white rounded-md" >Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {{ $library->links() }}
                </div>
            </main>

            <footer class="w-full bg-white text-right p-4">
                Built by <a class="underline">Nelson Mathebeng</a>.
            </footer>
        </div>
@endsection

