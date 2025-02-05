<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UpdateEmail extends Component
{
    // Declare public properties for the email
    #[Validate('required|email|unique:users,email')]
    public $email;

    // Constructor to pre-fill the email field with the authenticated user's email
    public function mount()
    {
        $this -> email = Auth::user() -> email;
    }

    // Method to handle the email update
    public function updateEmail()
    {
        Log::info('Email update initiated');

        // Validate the input (using the new Livewire 3.0 validation approach)
        $this -> validate();

        try {
            // Retrieve the authenticated user
            $user = Auth::user();

            // Update the user's email
            $user -> email = $this -> email;
            $user -> save();

            // Log the update
            Log::info("User updated their email to: {$user->email}");

            // Flash success message to the session
            session() -> flash('message', 'Email updated successfully!');

        } catch (\Exception $e) {
            // Log the error and show a failure message
            Log::error('Error updating email: ' . $e -> getMessage());
            session() -> flash('error', 'Something went wrong. Please try again.');
        }
    }

    // Render the component view
    public function render()
    {
        return view('livewire.forms.update-email');
    }
}
