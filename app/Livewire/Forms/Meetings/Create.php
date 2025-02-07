<?php

namespace App\Livewire\Forms\Meetings;

use Livewire\Component;

class Create extends Component
{
    public $showCreateForm = false;

    public function toggleCreateForm()
    {
        $this->showCreateForm = !$this->showCreateForm;
    }

    public function render()
    {
        return view('livewire.forms.meetings.create');
    }
}
