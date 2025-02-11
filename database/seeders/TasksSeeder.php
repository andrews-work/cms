<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TasksSeeder extends Seeder
{
    public function run()
    {
        foreach (range(1, 15) as $index) {
            DB::table('tasks')->insert([
                'user_id' => 3,
                'title' => 'Task ' . $index,
                'note' => 'This is the note for task ' . $index,
                'category' => $index % 2 == 0 ? 'business' : 'personal',
                'due_date' => Carbon::now()->addDays(rand(1, 30))->format('Y-m-d'),
                'client' => rand(0, 1) ? 'Client ' . rand(1, 5) : null,
                'docs' => rand(0, 1) ? 'Document ' . rand(1, 3) : null,
                'tag' => 'tag' . $index,
                'url' => 'https://example.com/task' . $index,
                'files' => rand(0, 1) ? 'file' . rand(1, 3) . '.pdf' : null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
