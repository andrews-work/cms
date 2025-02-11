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
                <h2 class="text-xl font-semibold text-secondary">Create Meeting</h2>
                <button @click="showCreateForm = false" class="text-gray-600 hover:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="mt-4">
                <form wire:submit.prevent="submit">
                    <!-- Meeting Date -->
                    <div class="mb-4">
                        <label for="meeting_date" class="block text-sm font-medium text-secondary">
                            Meeting Date
                        </label>
                        <input type="date" id="meeting_date" wire:model="meeting_date"
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" required>
                        @error('meeting_date') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Meeting Time -->
                    <div class="mb-4">
                        <label for="meeting_time" class="block text-sm font-medium text-secondary">
                            Meeting Time
                        </label>
                        <select id="meeting_time" wire:model="meeting_time"
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" required>
                            <option value="" disabled selected>Select Meeting Time</option>
                            @foreach (range(9, 18) as $hour)
                                @foreach (['00', '15', '30', '45'] as $minute) <!-- 15 minute intervals -->
                                    <option value="{{ sprintf('%02d:%02d', $hour, $minute) }}">
                                        {{ sprintf('%02d:%02d', $hour, $minute) }}
                                    </option>
                                @endforeach
                            @endforeach
                        </select>
                        @error('meeting_time') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Duration -->
                    <div class="mb-4">
                        <label for="duration" class="block text-sm font-medium text-secondary">
                            Duration (Minutes)
                        </label>
                        <select id="duration" wire:model="duration"
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" required>
                            <option value="" disabled selected>Select Duration</option>
                            @foreach (range(15, 90, 15) as $duration) <!-- 15-minute intervals up to 90 -->
                                <option value="{{ $duration }}">{{ $duration }} minutes</option>
                            @endforeach
                        </select>
                        @error('duration') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>


                    <!-- Client Selection -->
                    <div class="mb-4">
                        <label for="client_id" class="block text-sm font-medium text-secondary">
                            Select Client
                        </label>
                        <select id="client_id" wire:model="client_id"
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                            <option value="">Select Client</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                        @error('client_id') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Modal Footer -->
                    <div class="flex justify-end mt-6">
                        <button type="button" @click="showCreateForm = false" class="px-4 py-2 text-white bg-red-500 rounded">Cancel</button>
                        <button type="submit" class="px-4 py-2 ml-2 text-white bg-blue-500 rounded">Save Meeting</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
