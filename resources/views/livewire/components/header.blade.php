<nav x-data="{ open: false }" class="border-b bg-primary border-secondary">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-6">
        <div class="flex items-center justify-between h-16">

            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ url('/') }}" class="text-2xl font-bold transition text-secondary dark:text-secondary hover:text-tertiary dark:hover:text-tertiary">
                    YourApp
                </a>
            </div>


            <div class="hidden ml-10 space-x-8 md:flex">

                <!-- links -->
                <a href="{{ route('home') }}" class="px-3 py-2 text-lg font-medium transition rounded-md text-secondary hover:text-primary hover:bg-secondary">
                    Home
                </a>
                <a href="{{ route('about') }}" class="px-3 py-2 text-lg font-medium transition rounded-md text-secondary hover:text-primary hover:bg-secondary">
                    About
                </a>
                <a href="{{ route('contact') }}" class="px-3 py-2 text-lg font-medium transition rounded-md text-secondary hover:text-primary hover:bg-secondary">
                    Contact
                </a>

                <!-- dashboard -->
                @auth
                    @php
                        $user = Auth::user();
                        $roles = $user->roles->pluck('name')->toArray();
                        $dashboardRoute = '';

                        if (in_array('admin', $roles)) {
                            $dashboardRoute = route('admin.dashboard');
                        } elseif (in_array('client', $roles)) {
                            $dashboardRoute = route('client.dashboard');
                        } elseif (in_array('employee', $roles)) {
                            $dashboardRoute = route('employee.dashboard');
                        } else {
                            $dashboardRoute = route('dashboard'); // Fallback for users without a role
                        }
                    @endphp

                    <a href="{{ $dashboardRoute }}" class="px-3 py-2 text-lg font-medium transition rounded-md text-secondary hover:text-primary hover:bg-secondary">
                        Dashboard
                    </a>
                @endauth
                </div>

                <!-- register / login -->
                <div class="items-center hidden space-x-6 md:flex">

                    <div>
                        @guest
                            <a href="{{ route('register') }}" class="px-6 py-1 mr-4 text-lg font-medium transition-all rounded-md text-secondary hover:text-primary hover:bg-secondary">
                                Register
                            </a>

                            <a href="{{ route('login') }}" class="px-6 py-1 text-lg font-medium transition-all rounded-md text-secondary hover:text-primary hover:bg-secondary">
                                Login
                            </a>
                        @endguest

                        @auth
                            <!-- logout -->
                            <livewire:auth.logout />
                        @endauth
                    </div>

                </div>

                <!-- dark / light -->
                <div x-data="{ darkMode: false }">
                    <!-- Dark / Light Mode Toggle Button -->
                    <button id="darkModeToggle" class="p-2 rounded" @click="darkMode = !darkMode">
                        <!-- Sun icon for dark mode -->
                        <div x-show="darkMode" class="w-6 h-6">
                            <img src="{{ Vite::asset('resources/svg/moon.svg') }}" alt="Moon Icon">
                        </div>
                        <!-- Moon icon for light mode -->
                        <div x-show="!darkMode" class="w-6 h-6">
                            <img src="{{ Vite::asset('resources/svg/sun.svg') }}" alt="Sun Icon">
                        </div>
                    </button>
                </div>

            </div>

            <!-- Mobile Menu Button (Hidden on larger screens) -->
            <button @click="open = ! open" class="px-3 py-2 text-lg font-medium transition rounded-md md:hidden text-tertiary hover:text-secondary">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu (Toggles based on "open" state) -->
    <div x-show="open" class="md:hidden bg-tertiary ">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            @guest
                <a href="{{ url('/') }}" class="block px-3 py-2 text-base font-medium rounded-md text-secondary dark:text-secondary hover:text-primary dark:hover:text-primary">
                    Home
                </a>
                <a href="{{ url('/about') }}" class="block px-3 py-2 text-base font-medium rounded-md text-secondary dark:text-secondary hover:text-primary dark:hover:text-primary">
                    About
                </a>
                <a href="{{ url('/contact') }}" class="block px-3 py-2 text-base font-medium rounded-md text-secondary dark:text-secondary hover:text-primary dark:hover:text-primary">
                    Contact
                </a>
                <a href="{{ route('register') }}" class="block px-3 py-2 text-base font-medium rounded-md text-secondary dark:text-secondary hover:text-primary dark:hover:text-primary">
                    Register
                </a>
            @endguest
        </div>
    </div>
</nav>
