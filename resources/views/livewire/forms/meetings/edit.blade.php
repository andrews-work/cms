<div>
    <button wire:click="toggleEditMode" class="text-blue-600">
        @if($isEditing)
            <!-- X Icon to cancel edit -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        @else
            <!-- Edit Icon to start editing -->
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3H6a2 2 0 00-2 2v13a2 2 0 002 2h12a2 2 0 002-2V9l-7-7H6a2 2 0 00-2 2v13"/>
            </svg>
        @endif
    </button>

    <!-- Conditional content when in edit mode -->
    <div x-show="!$isEditing">
        <!-- Show View (Currently Same as Edit) -->
        <div class="flex w-[80vw] gap-6 py-4 overflow-x-auto">
            @foreach ($meetings as $meeting)
                <div class="min-w-[22vw] p-6 border h-[60vh] border-secondary rounded-lg shadow-lg bg-primary flex flex-col space-y-4">
                    <h3 class="text-xl font-semibold text-center text-blue-600">
                        {{ \Carbon\Carbon::parse($meeting->meeting_date)->format('l, F j, Y') }}
                    </h3>
                    <div class="space-y-2">
                        <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($meeting->meeting_time)->format('g:i A') }}</p>
                        <p><strong>With:</strong> Client</p>
                        <p><strong>Duration:</strong> {{ $meeting->duration }} minutes</p>
                    </div>

                    <div class="flex-1 space-y-2">
                        <p><strong>Description:</strong></p>
                        <p class="h-24 overflow-auto text-sm text-gray-700">{{ $meeting->description }}</p>
                    </div>
                    <div>
                        <p><strong>Notes:</strong> {{ $meeting->notes ?? 'No additional notes' }}</p>
                    </div>

                    <div class="flex-1 mt-4">
                        <strong>Files:</strong>
                        @if ($meeting->files)
                            <a href="{{ asset('storage/' . $meeting->files) }}" class="text-blue-500 hover:underline" target="_blank">View Files</a>
                        @else
                            <span class="text-gray-500">No files attached</span>
                        @endif
                    </div>

                    <div class="flex mt-4">
                        <div class="justify-between">
                            <livewire:forms.meetings.delete :meetingId="$meeting->id" />
                        </div>
                        <div class="justify-between">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div x-show="$isEditing">
        <!-- Edit view can be added here -->
        <!-- You can copy content or adjust this area with input fields -->
        <p>Edit Mode Activated</p>
    </div>
</div>
