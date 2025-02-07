<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        // roles exist
        $roles = ['admin', 'client', 'employee'];
        $roles = Role::whereIn('name', $roles)->pluck('id', 'name');

        if ($roles->count() !== 3) {
            throw new \Exception('One or more roles not found in the database.');
        }

        // roles
        $this->createUser('admin@admin.com', 'Admin', 'password', $roles['admin']);
        $this->createUser('client@client.com', 'Client', 'password', $roles['client']);
        $this->createUser('emp@emp.com', 'Employee', 'password', $roles['employee']);

        // clients - test
        for ($i = 1; $i <= 10; $i++) {
            $this->createUser("client{$i}@client.com", "Test Client {$i}", 'password', $roles['client']);
        }
    }

    private function createUser($email, $name, $password, $roleId)
    {
        $user = User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => bcrypt($password),
            ]
        );
        $user->roles()->sync([$roleId]);
    }
}
