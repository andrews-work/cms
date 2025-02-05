<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    // validate
    #[Validate('required|email')]
    public $email = '';

    #[Validate('required|string|min:8')]
    public $password = '';

    // submit
    public function submit()
    {
        // validate
        $this->validate();

        // attempt to authenticate the user
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {

            $user = Auth::user();
            $roles = $user->roles->pluck('name')->toArray();

            // redirect
            if (in_array('admin', $roles)) {

                session()->flash('message', 'Login successful!');
                return $this->redirect('/admin/dashboard', navigate: true);

            } elseif (in_array('client', $roles)) {

                session()->flash('message', 'Login successful!');
                return $this->redirect('/client/dashboard', navigate: true);

            } elseif (in_array('employee', $roles)) {

                session()->flash('message', 'Login successful!');
                return $this->redirect('/employee/dashboard', navigate: true);

            } else {

                session()->flash('message', 'Login successful!');
                return $this->redirect('/dashboard', navigate: true);
            }

        // auth failed
        } else {
            Log::warning('Authentication failed for email: ' . $this->email);
            $this->addError('email', 'Invalid credentials. Please try again.');
        }
    }

    public function render()
    {
        Log::info('Login form - render method triggered.');
        return view('livewire.forms.login');
    }
}
