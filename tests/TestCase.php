<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use RefreshDatabase;

    /**
     * Helper method to log in as an Admin.
     *
     * @return \App\Models\User
     */
    public function loginAdmin()
    {
        // Create a user and assign the 'admin' role
        $user = User::factory()->create();
        $user->hasRole('admin');

        // Log in the user
        Auth::login($user);

        return $user;
    }

    /**
     * Helper method to log in as an Employee.
     *
     * @return \App\Models\User
     */
    public function loginEmployee()
    {
        // Create a user and assign the 'employee' role
        $user = User::factory()->create();
        $user->hasRole('employee');

        // Log in the user
        Auth::login($user);

        return $user;
    }

    /**
     * Helper method to log in as a Client.
     *
     * @return \App\Models\User
     */
    public function loginClient()
    {
        // Create a user and assign the 'client' role
        $user = User::factory()->create();
        $user->hasRole('client');

        // Log in the user
        Auth::login($user);

        return $user;
    }
}
