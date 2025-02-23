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
        $admin = User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        $admin->hasRole('admin');

        $response = $this->post('/login', [
            'email' => 'admin@admin.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/admin/dashboard');

        $this->assertAuthenticatedAs($admin);
    }
}
