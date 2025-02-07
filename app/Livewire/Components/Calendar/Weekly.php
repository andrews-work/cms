<?php

namespace App\Livewire\Components\Calendar;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Meeting;
use Illuminate\Support\Facades\Log;

class Weekly extends Component
{
    public $weekDays;
    public $meetings;

    public function mount()
    {
        $this->generateWeek();
        $this->fetchMeetingsForWeek();
    }

    public function generateWeek()
    {
        $today = Carbon::today();

        $this->weekDays = [];

        for ($i = 0; $i < 7; $i++) {
            $this->weekDays[] = $today->copy()->addDays($i);
        }
    }

    public function fetchMeetingsForWeek()
    {
        $today = Carbon::today();
        $startOfWeek = $today->format('Y-m-d');
        $endOfWeek = $today->copy()->addDays(6)->format('Y-m-d');

        Log::info("Fetching meetings between $startOfWeek and $endOfWeek");

        $this->meetings = Meeting::whereBetween('meeting_date', [$startOfWeek, $endOfWeek])
            ->get()
            ->map(function ($meeting) {
                $meeting->meeting_date = Carbon::parse($meeting->meeting_date);
                return $meeting;
            });

        Log::info($this->meetings);
    }

    public function render()
    {
        return view('livewire.components.calendar.weekly');
    }
}
