<form wire:submit="submit">
    <!-- email -->
    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-secondary dark:text-primary">
            Email
        </label>
        <input
            type="email"
            id="email"
            wire:model="email"
            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary dark:bg-secondary dark:text-primary dark:border-primary dark:focus:ring-primary dark:focus:border-primary"
        >
        @error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
    </div>

    <!-- password -->
    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-secondary dark:text-primary">
            Password
        </label>
        <input
            type="password"
            id="password"
            wire:model="password"
            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary dark:bg-secondary dark:text-primary dark:border-primary dark:focus:ring-primary dark:focus:border-primary"
        >
        @error('password') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
    </div>

    <!-- submit -->
    <div class="mt-6 text-center">
        <button type="submit" class="w-full px-3 py-2 rounded-md bg-secondary text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary dark:bg-primary dark:text-secondary dark:border-primary dark:focus:ring-primary dark:focus:border-primary">
            Login
        </button>
    </div>

    <!-- Forgot password -->
    <div class="mt-6 text-center">
        <button type="button" wire:click="$dispatch('redirect', '/forget')" class="w-full px-3 py-2 rounded-md bg-primary text-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-secondary dark:bg-primary dark:text-secondary dark:border-primary dark:focus:ring-primary dark:focus:border-primary">
            Forgot Password
        </button>
    </div>
</form>
