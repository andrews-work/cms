<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class WeatherWidget extends Component
{
    public $weatherData;

    public function mount()
    {
        $this->fetchWeatherData();
    }

    public function fetchWeatherData()
    {
        $user = Auth::user();

        if ($user && $user->city) {
            $apiKey = config('services.weather.api');
            $city = $user->city;
            $url = "https://api.openweathermap.org/data/2.5/weather?q={$city}&appid={$apiKey}&units=metric";

            Log::info('Fetching weather data from URL:', ['url' => $url]);

            $response = Http::get($url);

            Log::info('API Response:', [
                'status' => $response->status(),
                'body' => $response->body(),
            ]);

            if ($response->successful()) {
                $this->weatherData = $response->json();
                $this->weatherData['main']['temp'] = floor($this->weatherData['main']['temp']);
                $this->weatherData['cloud_icon_url'] = $this->getCloudIconUrl($this->weatherData['weather'][0]['icon']);
                $this->weatherData['wind']['speed_kmh'] = floor($this->convertWindSpeedToKmh($this->weatherData['wind']['speed']));
                Log::info('Weather data fetched successfully:', $this->weatherData);
            } else {
                $this->weatherData = null;
                Log::error('Failed to fetch weather data:', [
                    'status' => $response->status(),
                    'error' => $response->body(),
                ]);
            }
        } else {
            $this->weatherData = null;
            Log::error('User not authenticated or city not set.');
        }
    }

    protected function getCloudIconUrl($iconCode)
    {
        return "https://openweathermap.org/img/wn/{$iconCode}@2x.png";
    }

    protected function convertWindSpeedToKmh($windSpeedMps)
    {
        return $windSpeedMps * 3.6;
    }

    public function render()
    {
        return view('livewire.components.weather-widget', [
            'weatherData' => $this->weatherData,
        ]);
    }
}
