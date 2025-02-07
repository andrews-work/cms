<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Role;

class MeetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Instantiate Faker
        $faker = Faker::create();

        // Define a base start date
        $startDate = Carbon::now()->addDays(1); // Starting from tomorrow

        // Retrieve only employees with the role of 'employee'
        $employeeRole = Role::where('name', 'employee')->first(); // Fetch the 'employee' role

        if (!$employeeRole) {
            throw new \Exception('No "employee" role found in the database!');
        }

        // Retrieve users with the 'employee' role
        $employees = $employeeRole->users; // Assuming the Role model has a users relationship

        // Ensure there are employees in the database
        if ($employees->isEmpty()) {
            throw new \Exception('No employees found in the database!');
        }

        // Create 15 different meetings for employees
        for ($i = 0; $i < 15; $i++) {
            // Randomly pick an employee for each meeting
            $employee = $employees->random(); // Random employee

            // Randomize meeting time between 9:00 AM and 6:00 PM with a break between hours
            $meetingTime = $this->getRandomTime();

            // Use Faker to generate some random meeting description and notes
            $description = $faker->sentence(6); // Random sentence for meeting description
            $notes = $faker->paragraph(2); // Random paragraph for meeting notes

            DB::table('meetings')->insert([
                'user_id' => $employee->id, // Employee creates the meeting
                'meeting_date' => $startDate->toDateString(), // Random date, starting from tomorrow
                'meeting_time' => $meetingTime,
                'duration' => rand(30, 120), // Random duration between 30 to 120 minutes
                'description' => $description,
                'notes' => $notes,
                'files' => null, // No files for now
                // 'client_id' => null, // No client for now
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Move to the next day for the next meeting
            $startDate->addDay();
        }
    }

    // Helper function to generate a random time between 9 AM and 6 PM
    private function getRandomTime()
    {
        $hours = rand(9, 18); // Hours between 9 AM and 6 PM
        $minutes = [0, 15, 30, 45]; // Random minutes in a quarter-hour format
        $minutes = $minutes[array_rand($minutes)]; // Pick a random minute

        return sprintf('%02d:%02d', $hours, $minutes); // Format time as HH:MM
    }
}
