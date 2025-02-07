<?php

namespace App\Livewire\Components\Calendar;

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Meeting; // Import the Meeting model

class Monthly extends Component
{
    public $currentMonth;
    public $currentYear;
    public $daysInMonth;
    public $firstDayOfMonth;
    public $days;
    public $meetings; // Hold meetings for the month

    public function mount()
    {
        $today = Carbon::now();
        $this->currentMonth = $today->format('F');
        $this->currentYear = $today->year;
        $this->daysInMonth = $today->daysInMonth;
        $this->firstDayOfMonth = Carbon::createFromDate($this->currentYear, $today->month, 1)->dayOfWeek;
        $this->generateCalendar();

        // Fetch meetings for the current month
        $this->meetings = Meeting::whereMonth('meeting_date', $today->month)
            ->whereYear('meeting_date', $today->year)
            ->get();
    }

    public function generateCalendar()
    {
        $this->days = [];
        // Fill the array with leading empty days for the first day of the month
        for ($i = 0; $i < $this->firstDayOfMonth; $i++) {
            $this->days[] = null;
        }
        // Add days of the month
        for ($i = 1; $i <= $this->daysInMonth; $i++) {
            $this->days[] = $i;
        }
    }

    // Method to check if there's a meeting on a given day
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
