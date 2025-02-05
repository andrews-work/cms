<?php

namespace Tests\Admin;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoutesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that an admin can log in and is redirected to the /admin/dashboard page.
     *
     * @return void
     */
    public function test_adminLogin_redirectDashboard()
    {
        // Create an admin user
        $admin = User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'), // Use a known password
        ]);
        $admin->hasRole('admin'); // Assign the 'admin' role

        // Submit the login form with the admin's credentials
        $response = $this->post('/login', [
            'email' => 'admin@admin.com',
            'password' => 'password',
        ]);

        // Assert that the admin is redirected to the /admin/dashboard page
        $response->assertRedirect('/admin/dashboard');

        // Assert that the admin is authenticated
        $this->assertAuthenticatedAs($admin);
    }
}
