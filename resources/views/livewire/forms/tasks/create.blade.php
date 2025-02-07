<div x-data="{ showCreateForm: @entangle('showCreateForm') }">
    <!-- Button to trigger modal -->
    <button @click="showCreateForm = true" class="px-4 py-2 mb-6 border rounded border-secondary text-secondary">
        Create Task
    </button>

    <!-- Modal Background -->
    <div x-show="showCreateForm" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-show.transition.opacity="showCreateForm" class="fixed inset-0 z-50 bg-gray-500 bg-opacity-50"></div>

    <!-- Modal Content -->
    <div x-show="showCreateForm" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-95" x-transition:enter-end="opacity-100 transform scale-100" x-show.transition.opacity="showCreateForm" class="fixed inset-0 z-50 flex items-center justify-center">
        <div class="p-6 border rounded-lg shadow-lg bg-primary border-secondary text-secondary w-96">
            <!-- Modal Header -->
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold text-secondary">Create Task</h2>
                <button @click="showCreateForm = false" class="text-gray-600 hover:text-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="mt-4">
                <form wire:submit.prevent="submit">
                    <!-- User ID -->
                    <div class="mb-4">
                        <label for="user_id" class="block text-sm font-medium text-secondary">
                            User ID (assign task)
                        </label>
                        <input type="number" wire:model="user_id" id="user_id" placeholder="User ID"
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" required>
                        @error('user_id') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-secondary">
                            Task Title
                        </label>
                        <input type="text" wire:model="title" id="title" placeholder="Task Title"
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary" required>
                        @error('title') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Note -->
                    <div class="mb-4">
                        <label for="note" class="block text-sm font-medium text-secondary">
                            Note
                        </label>
                        <textarea wire:model="note" id="note" placeholder="Task Note"
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"></textarea>
                        @error('note') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Due Date -->
                    <div class="mb-4">
                        <label for="due_date" class="block text-sm font-medium text-secondary">
                            Due Date
                        </label>
                        <input type="date" wire:model="due_date" id="due_date" placeholder="Due Date"
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                        @error('due_date') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Category -->
                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-secondary">
                            Category
                        </label>
                        <select wire:model="category" id="category"
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                            <option value="personal">Personal</option>
                            <option value="business">Business</option>
                        </select>
                        @error('category') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Client -->
                    <div class="mb-4">
                        <label for="client" class="block text-sm font-medium text-secondary">
                            Client (Optional)
                        </label>
                        <input type="text" wire:model="client" id="client" placeholder="Client"
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                        @error('client') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Docs -->
                    <div class="mb-4">
                        <label for="docs" class="block text-sm font-medium text-secondary">
                            Docs (Optional)
                        </label>
                        <input type="text" wire:model="docs" id="docs" placeholder="Docs"
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                        @error('docs') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Tag -->
                    <div class="mb-4">
                        <label for="tag" class="block text-sm font-medium text-secondary">
                            Tag
                        </label>
                        <input type="text" wire:model="tag" id="tag" placeholder="Tag"
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                        @error('tag') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- URL -->
                    <div class="mb-4">
                        <label for="url" class="block text-sm font-medium text-secondary">
                            URL (Optional)
                        </label>
                        <input type="url" wire:model="url" id="url" placeholder="URL"
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                        @error('url') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Files -->
                    <div class="mb-4">
                        <label for="files" class="block text-sm font-medium text-secondary">
                            Attach Files (Optional)
                        </label>
                        <input type="file" wire:model="files" id="files" multiple
                            class="block px-3 py-2 mt-1 border rounded-md shadow-sm bg-primary text-secondary border-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary">
                        @error('files') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                    </div>

                    <!-- Modal Footer -->
                    <div class="flex justify-end mt-6">
                        <button type="button" @click="showCreateForm = false" class="px-4 py-2 text-white bg-red-500 rounded">Cancel</button>
                        <button type="submit" class="px-4 py-2 ml-2 text-white bg-blue-500 rounded">Save Task</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
