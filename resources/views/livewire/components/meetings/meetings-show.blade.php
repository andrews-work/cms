<div>

    @if($meetings->isEmpty())
        <p>No meetings scheduled.</p>
    @else

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

                    <div class="flex-1 space-y-2 ">
                        <div>
                            <!-- dark -->
                            <a href="{{ route('profile') }}">
                                <div x-show="darkMode" class="w-6 h-6">
                                    <img src="{{ Vite::asset('resources/svg/user-d.svg') }}" alt="user icon">
                                </div>
                            </a>

                            <!-- light -->
                            <a href="{{ route('profile') }}">
                                <div x-show="!darkMode" class="w-6 h-6">
                                    <img src="{{ Vite::asset('resources/svg/user.svg') }}" alt="user icon">
                                </div>
                            </a>

                        </div>
                        <div>
                            <!-- dark -->
                            <a href="{{ route('profile') }}">
                                <div x-show="darkMode" class="w-6 h-6">
                                    <img src="{{ Vite::asset('resources/svg/user-d.svg') }}" alt="user icon">
                                </div>
                            </a>

                            <!-- light -->
                            <a href="{{ route('profile') }}">
                                <div x-show="!darkMode" class="w-6 h-6">
                                    <img src="{{ Vite::asset('resources/svg/user.svg') }}" alt="user icon">
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    @endif
</div>
