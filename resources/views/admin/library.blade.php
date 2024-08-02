
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

        <div class="flex flex-col w-full overflow-x-hidden border-t">
            <main class="flex-grow w-full p-6">
                <h1 class="pb-6 text-3xl text-black">Your Library</h1>


                <div class="w-full mt-12">
                    <div class="flex">
                        <div>

                            <p class="flex items-center pb-3 text-xl">
                                <i class="fas fa-list"></i> Library
                            </p>
                        </div>
                        <div class="">

                            <div class="flex mx-1">
                                <a href="{{ route('library.create') }}" class="px-2 py-1 text-white bg-blue-700 rounded-md " style="text-decoration: none;">
                                     Upload Material
                                     <i class="mx-2 bi bi-upload"></i>
                                    </a>

                            </div>
                        </div>

                    </div>
                    <table class="min-w-full bg-white">
                        <thead class="text-white bg-gray-800">
                            <tr>
                                <th class="w-1/2 px-4 py-3 text-sm font-semibold text-left uppercase">File-name</th>

                                <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($library as $material)
                            <tr class="{{ $loop->index % 2 == 1? 'bg-gray-300': '' }}">

                                <td class="w-1/2 px-4 py-3 text-left">{{ $material->file_name }}</td>

                                <td>
                                    <div class="flex">
                                        <div class="px-1">
                                        </div>
                                        <div class="px-1">
                                            <div class="mt-2 ">

                                                <a href="{{ route('library.edit', $material->id) }}" class="px-2 py-2 text-white bg-green-700 rounded-md">Edit</a>
                                            </div>

                                        </div>
                                        <div class="px-1">
                                            <form action="{{ route('library.destroy', $material->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="px-2 py-2 text-white bg-red-600 rounded-md" >Delete</button>
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

            <footer class="w-full p-4 text-right bg-white">
                Built by <a class="underline">Nelson Mathebeng</a>.
            </footer>
        </div>
@endsection

