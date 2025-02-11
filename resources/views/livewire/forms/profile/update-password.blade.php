<div class="w-1/5">
    <h2 class="mb-4 text-2xl font-semibold">Password</h2>

    <!-- Success Message -->
    @if (session()->has('message'))
        <div class="p-4 mb-4 text-green-700 bg-green-200 rounded-md">
            {{ session('message') }}
        </div>
    @endif

    <!-- Error Message -->
    @if (session()->has('error'))
        <div class="p-4 mb-4 text-red-700 bg-red-200 rounded-md">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="updatePassword">
        <!-- Current Password -->
        <div class="mb-4">
            <label for="current_password" class="block text-sm font-medium text-secondary">Current</label>
            <input
                type="password"
                id="current_password"
                wire:model="current_password"
                class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
            >
            @error('current_password') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- New Password -->
        <div class="mb-4">
            <label for="new_password" class="block text-sm font-medium text-secondary">New</label>
            <input
                type="password"
                id="new_password"
                wire:model="new_password"
                class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
            >
            @error('new_password') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Confirm New Password -->
        <div class="mb-4">
            <label for="new_password_confirmation" class="block text-sm font-medium text-secondary">Confirm</label>
            <input
                type="password"
                id="new_password_confirmation"
                wire:model="new_password_confirmation"
                class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
            >
            @error('new_password_confirmation') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="w-full px-3 py-2 rounded-md hover:border hover:border-secondary text-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                Change Password
            </button>
        </div>
    </form>
</div>
