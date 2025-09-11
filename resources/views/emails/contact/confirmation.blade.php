@extends('layouts.email')

@section('content')
    <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-md">
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Thank You for Contacting Us, {{ $name }}!</h1>
            <p class="text-gray-600 mt-2">We've received your message and will get back to you soon.</p>
        </div>

        <div class="bg-gray-50 p-6 rounded-lg mb-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Your Message Details</h2>
            <div class="space-y-2">
                <p><span class="font-medium">Subject:</span> {{ $subject }}</p>
                <p><span class="font-medium">Message:</span></p>
                <p class="text-gray-700 bg-white p-4 rounded border border-gray-200">{{ $message }}</p>
            </div>
        </div>

        <div class="text-center text-sm text-gray-500">
            <p>This is an automated message. Please do not reply to this email.</p>
            <p class="mt-2">© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </div>
@endsection
