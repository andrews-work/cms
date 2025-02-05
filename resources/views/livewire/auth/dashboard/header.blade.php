<section x-data="{ open: false, darkMode: localStorage.getItem('theme') === 'dark' }" x-init="darkMode = localStorage.getItem('theme') === 'dark';" class="border-b bg-primary dark:bg-primary border-secondary">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

        <div class="flex items-center justify-between h-16">
            @auth
                <p class="text-secondary dark:text-secondary">G'day, {{ auth()->user()->name }}!</p>
            @endauth

            <div class="flex">
                <h1 class="text-secondary dark:text-secondary">time</h1>
                <h1 class="text-secondary dark:text-secondary">weather</h1>
            </div>

            <div>
                <!-- Dark mode user icon -->
                <a href="{{ route('profile') }}">
                    <div x-show="darkMode" class="w-6 h-6">
                        <img src="{{ Vite::asset('resources/svg/user-d.svg') }}" alt="user icon">
                    </div>
                </a>
                <!-- Light mode user icon -->
                <a href="{{ route('profile') }}">
                    <div x-show="!darkMode" class="w-6 h-6">
                        <img src="{{ Vite::asset('resources/svg/user.svg') }}" alt="user icon">
                    </div>
                </a>
            </div>

        </div>

    </div>
</section>
