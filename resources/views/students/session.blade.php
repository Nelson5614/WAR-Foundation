@extends('layouts.student')
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
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Request a Session</h2>
            </div>

            <div class="container">

                <form action="{{ route('session-request.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="details" class="form-label">Give some details about yourself</label>
                        <textarea class="form-control" id="details" name="details" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Request</button>
                </form>


            </div>



            </p>
            </div>
        </div>

    </div>


@endsection
