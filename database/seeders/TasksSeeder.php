<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use App\Models\User;

class TasksSeeder extends Seeder
{
    public function run()
    {
        // Get a list of users
        $users = User::limit(6)->get(); // Assuming you want tasks for 6 users

        // For each user, create 6 tasks
        foreach ($users as $user) {
            \App\Models\Task::factory(6)->create(['user_id' => $user->id]); // Creates 6 tasks for each user
        }
    }
}

