<?php

namespace App\Livewire\Components\Meetings;

use Livewire\Component;

class Meetings extends Component
{
    public $showCreateForm = false;

    public function toggleCreateForm()
    {
        $this->showCreateForm = !$this->showCreateForm;
    }

    public function render()
    {
        return view('livewire.components.meetings.meetings');
    }
}
