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
            ['email' => 'admin@admin.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
            ]
        );
        $adminUser->roles()->sync([$adminRole->id]);

        // Client User
        $clientUser = User::updateOrCreate(
            ['email' => 'client@client.com'],
            [
                'name' => 'Client',
                'password' => bcrypt('password'),
            ]
        );
        $clientUser->roles()->sync([$clientRole->id]);

        // Employee User
        $employeeUser = User::updateOrCreate(
            ['email' => 'emp@emp.com'],
            [
                'name' => 'Employee',
                'password' => bcrypt('password'),
            ]
        );
        $employeeUser->roles()->sync([$employeeRole->id]);
    }
}
