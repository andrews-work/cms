<div x-data="{ openCancelModal: false, darkMode: false }">

    <button @click="openCancelModal = true" class="mt-4 text-red-500 hover:underline">
        <div x-show="!darkMode" class="w-6 h-6">
            <img src="{{ Vite::asset('resources/svg/delete.svg') }}" alt="cancel icon light">
        </div>

        <div x-show="darkMode" class="w-6 h-6">
            <img src="{{ Vite::asset('resources/svg/delete-d.svg') }}" alt="cancel icon dark">
        </div>
    </button>

    <div x-show="openCancelModal" x-transition class="fixed inset-0 flex items-center justify-center bg-gray-600 bg-opacity-50">
        <div class="p-6 bg-white rounded-lg shadow-lg">
            <h2 class="mb-4 text-xl font-semibold">Are you sure you want to cancel this meeting?</h2>
            <div class="flex justify-end gap-4">
                <button @click="openCancelModal = false" class="px-4 py-2 bg-gray-200 rounded-lg">No, Keep it</button>
                <button wire:click="cancelMeeting" class="px-4 py-2 text-white bg-red-500 rounded-lg">
                    Yes, Cancel
                </button>
            </div>
        </div>
    </div>

</div>
