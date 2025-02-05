<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Role;

class Register extends Component
{
    // validate
    #[Validate('required|email|unique:users,email')]
    public $email = '';

    #[Validate('required|string|min:8|confirmed')]
    public $password = '';
    public $password_confirmation = '';

    // submit
    public function submit()
    {
        Log::info('register form - submit');

        // validate
        $this->validate();

        // create user in the database
        $user = User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // Get the 'client' role from the roles table
        $clientRole = Role::where('name', 'client')->first();

        // Assign the client role to the new user
        if ($clientRole) {
            $user->roles()->attach($clientRole->id);
        }

        // success message
        session()->flash('message', 'Registration successful!');

        // redirect to login page
        return $this->redirect('/login', navigate: true);

        Log::info('redirect - login');
    }

    // render
    public function render()
    {
        Log::info('register form - render');

        return view('livewire.forms.register');
    }
}
