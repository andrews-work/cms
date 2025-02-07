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
                <form action="{{ route('contact') }}" method="POST">
                    @csrf

                    <!-- Meeting Date -->
                    <div class="mb-4">
                        <label for="meeting_date" class="block text-sm font-medium text-secondary">
                            Meeting Date
                        </label>
                        <input type="date" id="meeting_date" name="meeting_date" value="{{ old('meeting_date') }}"
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" required>
                        @error('meeting_date')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Meeting Time -->
                    <div class="mb-4">
                        <label for="meeting_time" class="block text-sm font-medium text-secondary">
                            Meeting Time
                        </label>
                        <input type="time" id="meeting_time" name="meeting_time" value="{{ old('meeting_time') }}"
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" required>
                        @error('meeting_time')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Duration -->
                    <div class="mb-4">
                        <label for="duration" class="block text-sm font-medium text-secondary">
                            Duration (Minutes)
                        </label>
                        <input type="number" id="duration" name="duration" value="{{ old('duration') }}"
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" min="1">
                        @error('duration')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-secondary">
                            Description
                        </label>
                        <textarea id="description" name="description" class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Notes -->
                    <div class="mb-4">
                        <label for="notes" class="block text-sm font-medium text-secondary">
                            Notes
                        </label>
                        <textarea id="notes" name="notes" class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">{{ old('notes') }}</textarea>
                        @error('notes')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- File Upload -->
                    <div class="mb-4">
                        <label for="files" class="block text-sm font-medium text-secondary">
                            Attach Files
                        </label>
                        <input type="file" id="files" name="files[]" multiple
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                        @error('files')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
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
