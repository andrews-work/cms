<footer x-data="{ darkMode: document.documentElement.classList.contains('dark') }" class="py-8 border-t border-secondary bg-primary dark:bg-primary">
    <div class="container mx-auto text-center">

        <!-- text-->
        <p class="text-lg font-medium text-secondary dark:text-secondary">
            Because she competes with no one, no one can compete with her.
        </p>

        <!-- links -->
        <div class="flex justify-center mt-6 space-x-8">
            <a href="{{ route('home') }}" class="px-3 py-2 text-lg font-medium transition rounded-md text-secondary dark:text-tertiary hover:text-secondary dark:hover:text-secondary active:text-four dark:active:text-four">
                Home
            </a>
            <a href="{{ route('about') }}" class="px-3 py-2 text-lg font-medium transition rounded-md text-secondary dark:text-tertiary hover:text-secondary dark:hover:text-secondary active:text-primary dark:active:text-primary">
                About
            </a>
            <a href="{{ route('contact') }}" class="px-3 py-2 text-lg font-medium transition rounded-md text-secondary dark:text-tertiary hover:text-secondary dark:hover:text-secondary active:text-primary dark:active:text-primary">
                Contact
            </a>
        </div>
    </div>
</footer>
