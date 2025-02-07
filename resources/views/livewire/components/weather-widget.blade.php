<div class="flex items-center">
    @if ($weatherData)

        <h1 class="text-secondary">
            {{ $weatherData['main']['temp'] }}°C
        </h1>

        <h1 class="mx-2 text-secondary"></h1>

        <img src="{{ $weatherData['cloud_icon_url'] }}" alt="Weather Icon" style="width: 40px; height: 40px;" />

        <h1 class="mx-2 text-secondary"></h1>

        <h1 class="text-secondary">
            {{ $weatherData['wind']['speed_kmh'] }} km/h
        </h1>

    @else
        <h1 class="text-secondary">Update city in profile</h1>
    @endif
</div>
