<?php

namespace App\Livewire\Components\Meetings;

use Livewire\Component;
use App\Models\Meeting;
use App\Models\User;  // Load all users
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;

class Show extends Component
{
    public $meetings;
    public $clients = []; // Array to hold all users (clients)
    public $isEditing = false;  // Flag to determine if we're in edit mode
    public $meetingBeingEdited = null;  // ID of the meeting currently being edited
    public $meetingDate;
    public $meetingTime;
    public $description;
    public $notes;
    public $duration;
    public $client_id;  // The client being assigned to the meeting when editing

    public function mount()
    {
        // Assuming users are clients, remove any reference to 'role'
        $this->clients = User::all(); // Get all users as potential clients
        $this->loadMeetings();
    }

    // Function to load meetings with clients
    public function loadMeetings()
    {
        // Eager load the 'client' relationship
        $this->meetings = Meeting::with('client')
                                  ->orderBy('meeting_date', 'asc')
                                  ->orderBy('meeting_time', 'asc')
                                  ->get();
    }

    // Listen for the meetingCreated event
    #[On('meetingCreated')]
    public function create()
    {
        Log::info('update meetings');
        $this->loadMeetings();
    }

    // Listen for the meetingCancelled event to refresh the meeting list
    #[On('meetingCancelled')]
    public function cancel()
    {
        Log::info('cancel received');
        $this->loadMeetings(); // Reload the meetings after a delete
    }

    // Listen for the meetingUpdated event
    #[On('meetingUpdated')]
    public function update()
    {
        Log::info('update received');
        $this->loadMeetings();
    }

    // Toggle edit mode for a specific meeting
    public function toggleEditMode($meetingId)
    {
        if ($this->meetingBeingEdited === $meetingId) {
            $this->isEditing = false;
            $this->meetingBeingEdited = null;
        } else {
            $this->isEditing = true;
            $this->meetingBeingEdited = $meetingId;

            // Load current data into editable fields
            $meeting = Meeting::find($meetingId);
            $this->meetingDate = $meeting->meeting_date ? \Carbon\Carbon::parse($meeting->meeting_date)->format('Y-m-d') : '';
            $this->meetingTime = $meeting->meeting_time;
            $this->description = $meeting->description;
            $this->notes = $meeting->notes;
            $this->duration = $meeting->duration;
            $this->client_id = $meeting->client_id;  // Set the client_id for editing
        }
    }

    // Save the meeting changes to the database
    public function saveMeeting($meetingId)
    {
        // Find the meeting to update
        $meeting = Meeting::find($meetingId);

        // Update the meeting data
        $meeting->meeting_date = $this->meetingDate;
        $meeting->meeting_time = $this->meetingTime;
        $meeting->description = $this->description;
        $meeting->notes = $this->notes;
        $meeting->duration = $this->duration;
        $meeting->client_id = $this->client_id;  // Update client

        // Save changes
        $meeting->save();

        // Reload the meetings to reflect the changes
        $this->loadMeetings();

        // Exit edit mode
        $this->toggleEditMode($meetingId);
    }

    // Delete meeting
    public function deleteMeeting($meetingId)
    {
        $meeting = Meeting::find($meetingId);
        $meeting->delete();
        $this->loadMeetings(); // Reload meetings after deletion
    }

    public function render()
    {
        return view('livewire.components.meetings.show');
    }
}
