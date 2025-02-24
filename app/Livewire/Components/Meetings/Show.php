<?php

namespace App\Livewire\Components\Meetings;

use Livewire\Component;
use App\Models\Meeting;
use App\Models\User;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class Show extends Component
{
    public $meetings;
    public $clients = [];
    public $isEditing = false;
    public $meetingBeingEdited = null;
    public $meetingDate;
    public $meetingTime;
    public $description;
    public $notes;
    public $duration;
    public $client_id;

    public function mount()
    {
        $this->clients = User::all();
        $this->loadMeetings();
    }

    public function loadMeetings()
    {
        $this->meetings = Meeting::with('client')
                                  ->orderBy('meeting_date', 'asc')
                                  ->orderBy('meeting_time', 'asc')
                                  ->get();
    }

    #[On('meetingCreated')]
    public function create()
    {
        Log::info('update meetings');
        $this->loadMeetings();
    }

    #[On('meetingCancelled')]
    public function cancel()
    {
        Log::info('cancel received');
        $this->loadMeetings();
    }

    #[On('meetingUpdated')]
    public function update()
    {
        Log::info('update received');
        $this->loadMeetings();
    }

    public function toggleEditMode($meetingId)
    {
        if ($this->meetingBeingEdited === $meetingId) {
            $this->isEditing = false;
            $this->meetingBeingEdited = null;
        } else {
            $this->isEditing = true;
            $this->meetingBeingEdited = $meetingId;

            $meeting = Meeting::find($meetingId);
            $this->meetingDate = $meeting->meeting_date ? \Carbon\Carbon::parse($meeting->meeting_date)->format('Y-m-d') : '';
            $this->meetingTime = $meeting->meeting_time;
            $this->description = $meeting->description;
            $this->notes = $meeting->notes;
            $this->duration = $meeting->duration;
            $this->client_id = $meeting->client_id;
        }
    }

    public function saveMeeting($meetingId)
    {
        $meeting = Meeting::find($meetingId);

        $meeting->meeting_date = $this->meetingDate;
        $meeting->meeting_time = $this->meetingTime;
        $meeting->description = $this->description;
        $meeting->notes = $this->notes;
        $meeting->duration = $this->duration;
        $meeting->client_id = $this->client_id;

        $meeting->save();

        $this->loadMeetings();

        $this->toggleEditMode($meetingId);
    }

    public function deleteMeeting($meetingId)
    {
        $meeting = Meeting::find($meetingId);
        $meeting->delete();
        $this->loadMeetings();
    }

    public function render()
    {
        return view('livewire.components.meetings.show');
    }
}
