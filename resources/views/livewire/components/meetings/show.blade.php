<div>
    @if($meetings->isEmpty())
        <p>No meetings scheduled.</p>
    @else
        <div class="flex w-[80vw] gap-6 py-4 overflow-x-auto">
        @foreach ($meetings as $meeting)
            <div class="min-w-[22vw] p-6 border h-[60vh] border-secondary rounded-lg shadow-lg bg-primary flex flex-col space-y-4">
                <h3 class="text-xl font-semibold text-center text-blue-600">
                    @if ($isEditing && $meetingBeingEdited === $meeting->id)
                        <input type="date" wire:model="meetingDate" class="p-2 border" />
                    @else
                        {{ \Carbon\Carbon::parse($meeting->meeting_date)->format('l, F j, Y') }}
                    @endif
                </h3>
                <div class="space-y-2">
                    <p><strong>Time:</strong>
                        @if ($isEditing && $meetingBeingEdited === $meeting->id)
                            <select wire:model="meetingTime" class="p-2 border">
                                <option value="" disabled selected>Select Meeting Time</option>
                                @foreach (range(9, 18) as $hour) <!-- 9 AM to 6 PM -->
                                    @foreach (['00', '15', '30', '45'] as $minute) <!-- 15 minute intervals -->
                                        <option value="{{ sprintf('%02d:%02d', $hour, $minute) }}">
                                            {{ sprintf('%02d:%02d', $hour, $minute) }}
                                        </option>
                                    @endforeach
                                @endforeach
                            </select>
                        @else
                            {{ \Carbon\Carbon::parse($meeting->meeting_time)->format('g:i A') }}
                        @endif
                    </p>

                    <p><strong>With:</strong>
                        @if ($isEditing && $meetingBeingEdited === $meeting->id)
                            <select wire:model="client_id" class="p-2 border">
                                @foreach($clients as $client)
                                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                                @endforeach
                            </select>
                        @else
                            {{ $meeting->client ? $meeting->client->name : 'No client assigned' }}
                        @endif
                    </p>

                    <p><strong>Duration:</strong>
                        @if ($isEditing && $meetingBeingEdited === $meeting->id)
                            <select wire:model="duration" class="p-2 border">
                                <option value="" disabled selected>Select Duration</option>
                                @foreach (range(15, 90, 15) as $duration) <!-- 15-minute intervals up to 90 -->
                                    <option value="{{ $duration }}">{{ $duration }} minutes</option>
                                @endforeach
                            </select>
                        @else
                            {{ $meeting->duration }} minutes
                        @endif
                    </p>

                </div>

                <div class="flex-1 space-y-2">
                    <p><strong>Description:</strong></p>
                    @if ($isEditing && $meetingBeingEdited === $meeting->id)
                        <textarea wire:model="description" class="p-2 border" rows="4">{{ $meeting->description }}</textarea>
                    @else
                        <p class="h-24 overflow-auto text-sm text-gray-700">{{ $meeting->description }}</p>
                    @endif
                </div>

                <div>
                    <p><strong>Notes:</strong>
                        @if ($isEditing && $meetingBeingEdited === $meeting->id)
                            <textarea wire:model="notes" class="p-2 border" rows="4">{{ $meeting->notes }}</textarea>
                        @else
                            {{ $meeting->notes ?? 'No additional notes' }}
                        @endif
                    </p>
                </div>

                <div class="flex-1 mt-4">
                    <strong>Files:</strong>
                    @if ($meeting->files)
                        <a href="{{ asset('storage/' . $meeting->files) }}" class="text-blue-500 hover:underline" target="_blank">View Files</a>
                    @else
                        <span class="text-gray-500">No files attached</span>
                    @endif
                </div>

                <div class="flex justify-between mt-4">
                    @if ($isEditing && $meetingBeingEdited === $meeting->id)
                        <div class="flex justify-between w-full space-x-4">
                            <button wire:click="toggleEditMode({{ $meeting->id }})" class="text-red-600">
                                <div x-data="{ darkMode: document.documentElement.classList.contains('dark') }">
                                    <div x-show="darkMode" class="w-6 h-6">
                                        <img src="{{ Vite::asset('resources/svg/cancel-d.svg') }}" alt="Cancel" class="w-6 h-6" />
                                    </div>
                                    <div x-show="!darkMode" class="w-6 h-6">
                                        <img src="{{ Vite::asset('resources/svg/cancel.svg') }}" alt="Cancel" class="w-6 h-6" />
                                    </div>
                                </div>
                            </button>
                            <button wire:click="saveMeeting({{ $meeting->id }})" class="px-4 py-2 text-white rounded">
                                <div x-data="{ darkMode: document.documentElement.classList.contains('dark') }">
                                    <div x-show="darkMode" class="w-6 h-6">
                                        <img src="{{ Vite::asset('resources/svg/save-d.svg') }}" alt="Save" class="w-6 h-6" />
                                    </div>
                                    <div x-show="!darkMode" class="w-6 h-6">
                                        <img src="{{ Vite::asset('resources/svg/save.svg') }}" alt="Save" class="w-6 h-6" />
                                    </div>
                                </div>
                            </button>
                            <button wire:click="deleteMeeting({{ $meeting->id }})" class="text-red-600">
                                <div x-data="{ darkMode: document.documentElement.classList.contains('dark') }">
                                    <div x-show="darkMode" class="w-6 h-6">
                                        <img src="{{ Vite::asset('resources/svg/delete-d.svg') }}" alt="Delete" class="w-6 h-6" />
                                    </div>
                                    <div x-show="!darkMode" class="w-6 h-6">
                                        <img src="{{ Vite::asset('resources/svg/delete.svg') }}" alt="Delete" class="w-6 h-6" />
                                    </div>
                                </div>
                            </button>
                        </div>
                    @else
                        <button wire:click="toggleEditMode({{ $meeting->id }})" class="text-blue-600">
                            <div x-data="{ darkMode: document.documentElement.classList.contains('dark') }">
                                <div x-show="darkMode" class="w-6 h-6">
                                    <img src="{{ Vite::asset('resources/svg/edit-d.svg') }}" alt="Edit" class="w-6 h-6" />
                                </div>
                                <div x-show="!darkMode" class="w-6 h-6">
                                    <img src="{{ Vite::asset('resources/svg/edit.svg') }}" alt="Edit" class="w-6 h-6" />
                                </div>
                            </div>
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
        </div>
    @endif
</div>
