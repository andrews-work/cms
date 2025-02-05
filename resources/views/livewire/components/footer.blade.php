<footer x-data="{ darkMode: document.documentElement.classList.contains('dark') }" class=" border-t border-secondary bg-primary dark:bg-primary py-8">
    <div class="container mx-auto text-center">
        <!-- Footer Content -->
        <p class="text-lg text-secondary dark:text-secondary font-medium">
            Because she competes with no one, no one can compete with her.
        </p>

        <!-- Footer Links -->
        <div class="mt-6 flex justify-center space-x-8">
            <a href="{{ route('home') }}" class="text-secondary dark:text-tertiary hover:text-secondary dark:hover:text-secondary active:text-four dark:active:text-four px-3 py-2 rounded-md text-lg font-medium transition">
                Home
            </a>
            <a href="{{ route('about') }}" class="text-secondary dark:text-tertiary hover:text-secondary dark:hover:text-secondary active:text-primary dark:active:text-primary px-3 py-2 rounded-md text-lg font-medium transition">
                About
            </a>
            <a href="{{ route('contact') }}" class="text-secondary dark:text-tertiary hover:text-secondary dark:hover:text-secondary active:text-primary dark:active:text-primary px-3 py-2 rounded-md text-lg font-medium transition">
                Contact
            </a>
        </div>
    </div>
</footer>
