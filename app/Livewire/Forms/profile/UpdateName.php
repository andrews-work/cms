<?php

namespace App\Livewire\Forms\Profile;

use App\Livewire\Components\Meetings\Widget;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UpdateName extends Component
{
    #[Validate('required|string|max:255')]
    public $name = '';

    public function mount()
    {
        $this -> name = Auth::user() -> name;
    }

    public function updateName()
    {
        $this -> validate();

        try {
            $user = Auth::user();

            $user -> name = $this -> name;
            $user -> save();

            session() -> flash('message', 'name updated successfully');
            $this->dispatch('updatedName')->to(Widget::class);
            Log::info('updated name');

        } catch (\Exception $e) {

            Log::error('Error updating name: ' . $e -> getMessage());
            session() -> flash('error', 'Something went wrong. Please try again.');
        }
    }

    public function render()
    {
        return view('livewire.forms.profile.update-name');
    }
}
