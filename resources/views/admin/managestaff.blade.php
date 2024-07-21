
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
            <h1 class="text-3xl text-black pb-6">Manage Staff Members</h1>


            <div class="w-full mt-12">
                <div class="flex">
                    <div>

                        <p class="text-xl pb-3 flex items-center">
                            <i class="fas fa-list mr-3"></i> Staff
                        </p>
                    </div>
                    <div class="justify-end">

                        <div class="mx-4">
                            <a href="{{ route('staff.create') }}" class=" px-2 py-1 rounded-md bg-blue-700 text-white">
                                Add Staff Memeber
                                <i class="fas fa-plus mx-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="bg-white overflow-auto">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name</th>
                                <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Last name</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Phone</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Department</th>
                                <th class="text-left py-3 px-4 uppercase font-semibold text-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($staff as $member)
                            <tr class="{{ $loop->index % 2 == 1? 'bg-gray-300': '' }}">

                                <td class="w-1/3 text-left py-3 px-4">{{ $member->name }}</td>
                                <td class="w-1/3 text-left py-3 px-4">{{ $member->last_name }}</td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="tel:622322662">{{ $member->phone }}</a></td>
                                <td class="text-left py-3 px-4"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">{{ $member->email }}</a></td>
                                <td class="w-1/3 text-left py-3 px-4">{{ $member->department }}</td>
                                <td>
                                    <div class="flex">
                                        <div class="px-4">

                                            <a href="{{ route('staff.edit', $member->id) }}" class="bg-green-700 py-2 px-2 text-white rounded-md">Edit</a>
                                        </div>
                                        <div>
                                            <form action="{{ route('staff.destroy', $member->id) }}" method="POST">
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

                    {{ $staff->links() }}
                </div>
            </div>
        </main>

        <footer class="w-full bg-white text-right p-4">
            Built by <a class="underline">Nelson Mathebeng</a>.
        </footer>
    </div>
@endsection

