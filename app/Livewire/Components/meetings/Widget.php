<?php

namespace App\Livewire\Components\Meetings;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Meeting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;

class Widget extends Component
{
    public $nextMeeting;
    public $meetingTimeFormatted;
    public $meetingDay;
    public $timeUntilMeeting;
    public $attendee;
    public $name;

    public function mount()
    {
        $userId = Auth::id();
        Log::info('User ID:', ['user_id' => $userId]);

        $this->nextMeeting = Meeting::where('user_id', $userId)
            ->where(function ($query) {
                $query->whereRaw('DATE(meeting_date) = ?', [Carbon::now()->format('Y-m-d')])
                    ->whereRaw('TIME(meeting_time) > ?', [Carbon::now()->format('H:i:s')]);
            })
            ->orWhereRaw('CONCAT(meeting_date, " ", meeting_time) > ?', [Carbon::now()->toDateTimeString()])
            ->orderBy('meeting_date', 'asc')
            ->orderBy('meeting_time', 'asc')
            ->first();

        Log::info('Next meeting details:', ['nextMeeting' => $this->nextMeeting]);

        if ($this->nextMeeting) {
            $meetingDateTime = Carbon::parse($this->nextMeeting->meeting_date . ' ' . $this->nextMeeting->meeting_time);
            $this->meetingTimeFormatted = $meetingDateTime->format('g:ia');
            $this->meetingDay = $meetingDateTime->isToday() ? 'today' : ($meetingDateTime->isTomorrow() ? 'tomorrow' : $meetingDateTime->format('l'));
            $timeDifference = $meetingDateTime->diffForHumans(Carbon::now());
            $this->timeUntilMeeting = preg_replace('/\s*after$/', '', $timeDifference);
        }
    }

    #[On('updatedName')]
    public function updateCity()
    {
        Log::info('Updated name - received in weather widget');

        $this->name = Auth::user()->name;

        return view();
    }


    public function render()
    {
        return view('livewire.components.meetings.widget');
    }
}
