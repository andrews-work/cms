<div class="flex">
    @if ($nextMeeting)
        <h1 class="text-secondary dark:text-secondary">
            Next meeting:
            <a href="{{ route('employee.meetings', $nextMeeting->id) }}" class="hover:underline">
                {{ $meetingDay }} - {{ $meetingTimeFormatted }}
            </a>
            w/
            <a href="{{ route('admin.users', $nextMeeting->attendee->id ?? '#') }}" class="text-blue-600 hover:underline">
                {{ $attendee ?? 'client' }}
            </a>
            | {{ $timeUntilMeeting }}
        </h1>
    @else
        <h1 class="text-secondary dark:text-secondary">
            No upcoming meetings.
        </h1>
    @endif
</div>
