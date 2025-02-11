<?php

namespace App\Livewire\Forms\Meetings;

use App\Livewire\Components\Meetings\Show;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Log;
use App\Models\Meeting;
use App\Models\User;

class Create extends Component
{
    // Show/Hide the modal
    public $showCreateForm = false;

    // Meeting fields
    #[Validate('required|date')]
    public $meeting_date;

    #[Validate('required|date_format:H:i')]
    public $meeting_time;

    #[Validate('required|integer|min:1')]
    public $duration;

    // Client selection
    public $client_id;

    // Method to toggle modal visibility
    public function toggleCreateForm()
    {
        $this->showCreateForm = !$this->showCreateForm;
    }

    // Method to handle form submission
    public function submit()
    {
        Log::info('Creating new meeting', [
            'date' => $this->meeting_date,
            'time' => $this->meeting_time,
            'duration' => $this->duration,
            'client_id' => $this->client_id,
        ]);

        // Validate the form
        $this->validate();

        Log::info('Meeting validated');

        // Create the meeting record
        $meeting = Meeting::create([
            'user_id' => auth()->id(), // The employee creating the meeting
            'client_id' => $this->client_id, // The client selected
            'meeting_date' => $this->meeting_date,
            'meeting_time' => $this->meeting_time,
            'duration' => $this->duration,
        ]);

        $this->dispatch('meetingCreated')->to(Show::class);
        Log::info('Meeting dispatched to ShowMeetings');

        // Success message
        session()->flash('message', 'Meeting created successfully!');

        // Reset the form and close the modal
        $this->resetForm();
        $this->showCreateForm = false;
    }

    // Method to reset form fields
    public function resetForm()
    {
        $this->meeting_date = '';
        $this->meeting_time = '';
        $this->duration = '';
        $this->client_id = ''; // Reset client selection
    }

    // Render method
    public function render()
    {
        // Pass all users to the view (to populate the client dropdown)
        $clients = User::whereHas('roles', function($query) {
            $query->where('name', 'client'); // Assuming 'client' is a role
        })->get();

        return view('livewire.forms.meetings.create', compact('clients'));
    }
}
