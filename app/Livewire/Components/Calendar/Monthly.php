<?php

namespace App\Livewire\Components\Calendar;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Meeting;

class Monthly extends Component
{
    public $currentMonth;
    public $currentYear;
    public $daysInMonth;
    public $firstDayOfMonth;
    public $days;
    public $meetings;

    public function mount()
    {
        $today = Carbon::now();
        $this->currentMonth = $today->format('F');
        $this->currentYear = $today->year;
        $this->daysInMonth = $today->daysInMonth;
        $this->firstDayOfMonth = Carbon::createFromDate($this->currentYear, $today->month, 1)->dayOfWeek;
        $this->generateCalendar();

        $this->meetings = Meeting::whereMonth('meeting_date', $today->month)
            ->whereYear('meeting_date', $today->year)
            ->get();
    }

    public function generateCalendar()
    {
        $this->days = [];

        for ($i = 0; $i < $this->firstDayOfMonth; $i++) {
            $this->days[] = null;
        }

        for ($i = 1; $i <= $this->daysInMonth; $i++) {
            $this->days[] = $i;
        }
    }

    public function hasMeeting($day)
    {
        $date = Carbon::create($this->currentYear, Carbon::parse($this->currentMonth)->month, $day);
        return $this->meetings->contains('meeting_date', $date->format('Y-m-d'));
    }

    public function render()
    {
        return view('livewire.components.calendar.monthly');
    }
}
