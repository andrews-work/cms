<?php

namespace App\Livewire\Components\Calendar;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Show extends Component
{

    public $view = 'monthly';

    public function switchView($view)
    {
        $this->view = $view;
    }

    public function render()
    {
        Log::info("Rendering Show component.");
        return view('livewire.components.calendar.show');
    }
}
