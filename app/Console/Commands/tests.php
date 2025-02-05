<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class tests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:tests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run tests with the test database migrated and seeded';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Output the current DB configuration for debugging
        $this->info('Current database connection: ' . config('database.default'));
        $this->info('DB_DATABASE: ' . config('database.connections.mysql.database'));

        // Run migrations
        $this->info('Running migrations...');
        Artisan::call('migrate');

        // Seed the database
        $this->info('Seeding database...');
        Artisan::call('db:seed');

        // Run the tests
        $this->info('Running tests...');
        $result = Artisan::call('test');

        // Output the result of the test run
        $this->info($result);
    }
}
