<?php

namespace App\Livewire\Forms\Meetings;

use App\Livewire\Components\Meetings\Show;
use Livewire\Component;
use App\Models\Meeting;
use Illuminate\Support\Facades\Log;

class Delete extends Component
{

    public $meetingId;

    public function cancelMeeting()
    {
        if (auth()->check()) {
            Log::info('cancel meeting');
            $meeting = Meeting::find($this->meetingId);
            Log::info('Meeting ID: ' . $this->meetingId); // Logging the meetingId to verify

            if ($meeting) {
                $meeting->delete();
                session()->flash('message', 'Meeting canceled successfully.');
            }

            // Dispatch the event after the meeting has been deleted
            $this->dispatch('meetingCancelled', ['id' => $this->meetingId])->to(Show::class);
            Log::info('Dispatched cancel meeting');
        } else {
            session()->flash('error', 'You must be logged in to cancel a meeting.');
            Log::warning('Unauthenticated user tried to cancel meeting');
        }
    }

    public function render()
    {
        return view('livewire.forms.meetings.delete');
    }
}
