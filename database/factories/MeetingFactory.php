<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MeetingFactory extends Factory
{
    public function definition(): array
    {
        $employee = User::whereHas('roles', function ($query) {
            $query->where('name', 'employee');
        })->inRandomOrder()->first();

        $client = User::whereHas('roles', function ($query) {
            $query->where('name', 'client');
        })->inRandomOrder()->first();

        $hours = rand(9, 18);
        $minutes = [0, 15, 30, 45];
        $minutes = $minutes[array_rand($minutes)];
        $meetingTime = sprintf('%02d:%02d', $hours, $minutes);

        return [
            'user_id' => $employee->id,
            'client_id' => $client ? $client->id : null,
            'meeting_date' => $this->faker->date(),
            'meeting_time' => $meetingTime,
            'duration' => rand(30, 120),
            'description' => $this->faker->sentence(6),
            'notes' => $this->faker->paragraph(2),
            'files' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
