<?php

namespace App\Livewire\Forms\Profile;

use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Livewire\Components\WeatherWidget;

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
        $this->validate();

        try {
            $user = Auth::user();

            if ($this->city !== $user->city) {

                $user->city = $this->city;
                $user->save();

                session()->flash('message', 'City updated successfully!');

                $this -> dispatch('cityUpdate')->to(WeatherWidget::class);
                Log::info('updated city');
            } else {

                session()->flash('message', 'No changes were made to the city.');
            }
        } catch (\Exception $e) {

            Log::error('Error updating city: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong. Please try again.');
        }
    }


    public function render()
    {
        return view('livewire.forms.profile.update-city');
    }
}
