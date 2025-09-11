@extends('layouts.email')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">New Contact Form Submission</h1>
            <p class="text-gray-600 mt-2">You have received a new message from the contact form.</p>
        </div>

        <div class="bg-gray-50 p-6 rounded-lg mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Contact Details</h2>
            <div class="space-y-2">
                <p><span class="font-medium">Name:</span> {{ $contact->name }}</p>
                <p><span class="font-medium">Email:</span> <a href="mailto:{{ $contact->email }}" class="text-blue-600 hover:underline">{{ $contact->email }}</a></p>
                @if($contact->phone)
                    <p><span class="font-medium">Phone:</span> {{ $contact->phone }}</p>
                @endif
                <p><span class="font-medium">Subject:</span> {{ $contact->subject }}</p>
                <p class="mt-4"><span class="font-medium">Message:</span></p>
                <p class="text-gray-700 bg-white p-4 rounded border border-gray-200">{{ $contact->message }}</p>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('admin.contacts.show', $contact->id) }}" class="inline-block bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition-colors">
                View in Dashboard
            </a>
        </div>

        <div class="mt-8 text-center text-sm text-gray-500">
            <p>This is an automated notification. This message was sent because you are listed as an admin in the system.</p>
            <p class="mt-2">© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
@endsection
