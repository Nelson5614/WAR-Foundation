@extends('layouts.counselor')

@section('content')
<div class="min-h-screen flex justify-center container mx-auto py-8 px-20 w-full">
    <div class=" min-h-full items-center px-6 py-12 lg:px-8">
        <h3>Session Request Details</h3>

        <div class="grid grid-cols-2 gap-4">
            <p><strong>Name:</strong> {{ $sessionRequest->name }}</p>
            <p><strong>SurName:</strong> {{ $sessionRequest->surname }}</p>

        </div>
        <div class="grid grid-cols-2 gap-4">
            <p><strong>Email:</strong> {{ $sessionRequest->email }}</p>
            <p><strong>Phone:</strong> {{ $sessionRequest->phone }}</p>

        </div>
        <div class="grid grid-cols-2 gap-4">
            <p><strong>Proposed Date:</strong> {{ $sessionRequest->date }}</p>
            <p><strong>Requested At:</strong> {{ $sessionRequest->created_at }}</p>

        </div>
        <p><strong>Details:</strong> {{ $sessionRequest->description }}</p>

    </div>
</div>
@endsection
