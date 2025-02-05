<?php

namespace App\Livewire\Forms;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UpdateCity extends Component
{
    #[Validate('nullable|string|max:255')]
    public $city = '';

    public function mount()
    {
        $this -> city = Auth::user() -> city;
    }

    public function updateCity()
    {
        // Validate the input
        $this->validate();

        try {
            $user = Auth::user();

            // If city is provided (not null or empty), we update it
            if ($this->city !== $user->city) {
                // Save the new city value
                $user->city = $this->city;
                $user->save();

                session()->flash('message', 'City updated successfully!');
            } else {
                // If the city hasn't changed, let the user know
                session()->flash('message', 'No changes were made to the city.');
            }
        } catch (\Exception $e) {
            // Log the error and flash a failure message
            Log::error('Error updating city: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong. Please try again.');
        }
    }


    public function render()
    {
        return view('livewire.forms.update-city');
    }
}
