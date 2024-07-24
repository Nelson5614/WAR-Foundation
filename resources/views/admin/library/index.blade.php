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
<div class="min-h-screen container mx-auto py-8 px-20 w-full">

    <div class=" min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600" alt="Your Company">
          <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Add A File To Your Library</h2>
        </div>

        <div class="mt-10 sm:mx-auto w-full ">
            <form class="space-y-6" action="{{ route('library.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class=" ">

                    <div>
                        <label for="title" class="block  text-sm font-medium leading-6 text-gray-900">File Name</label>
                        <div class="mt-2">
                            <input id="title" name="file_name" type="text" autocomplete="title" required class="pl-4 block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="file">Upload File</label>
                        <input type="file" name="file_path" class="form-control" required>
                    </div>
                </div>
                <div class="mt-4 w-1/5">
                <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                </div>
            </form>

          <p class="mt-10 text-center text-sm text-gray-500">

            <a href="{{ route('library.index') }}" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Go Back</a>
          </p>
        </div>
    </div>

</div>
@endsection
