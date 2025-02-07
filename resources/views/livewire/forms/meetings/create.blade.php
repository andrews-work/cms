<div x-data="{ showCreateForm: @entangle('showCreateForm') }">
    <!-- Button to trigger modal -->
    <button @click="showCreateForm = true" class="px-4 py-2 mb-6 border rounded border-secondary text-secondary">
        Create Meeting
    </button>

    <!-- Modal Background -->
    <div x-show="showCreateForm" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-show.transition.opacity="showCreateForm" class="fixed inset-0 z-50 bg-gray-500 bg-opacity-50"></div>

    <!-- Modal Content -->
    <div x-show="showCreateForm" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-show.transition.opacity="showCreateForm" class="fixed inset-0 z-50 flex items-center justify-center">

        <div class="p-6 rounded-lg shadow-lg bg-tertiary w-96">
            <!-- Modal Header -->
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold">Create Meeting</h2>
                <button @click="showCreateForm = false" class="text-gray-600 hover:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="mt-4">
                <h3>Here is your form for creating a meeting (we'll add the form fields later).</h3>
            </div>

            <!-- Modal Footer -->
            <div class="flex justify-end mt-6">
                <button @click="showCreateForm = false" class="px-4 py-2 text-white bg-red-500 rounded">Cancel</button>
                <button class="px-4 py-2 ml-2 text-white bg-blue-500 rounded">Save Meeting</button>
            </div>
        </div>

    </div>
</div>
