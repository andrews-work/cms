<?php

namespace App\Livewire\Components\Meetings;

use Livewire\Component;
use App\Models\Meeting;
use Livewire\Attributes\On;

class Edit extends Component
{
    public $isEditing = false; // To track edit state

    public $meetingId;

    // Toggle the edit mode
    public function toggleEditMode()
    {
        $this->isEditing = !$this->isEditing;
    }

    public function render()
    {
        return view('livewire.components.meetings.edit');
    }
}
