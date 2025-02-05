<div class="w-1/5">
    <h2 class="mb-4 text-2xl font-semibold">Update Email</h2>

    <!-- success -->
    @if (session()->has('message'))
        <div class="p-4 mb-4 text-green-700 bg-green-200 rounded-md">
            {{ session('message') }}
        </div>
    @endif

    <!-- error -->
    @if (session()->has('error'))
        <div class="p-4 mb-4 text-red-700 bg-red-200 rounded-md">
            {{ session('error') }}
        </div>
    @endif

    <form wire:submit.prevent="updateEmail">

        <!-- Email Input -->
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-secondary dark:text-primary">Email</label>
            <input
                type="email"
                id="email"
                wire:model="email"
                class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary dark:bg-secondary dark:text-primary dark:border-primary dark:focus:ring-primary dark:focus:border-primary"
            >
            @error('email') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="w-full px-3 py-2 rounded-md bg-secondary text-primary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary dark:bg-primary dark:text-secondary dark:border-primary dark:focus:ring-primary dark:focus:border-primary">
                Update Email
            </button>
        </div>

    </form>
</div>
