<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $subject ?? 'Email from ' . config('app.name') }}</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            line-height: 1.5;
            color: #374151;
            background-color: #f3f4f6;
            margin: 0;
            padding: 20px 0;
        }
        
        .max-w-2xl {
            max-width: 42rem;
        }
        
        .bg-white {
            background-color: #ffffff;
        }
        
        .bg-gray-50 {
            background-color: #f9fafb;
        }
        
        .text-gray-600 {
            color: #4b5563;
        }
        
        .text-gray-700 {
            color: #374151;
        }
        
        .text-gray-500 {
            color: #6b7280;
        }
        
        .text-blue-600 {
            color: #2563eb;
        }
        
        .hover\:text-blue-700:hover {
            color: #1d4ed8;
        }
        
        .hover\:bg-blue-700:hover {
            background-color: #1d4ed8;
        }
        
        .bg-blue-600 {
            background-color: #2563eb;
        }
        
        .border-gray-200 {
            border-color: #e5e7eb;
        }
        
        .rounded-lg {
            border-radius: 0.5rem;
        }
        
        .shadow-md {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        
        .p-6 {
            padding: 1.5rem;
        }
        
        .mb-6 {
            margin-bottom: 1.5rem;
        }
        
        .mt-2 {
            margin-top: 0.5rem;
        }
        
        .mt-4 {
            margin-top: 1rem;
        }
        
        .mt-8 {
            margin-top: 2rem;
        }
        
        .text-2xl {
            font-size: 1.5rem;
            line-height: 2rem;
        }
        
        .text-lg {
            font-size: 1.125rem;
            line-height: 1.75rem;
        }
        
        .text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }
        
        .font-bold {
            font-weight: 700;
        }
        
        .font-semibold {
            font-weight: 600;
        }
        
        .font-medium {
            font-weight: 500;
        }
        
        .space-y-2 > * + * {
            margin-top: 0.5rem;
        }
        
        .hover\:underline:hover {
            text-decoration: underline;
        }
        
        .transition-colors {
            transition-property: background-color, border-color, color, fill, stroke;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }
        
        .inline-block {
            display: inline-block;
        }
        
        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }
        
        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
        
        .rounded-md {
            border-radius: 0.375rem;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
