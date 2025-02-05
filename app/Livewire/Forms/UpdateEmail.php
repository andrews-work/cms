<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UpdateEmail extends Component
{
    #[Validate('required|email|unique:users,email')]
    public $email;

    public function mount()
    {
        $this -> email = Auth::user() -> email;
    }

    public function updateEmail()
    {
        Log::info('Email update initiated');

        $this -> validate();

        try {
            $user = Auth::user();

            // update
            $user -> email = $this -> email;
            $user -> save();


            Log::info("User updated their email to: {$user->email}");
            session() -> flash('message', 'Email updated successfully!');

        } catch (\Exception $e) {

            Log::error('Error updating email: ' . $e -> getMessage());
            session() -> flash('error', 'Something went wrong. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.forms.update-email');
    }
}
