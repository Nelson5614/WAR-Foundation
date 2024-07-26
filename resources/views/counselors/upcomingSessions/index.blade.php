
@extends('layouts.counselor')

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
            <h1 class="text-3xl text-black pb-6">Manage Your Sessions</h1>

            <div class="w-full mt-12">
                <div class="flex">
                    <div>

                        <p class="text-xl pb-3 flex items-center">
                            <i class="fas fa-list mr-3"></i> Sessions Created By You
                        </p>
                    </div>

                </div>
                <div class="bg-white overflow-auto">
                    @if ($newsessions->total() > 0)

                    <table class="min-w-full bg-white" id="sessions-table">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Session Id</th>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Address</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Proposed Date</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($newsessions as $newsession)
                            <tr class="sortable-item {{ $loop->index % 2 == 1? 'bg-gray-300': '' }}" data-id="{{ $newsession->id }}">
                                <td class="py-2 px-4 border-b">
                                    <i class="bi bi-grip-vertical cursor-pointer mr-2"></i>
                                    {{ $newsession->id }}
                                </td>
                                <td class="w-1/3 text-left py-3 px-4">{{ $newsession->name }}</td>
                                <td class="w-1/3 text-left py-3 px-4">{{ $newsession->surname }}</td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">{{ $newsession->phone }}</a></td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">{{ $newsession->email }}</a></td>
                                <td class="w-1/3 text-left py-3 px-4">{{ $newsession->address }}</td>
                                <td class="w-1/3 text-left py-3 px-4">{{ $newsession->date }}</td>
                                <td>
                                    <div class="flex">
                                        <div class="px-2 mt-2">

                                            <a href="{{ route('set-new-session.edit', $newsession->id) }}" class="bg-green-700 py-2 px-2 text-white rounded-md">Edit</a>
                                        </div>

                                        <div>
                                            <form action="{{ route('set-new-session.destroy', $newsession->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-red-600 py-2 px-2 text-white rounded-md">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    @else
                    <h3>You haven't created any sessions yet</h3>
                    @endif

                </div>
            </div>

            <div class="w-full mt-12">
                <div class="flex">
                    <div>

                        <p class="text-xl pb-3 flex items-center">
                            <i class="fas fa-list mr-3"></i> Sessions Created By Student
                        </p>
                    </div>

                </div>
                <div class="bg-white overflow-auto">
                    <table class="min-w-full bg-white" id="sessions-table">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Session Id</th>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Address</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Proposed Date</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($sessions as $session)
                            <tr class="sortable-item {{ $loop->index % 2 == 1? 'bg-gray-300': '' }}" data-id="{{ $session->id }}">
                                <td class="py-2 px-4 border-b">
                                    <i class="bi bi-grip-vertical cursor-pointer mr-2"></i> <!-- Drag handle icon -->
                                    {{ $session->id }}
                                </td>
                                <td class="w-1/3 text-left py-3 px-4">{{ $session->name }}</td>
                                <td class="w-1/3 text-left py-3 px-4">{{ $session->surname }}</td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">{{ $session->phone }}</a></td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">{{ $session->email }}</a></td>
                                <td class="w-1/3 text-left py-3 px-4">{{ $session->address }}</td>
                                <td class="w-1/3 text-left py-3 px-4">{{ $session->date }}</td>
                                <td>
                                    <div class="flex">
                                        <div class="px-2 mt-2">

                                            <a href="{{ route('counselor.session-requests.show', $session->id) }}" class="bg-blue-700 py-2 px-2 text-white rounded-md">View</a>
                                        </div>

                                        <div>
                                            <form action="{{ route('upcoming-sessions.destroy', $session->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="bg-red-600 py-2 px-2 text-white rounded-md">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {{ $sessions->links() }}
                </div>
            </div>
        </main>

        <footer class="w-full bg-white text-right p-4">
            Built by <a class="underline">Nelson Mathebeng</a>.
        </footer>


    </div>
@endsection

