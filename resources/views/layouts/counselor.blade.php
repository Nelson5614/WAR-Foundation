<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Re Aha Bocha</title>


        <!-- Tailwind -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css" rel="stylesheet">

        <style>
            @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
            .font-family-karla { font-family: karla; }
            .bg-sidebar { background: #3d68ff; }
            .cta-btn { color: #3d68ff; }
            .upgrade-btn { background: #1947ee; }
            .upgrade-btn:hover { background: #0038fd; }
            .active-nav-link { background: #1947ee; }
            .nav-item:hover { background: #1947ee; }
            .account-link:hover { background: #3d68ff; }
        </style>
        @vite(['resources/js/app.js'])
        @stack('styles')
        @livewireStyles
    </head>
    <body class="flex overflow-auto bg-gray-100 font-family-karla">
        <aside class="relative hidden w-64 h-screen shadow-xl bg-sidebar sm:block">
            <div class="p-6">
                <a  class="text-3xl font-semibold text-white uppercase hover:text-gray-300">Counselor</a>
                <a href="{{ route('set-new-session.index') }}" class="flex items-center justify-center w-full py-2 mt-5 font-semibold bg-white rounded-tr-lg rounded-bl-lg rounded-br-lg shadow-lg cta-btn hover:shadow-xl hover:bg-gray-300">
                    <i class="mr-2 fas fa-plus"></i> Set A New Session
                </a>
            </div>
            <nav class="pt-3 text-base font-semibold text-white">
                <a href="{{ route('counselor.dashboard') }}" style="text-decoration: none;" class="flex items-center py-3 pl-6 text-white active-nav-link nav-item">
                    <i class="mr-3 fas fa-tachometer-alt"></i>
                    Dashboard
                </a>
                <a href="{{ route('upcoming-sessions.index') }}" style="text-decoration: none;" class="flex items-center py-3 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                    <i class="mr-3 fas fa-sticky-note"></i>
                    Upcoming Sessions
                </a>
                <a href="{{ route('counselor-tasks.index') }}" style="text-decoration: none;" class="flex items-center py-3 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                    <i class="mr-3 fas fa-table"></i>
                    My Tasks
                </a>
                <a href="{{ route('counselor-sharedprojects.index') }}" style="text-decoration: none;" class="flex items-center py-3 pl-6 text-white opacity-75 hover:opacity-100 nav-item">
                    <i class="mr-3 fas fa-align-left"></i>
                    Shared Projects
                </a>
               @livewire('notifications-count')

            </nav>

        </aside>
        <div class="flex flex-col w-full h-screen overflow-y-auto">
            <!-- Desktop Header -->
            <header class="items-center justify-end hidden w-full px-6 py-2 bg-white sm:flex">
                <nav >
                    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="flex justify-between h-16">
                            <div class="flex">
                                <!-- Logo -->
                                <div class="flex items-center shrink-0">

                                </div>

                                <!-- Navigation Links -->
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                                </div>
                            </div>

                            <div class="hidden sm:flex sm:items-center sm:ml-6">
                                <!-- Teams Dropdown -->


                                <!-- Settings Dropdown -->
                                <div class="relative ml-3">
                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">
                                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                                <button class="flex text-sm transition border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300">
                                                    <img class="object-cover w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                                </button>
                                            @else
                                                <span class="inline-flex rounded-md">
                                                    <button type="button" class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50">
                                                        {{ Auth::user()->name }}

                                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                                        </svg>
                                                    </button>
                                                </span>
                                            @endif
                                        </x-slot>

                                        <x-slot name="content">
                                            <!-- Account Management -->
                                            <div class="block px-4 py-2 text-xs text-gray-400">
                                                {{ __('Manage Account') }}
                                            </div>

                                            <x-dropdown-link href="{{ route('profile.show') }}">
                                                {{ __('Profile') }}
                                            </x-dropdown-link>

                                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                                <x-dropdown-link href="{{ route('api-tokens.index') }}">
                                                    {{ __('API Tokens') }}
                                                </x-dropdown-link>
                                            @endif

                                            <div class="border-t border-gray-200"></div>

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}" x-data>
                                                @csrf

                                                <x-dropdown-link href="{{ route('logout') }}"
                                                         @click.prevent="$root.submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                            </div>

                            <!-- Hamburger -->
                            {{-- <div class="flex items-center -mr-2 sm:hidden">
                                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div> --}}
                        </div>
                    </div>
                </nav>
            </header>

            <!-- Mobile Header & Nav -->
            <header x-data="{ isOpen: false }" class="w-full px-6 py-5 bg-sidebar sm:hidden">
                <div class="flex items-center justify-between">
                    <a href="index.html" class="text-3xl font-semibold text-white uppercase hover:text-gray-300">Student</a>
                    <button @click="isOpen = !isOpen" class="text-3xl text-white focus:outline-none">
                        <i x-show="!isOpen" class="fas fa-bars"></i>
                        <i x-show="isOpen" class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Dropdown Nav -->
                <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
                    <a href="{{ route('counselor.dashboard') }}" class="flex items-center py-2 pl-4 text-white active-nav-link nav-item">
                        <i class="mr-3 fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                    <a href="{{ route('upcoming-sessions.index') }}" class="flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 nav-item">
                        <i class="mr-3 fas fa-sticky-note"></i>
                        Upcoming Sessions
                    </a>
                    <a href="{{ route('counselor-tasks.index') }}" class="flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 nav-item">
                        <i class="mr-3 fas fa-table"></i>
                        My Tasks
                    </a>
                    <a href="{{ route('counselor-sharedprojects.index') }}" class="flex items-center py-2 pl-4 text-white opacity-75 hover:opacity-100 nav-item">
                        <i class="mr-3 fas fa-align-left"></i>
                        Shared Projects
                    </a>
                    @livewire('notifications-count')

                    <div class="pt-4 pb-1 border-t border-white">
                        <div class="flex items-center px-4">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="mr-3 shrink-0">
                                    <img class="object-cover w-10 h-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </div>
                            @endif

                            <div>
                                <div class="text-base font-medium text-white">{{ Auth::user()->name }}</div>
                                <div class="text-sm font-medium text-white">{{ Auth::user()->email }}</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <!-- Account Management -->
                            <x-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                                {{ __('Profile') }}
                            </x-responsive-nav-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                                    {{ __('API Tokens') }}
                                </x-responsive-nav-link>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-responsive-nav-link href="{{ route('logout') }}"
                                               @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </x-responsive-nav-link>
                            </form>

                            <!-- Team Management -->
                            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                <div class="border-t border-white"></div>

                                <div class="block px-4 py-2 text-xs text-white">
                                    {{ __('Manage Team') }}
                                </div>

                                <!-- Team Settings -->
                                <x-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                                    {{ __('Team Settings') }}
                                </x-responsive-nav-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                                        {{ __('Create New Team') }}
                                    </x-responsive-nav-link>
                                @endcan

                                <div class="border-t border-white"></div>

                                <!-- Team Switcher -->
                                <div class="block px-4 py-2 text-xs text-white">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-switchable-team :team="$team" component="responsive-nav-link" />
                                @endforeach
                            @endif
                        </div>
                    </div>

                </nav>
                <!-- <button class="flex items-center justify-center w-full py-2 mt-5 font-semibold bg-white rounded-tr-lg rounded-bl-lg rounded-br-lg shadow-lg cta-btn hover:shadow-xl hover:bg-gray-300">
                    <i class="mr-3 fas fa-plus"></i> New Report
                </button> -->
            </header>

            <main>
                @yield('content')
            </main>
        </div>
        <!-- AlpineJS -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
        <!-- ChartJS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>



        <script>
            var chartOne = document.getElementById('chartOne');
            var myChart = new Chart(chartOne, {
                type: 'bar',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });

            var chartTwo = document.getElementById('chartTwo');
            var myLineChart = new Chart(chartTwo, {
                type: 'line',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        </script>
            <script>
                // Initialize SortableJS on the table body
                Sortable.create(document.querySelector('#sessions-table tbody'), {

                    handle: '.bi-grip-vertical', // Drag handle class
                    ghostClass: 'bg-blue-100', // Class added to the dragged element
                    animation: 150, // Animation speed
                    onEnd: function (evt) {
                        // When sorting is done, send an AJAX request to update the order
                        const ids = Array.from(document.querySelectorAll('#sessions-table tbody .sortable-item'))
                            .map(item => item.getAttribute('data-id'));

                        fetch('{{ route('counselor.sort') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({ ids: ids })
                        }).then(response => response.json())
                          .then(data => {
                              if (data.success) {
                                  console.log('Order updated successfully');
                              } else {
                                  console.error('Failed to update order');
                              }
                          });
                    }
                });
            </script>
        @livewireScripts
        @stack('scripts')

    </body>
</html>


s
