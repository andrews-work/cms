<form wire:submit="submit">
    <!-- email -->
    <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-secondary">
            Email
        </label>
        <input
            type="email"
            id="email"
            wire:model="email"
            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
        >
        @error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
    </div>

    <!-- password -->
    <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-secondary ">
            Password
        </label>
        <input
            type="password"
            id="password"
            wire:model="password"
            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
        >
        @error('password') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
    </div>

    <!-- submit -->
    <div class="mt-6 text-center">
        <button type="submit" class="w-full px-3 py-2 rounded-md text-secondary border-primary hover:bg-tertiary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
            Login
        </button>
    </div>

    <!-- Forgot password -->
    <div class="mt-6 text-center">
        <button type="button" wire:click="$dispatch('redirect', '/forget')" class="w-full px-3 py-2 rounded-md bg-tertiary text-primary hover:bg-secondary hover:text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
            Forgot Password
        </button>
    </div>
</form>
