
@extends('layouts.admin')

@section('content')


     <div class="flex flex-col w-full overflow-x-hidden border-t">
         <main class="flex-grow w-full p-6">
             <h1 class="pb-6 text-3xl text-black">Dashboard</h1>

             <div class="mt-4">
                 <div class="flex flex-wrap -mx-6">
                     <div class="w-full px-6 sm:w-1/2 xl:w-1/3">
                         <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                             <div class="p-3 bg-indigo-600 bg-opacity-75 rounded-full">
                                 <svg class="w-8 h-8 text-white" viewBox="0 0 28 30" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                     <path
                                         d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z"
                                         fill="currentColor"></path>
                                     <path
                                         d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z"
                                         fill="currentColor"></path>
                                     <path
                                         d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z"
                                         fill="currentColor"></path>
                                     <path
                                         d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z"
                                         fill="currentColor"></path>
                                     <path
                                         d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z"
                                         fill="currentColor"></path>
                                     <path
                                         d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z"
                                         fill="currentColor"></path>
                                 </svg>
                             </div>

                             <div class="mx-5">
                                 <h4 class="text-2xl font-semibold text-gray-700">{{ $totalUsers }}</h4>
                                 <div class="text-gray-500">Total Users</div>
                             </div>
                         </div>
                     </div>

                     <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 sm:mt-0">
                         <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                             <div class="p-3 bg-orange-600 bg-opacity-75 rounded-full">
                                <svg class="w-8 h-8 text-white" viewBox="0 0 28 30" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M18.2 9.08889C18.2 11.5373 16.3196 13.5222 14 13.5222C11.6804 13.5222 9.79999 11.5373 9.79999 9.08889C9.79999 6.64043 11.6804 4.65556 14 4.65556C16.3196 4.65556 18.2 6.64043 18.2 9.08889Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M25.2 12.0444C25.2 13.6768 23.9464 15 22.4 15C20.8536 15 19.6 13.6768 19.6 12.0444C19.6 10.4121 20.8536 9.08889 22.4 9.08889C23.9464 9.08889 25.2 10.4121 25.2 12.0444Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M19.6 22.3889C19.6 19.1243 17.0927 16.4778 14 16.4778C10.9072 16.4778 8.39999 19.1243 8.39999 22.3889V26.8222H19.6V22.3889Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M8.39999 12.0444C8.39999 13.6768 7.14639 15 5.59999 15C4.05359 15 2.79999 13.6768 2.79999 12.0444C2.79999 10.4121 4.05359 9.08889 5.59999 9.08889C7.14639 9.08889 8.39999 10.4121 8.39999 12.0444Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M22.4 26.8222V22.3889C22.4 20.8312 22.0195 19.3671 21.351 18.0949C21.6863 18.0039 22.0378 17.9556 22.4 17.9556C24.7197 17.9556 26.6 19.9404 26.6 22.3889V26.8222H22.4Z"
                                    fill="currentColor"></path>
                                <path
                                    d="M6.64896 18.0949C5.98058 19.3671 5.59999 20.8312 5.59999 22.3889V26.8222H1.39999V22.3889C1.39999 19.9404 3.2804 17.9556 5.59999 17.9556C5.96219 17.9556 6.31367 18.0039 6.64896 18.0949Z"
                                    fill="currentColor"></path>
                            </svg>
                             </div>

                             <div class="mx-5">
                                 <h4 class="text-2xl font-semibold text-gray-700">{{ $totalProjects }}</h4>
                                 <div class="text-gray-500">Total Projects</div>
                             </div>
                         </div>
                     </div>

                     <div class="w-full px-6 mt-6 sm:w-1/2 xl:w-1/3 xl:mt-0">
                         <div class="flex items-center px-5 py-6 bg-white rounded-md shadow-sm">
                             <div class="p-3 bg-pink-600 bg-opacity-75 rounded-full">
                                 <svg class="w-8 h-8 text-white" viewBox="0 0 28 28" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                     <path d="M6.99998 11.2H21L22.4 23.8H5.59998L6.99998 11.2Z" fill="currentColor"
                                         stroke="currentColor" stroke-width="2" stroke-linejoin="round"></path>
                                     <path
                                         d="M9.79999 8.4C9.79999 6.08041 11.6804 4.2 14 4.2C16.3196 4.2 18.2 6.08041 18.2 8.4V12.6C18.2 14.9197 16.3196 16.8 14 16.8C11.6804 16.8 9.79999 14.9197 9.79999 12.6V8.4Z"
                                         stroke="currentColor" stroke-width="2"></path>
                                 </svg>
                             </div>

                             <div class="mx-5">
                                 <h4 class="text-2xl font-semibold text-gray-700">215,542</h4>
                                 <div class="text-gray-500">Total Articles</div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>

             <div class="flex flex-wrap mt-6">
                 <div class="w-full pr-0 lg:w-1/2 lg:pr-2">
                     <p class="flex items-center pb-3 text-xl">
                         <i class="mr-3 fas fa-plus"></i> Monthly Sessions Attented
                     </p>
                     <div class="p-6 bg-white">
                         <canvas id="chartOne" width="400" height="200"></canvas>
                     </div>
                 </div>
                 <div class="w-full pl-0 mt-12 lg:w-1/2 lg:pl-2 lg:mt-0">
                     <p class="flex items-center pb-3 text-xl">
                         <i class="mr-3 fas fa-check"></i> Helped Students
                     </p>
                     <div class="p-6 bg-white">
                         <canvas id="chartTwo" width="400" height="200"></canvas>
                     </div>
                 </div>
             </div>

             {{-- <div class="w-full mt-12">
                 <p class="flex items-center pb-3 text-xl">
                     <i class="mr-3 fas fa-list"></i> Latest Reports
                 </p>
                 <div class="overflow-auto bg-white">
                     <table class="min-w-full bg-white">
                         <thead class="text-white bg-gray-800">
                             <tr>
                                 <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Name</th>
                                 <th class="w-1/3 px-4 py-3 text-sm font-semibold text-left uppercase">Last name</th>
                                 <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Phone</th>
                                 <th class="px-4 py-3 text-sm font-semibold text-left uppercase">Email</th>
                             </tr>
                         </thead>
                         <tbody class="text-gray-700">
                             <tr>
                                 <td class="w-1/3 px-4 py-3 text-left">Lian</td>
                                 <td class="w-1/3 px-4 py-3 text-left">Smith</td>
                                 <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                 <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                             </tr>
                             <tr class="bg-gray-200">
                                 <td class="w-1/3 px-4 py-3 text-left">Emma</td>
                                 <td class="w-1/3 px-4 py-3 text-left">Johnson</td>
                                 <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                 <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                             </tr>
                             <tr>
                                 <td class="w-1/3 px-4 py-3 text-left">Oliver</td>
                                 <td class="w-1/3 px-4 py-3 text-left">Williams</td>
                                 <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                 <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                             </tr>
                             <tr class="bg-gray-200">
                                 <td class="w-1/3 px-4 py-3 text-left">Isabella</td>
                                 <td class="w-1/3 px-4 py-3 text-left">Brown</td>
                                 <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                 <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                             </tr>
                             <tr>
                                 <td class="w-1/3 px-4 py-3 text-left">Lian</td>
                                 <td class="w-1/3 px-4 py-3 text-left">Smith</td>
                                 <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                 <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                             </tr>
                             <tr class="bg-gray-200">
                                 <td class="w-1/3 px-4 py-3 text-left">Emma</td>
                                 <td class="w-1/3 px-4 py-3 text-left">Johnson</td>
                                 <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                 <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                             </tr>
                             <tr>
                                 <td class="w-1/3 px-4 py-3 text-left">Oliver</td>
                                 <td class="w-1/3 px-4 py-3 text-left">Williams</td>
                                 <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                 <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                             </tr>
                             <tr class="bg-gray-200">
                                 <td class="w-1/3 px-4 py-3 text-left">Isabella</td>
                                 <td class="w-1/3 px-4 py-3 text-left">Brown</td>
                                 <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="tel:622322662">622322662</a></td>
                                 <td class="px-4 py-3 text-left"><a class="hover:text-blue-500" href="mailto:jonsmith@mail.com">jonsmith@mail.com</a></td>
                             </tr>
                         </tbody>
                     </table>
                 </div>
             </div> --}}
         </main>

         <footer class="w-full p-4 text-right bg-white">
             Built by <a class="underline">Nelson Mathebeng</a>.
         </footer>
     </div>

     <script>
        var sessionCounts = @json($sessionCounts);
        var chartOne = document.getElementById('chartOne').getContext('2d');
        var myChart = new Chart(chartOne, {
            type: 'bar',
            data: {
                labels: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
                datasets: [{
                    label: '# of Sessions',
                    data: sessionCounts,
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

@endsection

