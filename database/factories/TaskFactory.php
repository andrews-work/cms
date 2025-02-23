<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        $user = User::inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'title' => $this->faker->sentence(),
            'note' => $this->faker->text(),
            'category' => $this->faker->randomElement(['business', 'personal']),
            'due_date' => Carbon::now()->addDays(rand(1, 30))->format('Y-m-d'),
            'client' => $this->faker->optional()->company(),
            'docs' => $this->faker->optional()->word(),
            'tag' => $this->faker->word(),
            'url' => $this->faker->optional()->url(),
            'files' => $this->faker->optional()->word() . '.pdf',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
