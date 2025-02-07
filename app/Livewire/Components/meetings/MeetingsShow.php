<?php

namespace App\Livewire\Components\Meetings;

use Livewire\Component;
use App\Models\Meeting; // Import the Meeting model

class MeetingsShow extends Component
{
    // Fetch meetings from the database
    public $meetings;

    public function mount()
    {
        // Fetch meetings (you can add more filters here as needed)
        $this->meetings = Meeting::all();
    }

    public function render()
    {
        return view('livewire.components.meetings.meetings-show');
    }
}
