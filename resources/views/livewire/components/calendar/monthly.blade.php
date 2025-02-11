<div class="flex flex-col p-6 justify-evenly text-secondary">
    <div class="text-center mt-[5vh]">
        <h1 class="text-4xl font-semibold">{{ $currentMonth }} {{ $currentYear }}</h1>
    </div>

    <div class="grid grid-cols-7 gap-4 mt-[7vh]">
        <div class="py-2 text-xl font-bold text-center">Sun</div>
        <div class="py-2 text-xl font-bold text-center">Mon</div>
        <div class="py-2 text-xl font-bold text-center">Tue</div>
        <div class="py-2 text-xl font-bold text-center">Wed</div>
        <div class="py-2 text-xl font-bold text-center">Thu</div>
        <div class="py-2 text-xl font-bold text-center">Fri</div>
        <div class="py-2 text-xl font-bold text-center">Sat</div>

        @foreach ($days as $day)
            <div wire:click="selectDay({{ $day }})"
                class="relative text-center py-6 w-25 h-36 border border-tertiary rounded-lg cursor-pointer transition-all ease-in-out duration-300
                    {{ $day ? '' : 'border-none' }}
                    {{ $day == \Carbon\Carbon::today()->day && \Carbon\Carbon::today()->month == \Carbon\Carbon::parse($currentYear . '-' . $currentMonth)->month && \Carbon\Carbon::today()->year == $currentYear ? 'bg-primary border border-secondary text-secondary font-bold' : '' }}
                    hover:bg-tertiary hover:scale-105
                    {{ $day && $this->hasMeeting($day) ? 'bg-primary' : '' }}">

                @if ($day)
                    <span class="absolute text-lg font-semibold top-2 left-2">{{ $day }}</span>

                    {{-- Display meeting details --}}
                    @if ($this->hasMeeting($day))
                        @php
                            $meeting = $this->getMeetingDetails($day);
                            $meetingTime = \Carbon\Carbon::parse($meeting->meeting_time)->format('g:i A'); // Convert to Carbon instance and format
                        @endphp
                        <div class="absolute flex text-xs bottom-2 left-2">
                            <div class="flex items-center space-x-1">
                                <span class="font-medium">{{ $meetingTime }}</span>
                            </div>
                            <div class="flex items-center ml-2 space-x-1">
                                <span>w/ {{ $meeting->client ? $meeting->client->name : 'No client assigned' }}</span>
                            </div>
                        </div>
                    @endif
                @else
                    &nbsp;
                @endif
            </div>
        @endforeach
    </div>
</div>
