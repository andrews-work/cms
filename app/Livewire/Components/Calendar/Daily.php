<?php

namespace App\Livewire\Components\Calendar;

use Livewire\Component;
use Carbon\Carbon;

class Daily extends Component
{
    public $currentDay;
    public $currentDate;
    public $events;

    public function mount()
    {
        $this->currentDate = Carbon::now(); // Get current date
        $this->currentDay = $this->currentDate->format('l, F j, Y'); // Format for the day (e.g. "Wednesday, February 7, 2025")

        $this->loadEvents(); // Load events for today
    }

    public function loadEvents()
    {
        // Assuming you're using an Event model or something similar
        // $this->events = Event::whereDate('event_date', $this->currentDate)->get();

        // For demo purposes, let's mock some events:
        $this->events = [
            [
                'title' => 'Morning Meeting',
                'description' => 'Discussing project milestones.',
                'start_time' => '9:00 AM',
                'end_time' => '10:00 AM',
            ],
            [
                'title' => 'Lunch Break',
                'description' => 'Take a break and relax.',
                'start_time' => '12:00 PM',
                'end_time' => '1:00 PM',
            ],
            [
                'title' => 'Team Sync',
                'description' => 'Aligning tasks for the week.',
                'start_time' => '2:00 PM',
                'end_time' => '3:00 PM',
            ]
        ];
    }

    public function render()
    {
        return view('livewire.components.calendar.daily');
    }
}
