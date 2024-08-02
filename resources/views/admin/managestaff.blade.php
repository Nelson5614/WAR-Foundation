
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
            <h1 class="pb-6 text-3xl text-black">Manage Staff Members</h1>


            <div class="w-full mt-12">
                <div class="flex">
                    <div>

                        <p class="flex items-center pb-3 text-xl">
                            <i class="mr-3 fas fa-list"></i> Staff
                        </p>
                    </div>
                    <div class="justify-end">

                        <div class="mx-4">
                            <a href="{{ route('staff.create') }}" class="px-2 py-1 text-white bg-blue-700 rounded-md ">
                                Add Staff Memeber
                                <i class="mx-2 fas fa-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="overflow-auto bg-white">
                    <table class="min-w-full bg-white">
                        <thead class="text-white bg-gray-800">
                            <tr>
                                <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Name</th>
                                <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Last name</th>
                                <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Phone</th>
                                <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Email</th>
                                <th class="px-4 py-3 text-sm font-semibold text-left uppercase">photo</th>
                                <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Department</th>
                                <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($staff as $member)
                            <tr class="{{ $loop->index % 2 == 1? 'bg-gray-300': '' }}">

                                <td class="w-1/3 px-4 py-3 text-left">{{ $member->name }}</td>
                                <td class="w-1/3 px-4 py-3 text-left">{{ $member->last_name }}</td>
                                <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">{{ $member->phone }}</a></td>
                                <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">{{ $member->email }}</a></td>
                                <td class="px-4 py-3 text-left "><img src="{{ asset('storage/' . $member->photo) }}" alt="Photo" width="100"></td>
                                <td class="w-1/3 px-4 py-3 text-left">{{ $member->department }}</td>
                                <td>
                                    <div class="flex">
                                        <div class="px-4 mt-2">

                                            <a href="{{ route('staff.edit', $member->id) }}" class="px-2 py-2 mt-2 text-white bg-green-700 rounded-md">Edit</a>
                                        </div>
                                        <div>
                                            <form action="{{ route('staff.destroy', $member->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="px-2 py-2 text-white bg-red-600 rounded-md">Delete</button>
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

        <footer class="w-full p-4 text-right bg-white">
            Built by <a class="underline">Nelson Mathebeng</a>.
        </footer>
    </div>
@endsection

