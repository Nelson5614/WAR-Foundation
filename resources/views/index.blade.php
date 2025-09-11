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
<body class="antialiased bg-gray-50 pt-16">
    <!-- Navigation -->
    <nav class="fixed w-full bg-white shadow-sm z-50 top-0 left-0">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <img src="{{ asset('assets/images/logo/logo1.png') }}" alt="WAR Foundation Logo" class="h-10 w-auto">
                    </div>
                </div>
                <div class="hidden sm:ml-6 sm:flex sm:items-center space-x-8">
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
    <div id="home" class="bg-gradient-to-r from-blue-900 to-blue-700 text-white py-20 md:py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-12 items-center">
                <div class="mb-10 lg:mb-0 text-center lg:text-left">
                    <span class="inline-block mb-4 px-4 py-1 text-sm font-semibold text-blue-100 bg-blue-600 rounded-full">Re Aha Bocha</span>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">Rebuilding Lives Through Compassionate Support</h1>
                    <p class="text-xl text-blue-100 mb-8">Providing essential counseling and support services to help individuals overcome life's challenges and build stronger communities.</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center lg:justify-start">
                        <a href="#contact" class="inline-flex items-center justify-center px-8 py-3 border-2 border-white text-base font-medium rounded-md text-white bg-transparent hover:bg-white hover:text-blue-900 transition duration-150">
                            Get Support
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        <a href="#about" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-900 bg-white hover:bg-blue-50 transition duration-150">
                            Learn More
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="relative rounded-xl overflow-hidden shadow-2xl transform rotate-1 hover:rotate-0 transition-transform duration-300">
                        <img src="https://images.unsplash.com/photo-1501594907352-04cda38ebc29?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Supportive counseling session" class="w-full h-auto">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/70 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-6 text-white">
                            <p class="text-sm font-medium">Professional counseling services available for individuals and groups</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-6 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                    <div class="text-4xl font-bold text-blue-700 mb-2">1,000+</div>
                    <div class="text-gray-600">Lives Touched</div>
                    <p class="mt-2 text-sm text-gray-500">Individuals who have received our support services</p>
                </div>
                <div class="p-6 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                    <div class="text-4xl font-bold text-blue-700 mb-2">50+</div>
                    <div class="text-gray-600">Communities Served</div>
                    <p class="mt-2 text-sm text-gray-500">Across the region with our outreach programs</p>
                </div>
                <div class="p-6 rounded-lg hover:bg-gray-50 transition-colors duration-300">
                    <div class="text-4xl font-bold text-blue-700 mb-2">95%</div>
                    <div class="text-gray-600">Positive Outcomes</div>
                    <p class="mt-2 text-sm text-gray-500">Reported improvement in quality of life</p>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div id="about" class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-16 items-center">
                <div class="mb-10 lg:mb-0">
                    <span class="inline-block mb-4 text-sm font-semibold text-blue-600 uppercase tracking-wider">Our Mission</span>
                    <h2 class="text-3xl font-extrabold text-gray-900 mb-6">Rebuilding Lives, Restoring Hope</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        WAR Foundation is dedicated to providing compassionate support and counseling services to individuals facing life's challenges. Our mission is to help people rebuild their lives through professional guidance, community support, and personal development programs.
                    </p>
                    <p class="text-lg text-gray-600 mb-8">
                        We believe in the power of human connection and the strength that comes from a supportive community. Our team of experienced counselors and volunteers work together to create a safe space for healing and personal growth.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <div class="flex items-center justify-center h-6 w-6 rounded-full bg-blue-100 text-blue-600">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <p class="ml-3 text-base text-gray-600">Professional counseling services for individuals and groups</p>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <div class="flex items-center justify-center h-6 w-6 rounded-full bg-blue-100 text-blue-600">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <p class="ml-3 text-base text-gray-600">Community support groups and outreach programs</p>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mt-1">
                                <div class="flex items-center justify-center h-6 w-6 rounded-full bg-blue-100 text-blue-600">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                            </div>
                            <p class="ml-3 text-base text-gray-600">Crisis intervention and trauma support</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <div class="relative rounded-xl overflow-hidden shadow-xl">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Compassionate support" class="w-full h-auto">
                        <div class="absolute inset-0 bg-gradient-to-t from-blue-900/60 to-transparent"></div>
                        <div class="absolute bottom-0 left-0 p-8 text-white">
                            <blockquote class="relative">
                                <div class="text-xl font-medium mb-4">
                                    <p>"The support I received helped me find strength I didn't know I had."</p>
                                </div>
                                <footer class="text-sm">
                                    <span class="font-semibold">Sarah M.</span>
                                    <span class="text-blue-200">, Support Group Participant</span>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div id="services" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block mb-4 text-sm font-semibold text-blue-600 uppercase tracking-wider">How We Help</span>
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Our Support Services</h2>
                <p class="mt-4 text-xl text-gray-600 max-w-3xl mx-auto">Compassionate care and professional support for individuals and families</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div class="feature-card bg-white p-8 rounded-xl shadow-md border border-gray-100 hover:border-blue-100 transition-all duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-comments text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Individual Counseling</h3>
                    <p class="text-gray-600 mb-4">One-on-one professional counseling sessions tailored to your specific needs and circumstances.</p>
                    <ul class="space-y-2 mb-6 text-gray-600 text-sm">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Personalized support plans</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Confidential environment</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Evidence-based approaches</span>
                        </li>
                    </ul>
                    <a href="#contact" class="inline-flex items-center text-blue-600 font-medium hover:text-blue-800 transition-colors">
                        Schedule a session
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Service 2 -->
                <div class="feature-card bg-white p-8 rounded-xl shadow-md border border-gray-100 hover:border-blue-100 transition-all duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-users text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Support Groups</h3>
                    <p class="text-gray-600 mb-4">Connect with others facing similar challenges in a safe, supportive group environment.</p>
                    <ul class="space-y-2 mb-6 text-gray-600 text-sm">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Peer support networks</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Facilitated discussions</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Shared experiences</span>
                        </li>
                    </ul>
                    <a href="#contact" class="inline-flex items-center text-blue-600 font-medium hover:text-blue-800 transition-colors">
                        Join a group
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>

                <!-- Service 3 -->
                <div class="feature-card bg-white p-8 rounded-xl shadow-md border border-gray-100 hover:border-blue-100 transition-all duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-hand-holding-heart text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Crisis Intervention</h3>
                    <p class="text-gray-600 mb-4">Immediate support and guidance during difficult times and challenging situations.</p>
                    <ul class="space-y-2 mb-6 text-gray-600 text-sm">
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>24/7 helpline</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Emergency support</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Safety planning</span>
                        </li>
                    </ul>
                    <a href="#contact" class="inline-flex items-center text-blue-600 font-medium hover:text-blue-800 transition-colors">
                        Get help now
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
                <span class="inline-block mb-4 text-sm font-semibold text-blue-600 uppercase tracking-wider">Success Stories</span>
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Voices of Hope & Healing</h2>
                <p class="mt-4 text-xl text-gray-600">Hear from those whose lives have been transformed through our support</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach(\App\Models\Testimonial::latest()->take(3)->get() as $testimonial)
                <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="flex items-center mb-4">
                        <div class="text-yellow-400">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 italic mb-6">"{{ $testimonial->content }}"</p>
                    <div class="flex items-center border-t border-gray-100 pt-6">
                        @if($testimonial->photo)
                        <img src="{{ asset('storage/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" class="h-12 w-12 rounded-full object-cover mr-4">
                        @else
                        <div class="h-12 w-12 rounded-full bg-blue-600 flex items-center justify-center text-white font-bold text-lg mr-4">
                            {{ substr($testimonial->name, 0, 1) }}
                        </div>
                        @endif
                        <div>
                            <h4 class="font-semibold text-gray-900">{{ $testimonial->name }}</h4>
                            <p class="text-sm text-gray-500">{{ $testimonial->occupation }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-12 text-center">
                <a href="#contact" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                    Share Your Story
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Blog Section -->
    <div class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="inline-block mb-4 text-sm font-semibold text-blue-600 uppercase tracking-wider">Latest Insights</span>
                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">From Our Blog</h2>
                <p class="mt-4 text-xl text-gray-600">Helpful articles and resources for your journey to healing</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse(\App\Models\Blog::latest()->take(3)->get() as $post)
                <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-shadow duration-300">
                    <div class="h-48 overflow-hidden">
                        @if(!empty($post->images) && is_array($post->images) && count($post->images) > 0)
                            <img src="{{ asset('storage/' . $post->images[0]) }}" alt="{{ $post->title }}" class="w-full h-full object-cover hover:scale-105 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">No Image</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-500 mb-2">
                            <span>{{ $post->created_at->format('F j, Y') }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min read</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $post->title }}</h3>
                        <p class="text-gray-600 mb-4">{{ \Illuminate\Support\Str::limit(strip_tags($post->content), 120) }}</p>
                        <a href="{{ route('blog.show', $post->id) }}" class="inline-flex items-center text-blue-600 font-medium hover:text-blue-800 transition-colors">
                            Read more
                            <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
                @empty
                <p class="col-span-3 text-center text-gray-500 py-8">No blog posts available yet. Check back soon!</p>
                @endforelse
            </div>

            <div class="mt-12 text-center">
                <a href="{{ route('blog.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                    View All Articles
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </a>
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <div id="contact" class="bg-gradient-to-r from-blue-800 to-blue-600 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-12 items-center">
                <div class="text-center lg:text-left mb-10 lg:mb-0">
                    <h2 class="text-3xl font-extrabold mb-4">Ready to Begin Your Journey to Healing?</h2>
                    <p class="text-xl text-blue-100 mb-6 max-w-2xl mx-auto lg:mx-0">Take the first step towards positive change. Our compassionate team is here to support you every step of the way.</p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 justify-center lg:justify-start">
                        <a href="#" class="inline-flex items-center justify-center px-8 py-3 border-2 border-white text-base font-medium rounded-md text-white bg-transparent hover:bg-white hover:text-blue-800 transition duration-150">
                            Get Support Now
                            <svg class="ml-2 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </a>
                        <a href="tel:+26657070112" class="inline-flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-white hover:bg-blue-50 transition duration-150">
                            <i class="fas fa-phone-alt mr-2"></i>
                            Call Us
                        </a>
                    </div>
                </div>
                <div class="bg-white/10 backdrop-blur-sm rounded-2xl p-8">
                    <h3 class="text-xl font-bold mb-4">Contact Our Team</h3>
                    <p class="text-blue-100 mb-6">Our compassionate counselors are available to listen and provide the support you need.</p>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-blue-200">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-blue-200">Address</p>
                                <p class="text-lg font-semibold text-white">Maseru 100, Lesotho</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-blue-200">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-blue-200">Email</p>
                                <p class="text-lg font-semibold text-white">info@reahabocha.co.ls</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="flex-shrink-0 h-6 w-6 text-blue-200">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-blue-200">Office Hours</p>
                                <p class="text-lg font-semibold text-white">Mon-Fri: 8am - 8pm</p>
                                <p class="text-sm text-blue-200">Weekend appointments available</p>
                            </div>
                        </li>
                    </ul>
                </div>
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
