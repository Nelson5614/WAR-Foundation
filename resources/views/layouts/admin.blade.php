<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WAR Foundation - Admin</title>
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        
        <!-- Icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">
        
        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            primary: {
                                50: '#f0f9ff',
                                100: '#e0f2fe',
                                200: '#bae6fd',
                                300: '#7dd3fc',
                                400: '#38bdf8',
                                500: '#0ea5e9',
                                600: '#0284c7',
                                700: '#0369a1',
                                800: '#075985',
                                900: '#0c4a6e',
                            },
                        },
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                        },
                    },
                },
            }
        </script>
        <style>
            /* Alpine hide helper */
            [x-cloak] { display: none !important; }
        </style>
        @vite(['resources/js/app.js'])
        @stack('styles')
        @livewireStyles
    </head>
    <body class="h-full" x-data="{ sidebarOpen: window.innerWidth >= 768, mobileMenuOpen: false }">
        <!-- Mobile menu button -->
        <div class="md:hidden fixed top-4 left-4 z-50">
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="mobile-menu-button p-2 rounded-md text-gray-700 hover:bg-gray-100">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>

        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-40 w-64 bg-white border-r border-gray-100 shadow-sm transform transition-transform duration-300 ease-in-out md:translate-x-0 -translate-x-full"
             :class="{ 'translate-x-0': mobileMenuOpen || sidebarOpen, '-translate-x-full': !mobileMenuOpen && !sidebarOpen }">
            <div class="flex flex-col h-full">
                <!-- Logo -->
                <div class="h-20 flex items-center justify-between px-4 border-b border-gray-100">
                    <div class="flex items-center justify-between w-full">
                        <div class="flex items-center ml-12">
                            <img src="{{ asset('assets/images/logo/logo1.png') }}" alt="WAR Foundation Logo" class="h-14 w-auto">
                        </div>
                        <button @click="sidebarOpen = !sidebarOpen" 
                                class="hidden md:flex items-center justify-center w-8 h-8 rounded-full hover:bg-gray-100 text-gray-500 transition-colors duration-200"
                                aria-label="Toggle sidebar">
                            <i class="fas fa-chevron-left text-xs"></i>
                        </button>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 overflow-y-auto py-6 space-y-2">
                                            <a href="{{ route('admin.dashboard') }}" class="group flex items-center gap-3 rounded-lg px-4 py-2 text-sm transition-colors duration-200 border-l-4 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-50 text-blue-700 font-semibold border-blue-600' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900 hover:border-gray-300' }}">
                            <i class="fas fa-tachometer-alt w-5 h-5 flex-shrink-0 {{ request()->routeIs('admin.dashboard') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
                            <span class="truncate">Dashboard</span>
                        </a>
                        <a href="{{ route('admin.staff.index') }}" class="group flex items-center gap-3 rounded-lg px-4 py-2 text-sm transition-colors duration-200 border-l-4 {{ request()->routeIs('admin.staff.*') ? 'bg-blue-50 text-blue-700 font-semibold border-blue-600' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900 hover:border-gray-300' }}">
                            <i class="fas fa-users w-5 h-5 flex-shrink-0 {{ request()->routeIs('admin.staff.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
                            <span class="truncate">Manage Staff</span>
                        </a>
                        <a href="{{ route('admin.projects.index') }}" class="group flex items-center gap-3 rounded-lg px-4 py-2 text-sm transition-colors duration-200 border-l-4 {{ request()->routeIs('admin.projects.*') ? 'bg-blue-50 text-blue-700 font-semibold border-blue-600' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900 hover:border-gray-300' }}">
                            <i class="fas fa-project-diagram w-5 h-5 flex-shrink-0 {{ request()->routeIs('admin.projects.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
                            <span class="truncate">Projects</span>
                        </a>
                        <a href="{{ route('admin.library.index') }}" class="group flex items-center gap-3 rounded-lg px-4 py-2 text-sm transition-colors duration-200 border-l-4 {{ request()->routeIs('admin.library.*') ? 'bg-blue-50 text-blue-700 font-semibold border-blue-600' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900 hover:border-gray-300' }}">
                            <i class="fas fa-book w-5 h-5 flex-shrink-0 {{ request()->routeIs('admin.library.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
                            <span class="truncate">Library</span>
                        </a>
                        <a href="{{ route('admin.blogs.index') }}" class="group flex items-center gap-3 rounded-lg px-4 py-2 text-sm transition-colors duration-200 border-l-4 {{ request()->routeIs('admin.blogs.*') ? 'bg-blue-50 text-blue-700 font-semibold border-blue-600' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900 hover:border-gray-300' }}">
                            <i class="fas fa-blog w-5 h-5 flex-shrink-0 {{ request()->routeIs('admin.blogs.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
                            <span class="truncate">Blog</span>
                        </a>
                        <a href="{{ route('admin.faqs.index') }}" class="group flex items-center gap-3 rounded-lg px-4 py-2 text-sm transition-colors duration-200 border-l-4 {{ request()->routeIs('admin.faqs.*') ? 'bg-blue-50 text-blue-700 font-semibold border-blue-600' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900 hover:border-gray-300' }}">
                            <i class="fas fa-question-circle w-5 h-5 flex-shrink-0 {{ request()->routeIs('admin.faqs.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
                            <span class="truncate">FAQs</span>
                        </a>
                        <a href="{{ route('admin.testimonials.index') }}" class="group flex items-center gap-3 rounded-lg px-4 py-2 text-sm transition-colors duration-200 border-l-4 {{ request()->routeIs('admin.testimonials.*') ? 'bg-blue-50 text-blue-700 font-semibold border-blue-600' : 'border-transparent text-gray-600 hover:bg-gray-50 hover:text-gray-900 hover:border-gray-300' }}">
                            <i class="fas fa-quote-left w-5 h-5 flex-shrink-0 {{ request()->routeIs('admin.testimonials.*') ? 'text-blue-600' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
                            <span class="truncate">Testimonials</span>
                        </a>
                    </nav>

                <!-- User Profile -->
                <div class="border-t border-gray-100 bg-white p-4">
                    <div class="flex items-center">
                        <div class="shrink-0">
                            <img class="w-9 h-9 rounded-full object-cover border-2 border-white shadow-sm" 
                                 src="{{ Auth::user()->profile_photo_url }}" 
                                 alt="{{ Auth::user()->name }}">
                        </div>
                        <div class="ml-3 overflow-hidden">
                            <div class="text-sm font-medium text-gray-800 truncate">{{ Auth::user()->name }}</div>
                            <div class="text-xs text-gray-500 truncate">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col h-screen pt-16 md:pt-0 md:pl-64">
            <!-- Top Navigation -->
            <header class="fixed top-0 right-0 left-0 z-30 flex items-center justify-between h-16 px-4 bg-white border-b border-gray-200 shadow-sm md:relative md:left-0">
                <div class="flex items-center">
                    <h1 class="ml-14 mt-2 md:ml-0 text-lg font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
                </div>
                
                <div class="flex items-center space-x-4">
                    <!-- Notifications -->
                    <button class="p-2 text-gray-500 rounded-full hover:bg-gray-100 hover:text-gray-700 focus:outline-none">
                        <i class="text-xl far fa-bell"></i>
                    </button>
                    
                    <!-- User Menu -->
                    <div class="relative ml-3" x-data="{ open: false }">
                        <button @click="open = !open" class="flex items-center max-w-xs text-sm text-gray-700 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500" id="user-menu" aria-expanded="false" aria-haspopup="true">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                            <span class="hidden ml-2 text-sm font-medium text-gray-700 md:block">{{ Auth::user()->name }}</span>
                            <i class="hidden ml-1 text-gray-500 fas fa-chevron-down text-xs md:block"></i>
                        </button>

                        <!-- Dropdown menu -->
                        <div x-show="open" 
                             @click.away="open = false"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="absolute right-0 w-48 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" 
                             role="menu" 
                             aria-orientation="vertical" 
                             aria-labelledby="user-menu">
                            <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                <i class="w-5 mr-2 text-gray-500 fas fa-user"></i> Profile
                            </a>
                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <a href="{{ route('api-tokens.index') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                    <i class="w-5 mr-2 text-gray-500 fas fa-key"></i> API Tokens
                                </a>
                            @endif
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <button type="submit" class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100" role="menuitem">
                                    <i class="w-5 mr-2 text-gray-500 fas fa-sign-out-alt"></i> Sign out
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto focus:outline-none pt-4 md:pt-0">
                <div class="p-4 md:p-6">
                    <!-- Page Header -->
                    <div class="mb-6">
                        <div class="flex flex-col items-start justify-between pb-5 space-y-4 border-b border-gray-200 md:flex-row md:items-center md:space-y-0">
                            <h2 class="text-2xl font-bold leading-tight text-gray-900">@yield('header')</h2>
                            <div class="flex items-center space-x-3">
                                @yield('header-actions')
                            </div>
                        </div>
                    </div>
                    
                    <!-- Page Content -->
                    <div class="space-y-6">
                        @if(session('success'))
                            <div class="p-4 mb-6 text-green-800 bg-green-100 border-l-4 border-green-500 rounded">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <i class="text-green-500 fas fa-check-circle"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium">{{ session('success') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        @if($errors->any())
                            <div class="p-4 mb-6 text-red-700 bg-red-100 border-l-4 border-red-500 rounded">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <i class="text-red-500 fas fa-exclamation-circle"></i>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium">
                                            {{ $errors->first() }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>
        
        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/js/all.min.js" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        
        @stack('modals')
        @livewireScripts
        @stack('scripts')
        
        <script>
            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                const sidebar = document.querySelector('.fixed.inset-y-0');
                const mobileMenuButton = document.querySelector('.mobile-menu-button');
                
                if (window.innerWidth < 768 && sidebar && mobileMenuButton && 
                    !sidebar.contains(event.target) && 
                    !mobileMenuButton.contains(event.target)) {
                    Alpine.store('mobileMenuOpen', false);
                }
            });
            
            // Close mobile menu when route changes
            document.addEventListener('livewire:navigated', function() {
                if (window.innerWidth < 768) {
                    Alpine.store('mobileMenuOpen', false);
                }
            });
        </script>
        @stack('scripts')

    </body>
</html>


