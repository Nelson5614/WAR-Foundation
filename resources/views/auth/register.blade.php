<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-50">
        <div class="w-full sm:max-w-md px-6 py-8 bg-white shadow-lg overflow-hidden sm:rounded-lg">
            <!-- Logo -->
            <div class="flex justify-center mb-6">
                <x-authentication-card-logo />
            </div>

            <!-- Title -->
            <h1 class="text-2xl font-bold text-center text-gray-900 mb-6">
                Create Your Account
            </h1>

            <!-- Validation Errors -->
            <x-validation-errors class="mb-6" />

            <form method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div class="space-y-1">
                    <x-label for="name" value="{{ __('Full Name') }}" class="text-sm font-medium text-gray-700" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-user text-gray-400"></i>
                        </div>
                        <x-input 
                            id="name" 
                            class="block w-full pl-10" 
                            type="text" 
                            name="name" 
                            :value="old('name')" 
                            required 
                            autofocus 
                            autocomplete="name" 
                            placeholder="John Doe"
                        />
                    </div>
                </div>

                <!-- Email -->
                <div class="space-y-1">
                    <x-label for="email" value="{{ __('Email') }}" class="text-sm font-medium text-gray-700" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-400"></i>
                        </div>
                        <x-input 
                            id="email" 
                            class="block w-full pl-10" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autocomplete="email"
                            placeholder="you@example.com"
                        />
                    </div>
                </div>

                <!-- Phone -->
                <div class="space-y-1">
                    <x-label for="phone" value="{{ __('Phone Number') }}" class="text-sm font-medium text-gray-700" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-phone text-gray-400"></i>
                        </div>
                        <x-input 
                            id="phone" 
                            class="block w-full pl-10" 
                            type="tel" 
                            name="phone" 
                            :value="old('phone')" 
                            required 
                            autocomplete="tel"
                            placeholder="+266 5XXX XXXX"
                        />
                    </div>
                </div>

                <!-- Address -->
                <div class="space-y-1">
                    <x-label for="address" value="{{ __('Address') }}" class="text-sm font-medium text-gray-700" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-map-marker-alt text-gray-400"></i>
                        </div>
                        <x-input 
                            id="address" 
                            class="block w-full pl-10" 
                            type="text" 
                            name="address" 
                            :value="old('address')" 
                            required 
                            autocomplete="address"
                            placeholder="123 Kingsway, Maseru, Lesotho"
                        />
                    </div>
                </div>

                <!-- Date of Birth -->
                <div class="space-y-1">
                    <x-label for="date_of_birth" value="{{ __('Date of Birth') }}" class="text-sm font-medium text-gray-700" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-calendar-alt text-gray-400"></i>
                        </div>
                        <x-input 
                            id="date_of_birth" 
                            class="block w-full pl-10" 
                            type="date" 
                            name="date_of_birth" 
                            :value="old('date_of_birth')" 
                            required 
                            max="{{ now()->subYears(13)->format('Y-m-d') }}"
                        />
                    </div>
                </div>

                <!-- Password -->
                <div class="space-y-1">
                    <x-label for="password" value="{{ __('Password') }}" class="text-sm font-medium text-gray-700" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <x-input 
                            id="password" 
                            class="block w-full pl-10" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="new-password"
                            placeholder="••••••••"
                        />
                    </div>
                    <p class="mt-1 text-xs text-gray-500">
                        Minimum 8 characters, with at least one uppercase, one lowercase, one number, and one special character.
                    </p>
                </div>

                <!-- Confirm Password -->
                <div class="space-y-1">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-sm font-medium text-gray-700" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-400"></i>
                        </div>
                        <x-input 
                            id="password_confirmation" 
                            class="block w-full pl-10" 
                            type="password" 
                            name="password_confirmation" 
                            required 
                            autocomplete="new-password"
                            placeholder="••••••••"
                        />
                    </div>
                </div>

                <!-- Terms and Conditions -->
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <label class="flex items-start">
                            <input type="checkbox" name="terms" id="terms" required 
                                class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            >
                            <span class="ml-2 text-sm text-gray-600">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-blue-600 hover:text-blue-800 hover:underline">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-blue-600 hover:text-blue-800 hover:underline">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </span>
                        </label>
                    </div>
                @endif

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                        {{ __('Create Account') }}
                    </button>
                </div>

                <!-- Login Link -->
                <div class="text-center mt-4">
                    <p class="text-sm text-gray-600">
                        {{ __('Already have an account?') }}
                        <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500 hover:underline">
                            {{ __('Sign in') }}
                        </a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
