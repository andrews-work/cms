<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Admin User
        $adminRole = Role::where('name', 'admin')->first();
        $clientRole = Role::where('name', 'client')->first();
        $employeeRole = Role::where('name', 'employee')->first();

        $adminUser = User::updateOrCreate(
            ['email' => 'admin@admin.com'], // Check if the email already exists
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
            ]
        );
        $adminUser->roles()->sync([$adminRole->id]);  // Use sync to avoid duplicates

        // Client User
        $clientUser = User::updateOrCreate(
            ['email' => 'client@client.com'],
            [
                'name' => 'Client',
                'password' => bcrypt('password'),
            ]
        );
        $clientUser->roles()->sync([$clientRole->id]);  // Use sync to avoid duplicates

        // Employee User
        $employeeUser = User::updateOrCreate(
            ['email' => 'emp@emp.com'],
            [
                'name' => 'Employee',
                'password' => bcrypt('password'),
            ]
        );
        $employeeUser->roles()->sync([$employeeRole->id]);  // Use sync to avoid duplicates
    }
}
