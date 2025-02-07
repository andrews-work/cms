<div class="p-6 text-secondary">
    <!-- Display the current day -->
    <h1 class="text-4xl font-semibold text-center">{{ $currentDay }}</h1>

    <!-- If there are no events for the day -->
    @if (empty($events))
        <p class="mt-4 text-center">No events for today.</p>
    @else
        <!-- List the events for the day -->
        <div class="mt-6 space-y-4">
            @foreach ($events as $event)
                <div class="p-4 border rounded-md shadow-md bg-primary border-secondary">
                    <h2 class="text-xl font-semibold">{{ $event['title'] }}</h2>
                    <p class="text-sm text-gray-600">{{ $event['start_time'] }} - {{ $event['end_time'] }}</p>
                    <p class="mt-2">{{ $event['description'] }}</p>
                </div>
            @endforeach
        </div>
    @endif
</div>
