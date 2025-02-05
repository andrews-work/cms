<?php

namespace Tests\Auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class RoutesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test that an admin can access the /profile page.
     *
     * @return void
     */
    // public function test_admin_can_access_profile_page()
    // {
    //     // Log in as an admin
    //     $admin = $this->loginAdmin();

    //     // Follow the redirection to the dashboard after login
    //     $response = $this->get('/admin/dashboard');
    //     $response->assertStatus(200); // Ensure the dashboard page loads successfully

    //     // Now, attempt to access the /profile page
    //     $response = $this->get('/profile');

    //     // Assert that the response status is 200 (OK)
    //     $response->assertStatus(200);

    //     // Optionally, assert that the correct view is being returned
    //     $response->assertViewIs('profile');
    // }

    /**
     * Test that an employee can access the /profile page.
     *
     * @return void
     */
    // public function test_employee_can_access_profile_page()
    // {
    //     // Log in as an employee
    //     $employee = $this->loginEmployee();

    //     // Attempt to access the /profile page
    //     $response = $this->get('/profile');

    //     // Assert that the response status is 200 (OK)
    //     $response->assertStatus(200);

    //     // Optionally, assert that the correct view is being returned
    //     $response->assertViewIs('profile');
    // }

    // /**
    //  * Test that a client can access the /profile page.
    //  *
    //  * @return void
    //  */
    // public function test_client_can_access_profile_page()
    // {
    //     // Log in as a client
    //     $client = $this->loginClient();

    //     // Attempt to access the /profile page
    //     $response = $this->get('/profile');

    //     // Assert that the response status is 200 (OK)
    //     $response->assertStatus(200);

    //     // Optionally, assert that the correct view is being returned
    //     $response->assertViewIs('profile');
    // }
}
