<section x-data="{ open: false, darkMode: localStorage.getItem('theme') === 'dark' }"
         x-init="darkMode = localStorage.getItem('theme') === 'dark';"
         class="border-b bg-primary dark:bg-primary border-secondary">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <!-- name -->
            @auth
                <p class="text-secondary dark:text-secondary">G'day, {{ auth()->user()->name }}!</p>
            @endauth

            <!-- weather -->
            <div class="flex">
                <livewire:components.weather-widget />
            </div>

            <!-- meeting -->
            <div class="flex">
                <livewire:components.meetings.widget />
            </div>

            <!-- profile -->
            <div>
                <!-- Dark mode profile icon -->
                <a href="{{ route('profile') }}">
                    <div x-show="darkMode" class="w-6 h-6">
                        <img id="userDarkIcon" alt="User Icon" src="/path/to/user-dark-icon.svg">
                    </div>
                </a>
                <!-- Light mode profile icon -->
                <a href="{{ route('profile') }}">
                    <div x-show="!darkMode" class="w-6 h-6">
                        <img id="userLightIcon" alt="User Icon" src="/path/to/user-light-icon.svg">
                    </div>
                </a>
            </div>

            <!-- Dark / Light Mode Toggle Button -->
            <div x-data="{ darkMode: localStorage.getItem('theme') === 'dark' }"
                x-init="darkMode = localStorage.getItem('theme') === 'dark';"
                class="ml-4">
                <button @click="darkMode = !darkMode; localStorage.setItem('theme', darkMode ? 'dark' : 'light')">
                    <!-- Sun icon for dark mode -->
                    <div x-show="darkMode" class="w-6 h-6">
                        <img id="moonIcon" alt="Moon Icon" src="/path/to/dark-mode-icon.svg">
                    </div>
                    <!-- Moon icon for light mode -->
                    <div x-show="!darkMode" class="w-6 h-6">
                        <img id="sunIcon" alt="Sun Icon" src="/path/to/light-mode-icon.svg">
                    </div>
                </button>
            </div>

        </div>
    </div>
</section>
