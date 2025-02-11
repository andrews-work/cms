<div class="w-1/5">
    <h2 class="mb-4 text-2xl font-semibold">City</h2>

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

    <form wire:submit.prevent="updateCity">
        <!-- City Input -->
        <div class="mb-4">
            <label for="city" class="block text-sm font-medium text-secondary">City</label>
            <input
                type="text"
                id="city"
                wire:model="city"
                class="block w-full px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
            >
            @error('city') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="w-full px-3 py-2 rounded-md hover:border hover:border-secondary text-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                Update City
            </button>
        </div>

    </form>

</div>
