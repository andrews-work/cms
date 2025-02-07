<div class="flex flex-col p-6 justify-evenly text-secondary min-w-7xl">
    <div class="text-center mt-[5vh]">
        <h1 class="text-4xl font-semibold">Weekly Calendar</h1>
    </div>

    <div class="grid grid-cols-7 gap-4 mt-[7vh]">
    @foreach ($weekDays as $day)
        <div class="relative py-6 text-center transition-all duration-300 ease-in-out border-2 rounded-lg cursor-pointer w-34 h-[50vh] hover:scale-105">
            <div class="text-lg font-bold">
                {{ $day->format('D') }}
            </div>
            <div class="text-lg font-semibold">
                {{ $day->format('M j') }}
            </div>

            {{-- Display meetings for the day --}}
            @foreach ($meetings as $meeting)
                @if ($day->isSameDay($meeting->meeting_date))  {{-- Compare Carbon dates --}}
                    <div class="absolute text-xs text-sm bottom-2 left-2">
                        <p class="font-medium">{{ $meeting->client_name }}</p>
                        <p class="text-xs">{{ \Carbon\Carbon::parse($meeting->meeting_time)->format('g:i A') }}</p>
                    </div>
                @endif
            @endforeach
        </div>
    @endforeach

    </div>
</div>
