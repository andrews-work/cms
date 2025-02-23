<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\MeetingSeeder;
use Database\Seeders\TasksSeeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Check and log if RoleSeeder exists
        if (class_exists(RoleSeeder::class)) {
            Log::info('RoleSeeder class exists. Starting seeder...');
            $this->call(RoleSeeder::class);
        } else {
            Log::warning('RoleSeeder class does not exist.');
        }

        // Check and log if TasksSeeder exists
        // if (class_exists(TasksSeeder::class)) {
        //     Log::info('TasksSeeder class exists. Starting seeder...');
        //     $this->call(TasksSeeder::class);
        // } else {
        //     Log::warning('TasksSeeder class does not exist.');
        // }

        // Check and log if UserSeeder exists
        if (class_exists(UserSeeder::class)) {
            Log::info('UserSeeder class exists. Starting seeder...');
            $this->call(UserSeeder::class);
        } else {
            Log::warning('UserSeeder class does not exist.');
        }

        // Check and log if MeetingSeeder exists
        if (class_exists(MeetingSeeder::class)) {
            Log::info('MeetingSeeder class exists. Starting seeder...');
            $this->call(MeetingSeeder::class);
        } else {
            Log::warning('MeetingSeeder class does not exist.');
        }
    }
}
