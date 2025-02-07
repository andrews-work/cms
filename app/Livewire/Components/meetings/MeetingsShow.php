<?php

namespace App\Livewire\Components\Meetings;

use Livewire\Component;
use App\Models\Meeting;

class MeetingsShow extends Component
{
    public $meetings;

    public function mount()
    {
        $this->meetings = Meeting::all();
    }

    public function render()
    {
        return view('livewire.components.meetings.meetings-show');
    }
}
