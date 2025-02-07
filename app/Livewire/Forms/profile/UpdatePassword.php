<?php

namespace App\Livewire\Forms\Profile;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UpdatePassword extends Component
{
    // validate
    #[Validate('required|string')]
    public $current_password;

    #[Validate('required|string|min:8|confirmed')]
    public $new_password;

    #[Validate('required|string|min:8')]
    public $new_password_confirmation;

    // update password
    public function updatePassword()
    {
        Log::info('password update');

        $this->validate();

        try {
            $user = Auth::user();

            if (!Hash::check($this->current_password, $user->password)) {
                session()->flash('error', 'The current password is incorrect.');
                return;
            }

            $user->password = Hash::make($this->new_password);
            $user->save();

            session()->flash('message', 'Password updated successfully!');

        } catch (\Exception $e) {
            Log::error('Error updating password: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.forms.profile.update-password');
    }
}
