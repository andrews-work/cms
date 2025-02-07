<?php

namespace App\Livewire\Components\Calendar;

use Livewire\Component;
use Carbon\Carbon;

class Weekly extends Component
{
    public $weekDays;

    public function mount()
    {
        $this->generateWeek();
    }

    public function generateWeek()
    {
        // Get the current date
        $today = Carbon::today();

        // Start the week from today
        $this->weekDays = [];

        // Generate the next 7 days starting from today
        for ($i = 0; $i < 7; $i++) {
            $this->weekDays[] = $today->copy()->addDays($i);
        }
    }

    public function render()
    {
        return view('livewire.components.calendar.weekly');
    }
}
