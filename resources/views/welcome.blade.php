<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="WAR Foundation - Empowering communities through education and support">

    <title>WAR Foundation - Home</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
        }
        .feature-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="antialiased bg-gray-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-2xl font-bold text-blue-800">WAR Foundation</span>
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-8
                ">
                    <a href="#home" class="text-gray-700 hover:text-blue-600 px-3 py-2 font-medium">Home</a>
                    <a href="#about" class="text-gray-700 hover:text-blue-600 px-3 py-2 font-medium">About</a>
                    <a href="#services" class="text-gray-700 hover:text-blue-600 px-3 py-2 font-medium">Services</a>
                    <a href="#contact" class="text-gray-700 hover:text-blue-600 px-3 py-2 font-medium">Contact</a>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="ml-8 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-600 px-3 py-2 font-medium">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-8 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Get Started
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div id="home" class="hero-gradient text-white py-20 md:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 items-center">
                <div class="mb-10 lg:mb-0">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold mb-6 leading-tight">Empowering Communities Through Education & Support</h1>
                    <p class="text-xl text-blue-100 mb-8">Join us in our mission to create positive change and transform lives through education, counseling, and community development.</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="#contact" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-white hover:bg-blue-50 md:py-4 md:text-lg md:px-10 transition duration-150">
                            Get Involved
                        </a>
                        <a href="#services" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-700 bg-opacity-60 hover:bg-opacity-70 md:py-4 md:text-lg md:px-10 transition duration-150">
                            Our Services
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="relative rounded-lg overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Community support" class="w-full h-auto">
                        <div class="absolute inset-0 bg-blue-800 bg-opacity-40"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-6 rounded-lg">
                    <div class="text-4xl font-bold text-blue-700 mb-2">500+</div>
                    <div class="text-gray-600">Students Supported</div>
                </div>
                <div class="p-6 rounded-lg">
                    <div class="text-4xl font-bold text-blue-700 mb-2">50+</div>
                    <div class="text-gray-600">Communities Impacted</div>
                </div>
                <div class="p-6 rounded-lg">
                    <div class="text-4xl font-bold text-blue-700 mb-2">100%</div>
                    <div class="text-gray-600">Dedication to Excellence</div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div id="about" class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
                <div class="mb-10 lg:mb-0">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-6">About WAR Foundation</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        WAR Foundation is a non-profit organization dedicated to empowering individuals and communities through education, counseling, and support services. Our mission is to create opportunities for growth and development that lead to sustainable change.
                    </p>
                    <p class="text-lg text-gray-600 mb-8">
                        With a team of dedicated professionals and volunteers, we work tirelessly to provide access to quality education, mental health support, and community development programs that make a real difference in people's lives.
                    </p>
                    <a href="#" class="inline-flex items-center text-blue-600 font-medium hover:text-blue-800">
                        Learn more about our mission
                        <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="text-blue-600 mb-3">
                            <i class="fas fa-graduation-cap text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Education</h3>
                        <p class="text-gray-600">Providing access to quality education and learning resources for all.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="text-blue-600 mb-3">
                            <i class="fas fa-hands-helping text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Support</h3>
                        <p class="text-gray-600">Offering counseling and support services to those in need.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="text-blue-600 mb-3">
                            <i class="fas fa-users text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Community</h3>
                        <p class="text-gray-600">Building stronger communities through collaborative efforts.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <div class="text-blue-600 mb-3">
                            <i class="fas fa-hand-holding-heart text-4xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Empowerment</h3>
                        <p class="text-gray-600">Empowering individuals to reach their full potential.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div id="services" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Our Services</h2>
                <p class="mt-4 text-xl text-gray-600">Comprehensive support for individuals and communities</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="feature-card bg-white p-8 rounded-xl shadow-md border border-gray-100">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-graduation-cap text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Educational Programs</h3>
                    <p class="text-gray-600 mb-4">Access to quality education, scholarships, and learning resources for students of all ages.</p>
                    <a href="#" class="text-blue-600 font-medium inline-flex items-center">
                        Learn more
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Service 2 -->
                <div class="feature-card bg-white p-8 rounded-xl shadow-md border border-gray-100">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-heart text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Counseling Services</h3>
                    <p class="text-gray-600 mb-4">Professional counseling and mental health support for individuals and families.</p>
                    <a href="#" class="text-blue-600 font-medium inline-flex items-center">
                        Learn more
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Service 3 -->
                <div class="feature-card bg-white p-8 rounded-xl shadow-md border border-gray-100">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6">
                        <i class="fas fa-hands-helping text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Community Development</h3>
                    <p class="text-gray-600 mb-4">Initiatives and programs designed to strengthen and uplift local communities.</p>
                    <a href="#" class="text-blue-600 font-medium inline-flex items-center">
                        Learn more
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">What People Say</h2>
                <p class="mt-4 text-xl text-gray-600">Hear from those who've been impacted by our work</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-6">"The support I received from WAR Foundation changed my life. Their counseling services helped me through a very difficult time."</p>
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-bold mr-4">JD</div>
                        <div>
                            <h4 class="font-semibold text-gray-900">John Doe</h4>
                            <p class="text-sm text-gray-500">Scholarship Recipient</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-6">"As a volunteer, I've seen firsthand the positive impact WAR Foundation has on our community. It's truly inspiring work."</p>
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-bold mr-4">AS</div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Anna Smith</h4>
                            <p class="text-sm text-gray-500">Volunteer</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white p-8 rounded-xl shadow-md">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-6">"The educational programs provided by WAR Foundation have been invaluable to our students. Highly recommended!"</p>
                    <div class="flex items-center">
                        <div class="h-12 w-12 rounded-full bg-gray-300 flex items-center justify-center text-gray-600 font-bold mr-4">RJ</div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Robert Johnson</h4>
                            <p class="text-sm text-gray-500">School Principal</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div id="contact" class="bg-blue-700 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-extrabold mb-6">Ready to Make a Difference?</h2>
            <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">Join us in our mission to empower individuals and transform communities through education and support.</p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="#" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-white hover:bg-blue-50 md:py-4 md:text-lg md:px-10 transition duration-150">
                    Donate Now
                </a>
                <a href="#" class="inline-flex items-center justify-center px-8 py-3 border border-white text-base font-medium rounded-md text-white bg-transparent hover:bg-blue-600 md:py-4 md:text-lg md:px-10 transition duration-150">
                    Volunteer
                </a>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
                <div class="mb-10 lg:mb-0">
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-6">Get In Touch</h2>
                    <p class="text-lg text-gray-600 mb-8">Have questions or need support? Our team is here to help you.</p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-blue-600">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-medium text-gray-900">Address</h3>
                                <p class="mt-1 text-gray-600">Maseru 100, Lesotho</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-blue-600">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-medium text-gray-900">Phone</h3>
                                <p class="mt-1 text-gray-600">+266 5707 0112</p>
                                <p class="text-sm text-gray-500">Available during office hours</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-blue-600">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-lg font-medium text-gray-900">Email</h3>
                                <p class="mt-1 text-gray-600">info@reahabocha.co.ls</p>
                                <p class="text-sm text-gray-500">We'll respond as soon as possible</p>
                            </div>
                        </div>
                    </div>
                
                <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Send Us a Message</h3>
                    <form action="#" method="POST" class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="name" id="name" autocomplete="name" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                            <input type="email" name="email" id="email" autocomplete="email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                            <input type="text" name="subject" id="subject" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea id="message" name="message" rows="4" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"></textarea>
                        </div>
                        
                        <div>
                            <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="mb-8 md:mb-0">
                    <h3 class="text-xl font-bold mb-4">WAR Foundation</h3>
                    <p class="text-gray-400">Empowering communities through education, support, and sustainable development initiatives.</p>
                    <div class="flex space-x-4 mt-6">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-white">Home</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white">About Us</a></li>
                        <li><a href="#services" class="text-gray-400 hover:text-white">Services</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Programs</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Events</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Donate</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Volunteer</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Fundraise</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Partnerships</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Newsletter</h4>
                    <p class="text-gray-400 mb-4">Subscribe to our newsletter for the latest updates and news.</p>
                    <form class="flex">
                        <input type="email" placeholder="Your email" class="px-4 py-2 w-full rounded-l-md focus:outline-none text-gray-900">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-r-md">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">&copy; 2023 WAR Foundation. All rights reserved.</p>
                <div class="flex space-x-6 mt-4 md:mt-0">
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Privacy Policy</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Terms of Service</a>
                    <a href="#" class="text-gray-400 hover:text-white text-sm">Sitemap</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
