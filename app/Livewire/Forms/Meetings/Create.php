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
    public $showCreateForm = false;

    #[Validate('required|date')]
    public $meeting_date;

    #[Validate('required|date_format:H:i')]
    public $meeting_time;

    #[Validate('required|integer|min:1')]
    public $duration;

    public $client_id;

    public function toggleCreateForm()
    {
        $this->showCreateForm = !$this->showCreateForm;
    }

    public function submit()
    {
        Log::info('Creating new meeting', [
            'date' => $this->meeting_date,
            'time' => $this->meeting_time,
            'duration' => $this->duration,
            'client_id' => $this->client_id,
        ]);

        $this->validate();

        Log::info('Meeting validated');

        $meeting = Meeting::create([
            'user_id' => auth()->id(),
            'client_id' => $this->client_id,
            'meeting_date' => $this->meeting_date,
            'meeting_time' => $this->meeting_time,
            'duration' => $this->duration,
        ]);

        $this->dispatch('meetingCreated')->to(Show::class);
        Log::info('Meeting dispatched to ShowMeetings');

        session()->flash('message', 'Meeting created successfully!');

        $this->resetForm();
        $this->showCreateForm = false;
    }

    public function resetForm()
    {
        $this->meeting_date = '';
        $this->meeting_time = '';
        $this->duration = '';
        $this->client_id = '';
    }

    public function render()
    {
        $clients = User::whereHas('roles', function($query) {
            $query->where('name', 'client');
        })->get();

        return view('livewire.forms.meetings.create', compact('clients'));
    }
}
