
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
                <h1 class="pb-6 text-3xl text-black">Manage FAQs</h1>


                <div class="w-full mt-12">
                    <div class="flex">
                        <div>

                            <p class="flex items-center pb-3 text-xl">
                                <i class="mr-3 fas fa-list"></i> FAQ
                            </p>
                        </div>
                        <div class="justify-end">

                            <div class="mx-4">
                                <a href="{{ route('faqs.create') }}" class="px-2 py-1 text-white bg-blue-700 rounded-md ">
                                    Add New FAQ
                                    <i class="mx-2 fas fa-plus"></i>
                                </a>
                            </div>

                        </div>


                    </div>
                    <div class="overflow-auto bg-white">
                        <table class="min-w-full bg-white">
                            <thead class="text-white bg-gray-800">
                                <tr>
                                    <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Question</th>
                                    <th class="w-1/2 px-4 py-3 text-sm font-semibold text-left uppercase">Answer</th>
                                    <th class="px-2 py-3 text-sm font-semibold text-left uppercase">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach ($faqs as $faq)
                                <tr class="{{ $loop->index % 2 == 1? 'bg-gray-300': '' }}">

                                    <td class="w-1/3 px-4 py-3 text-left">{{ $faq->question }}</td>
                                    <td class="w-1/3 px-4 py-3 text-left">{{ $faq->answer }}</td>

                                    <td>
                                        <div class="flex">

                                            <div class="px-1">
                                                <div class="mt-2 ">

                                                    <a href="{{ route('faqs.edit', $faq->id) }}" class="px-2 py-2 text-white bg-green-700 rounded-md"><i class="bi bi-pencil-square"></i></a>

                                                </div>

                                            </div>

                                            <div class="px-1">
                                                <form action="{{ route('faqs.destroy', $faq->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="px-2 py-2 text-white bg-red-600 rounded-md" wire:confirm="Are you sure you want to delete this project?"><i class="bi bi-trash-fill"></i></button>
                                                </form>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>


                    </div>


                    {{ $faqs->links() }}
                </div>
            </main>

            <footer class="w-full p-4 text-right bg-white">
                Built by <a class="underline">Nelson Mathebeng</a>.
            </footer>
        </div>
@endsection

