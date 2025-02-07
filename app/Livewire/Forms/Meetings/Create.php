<?php

namespace App\Livewire\Forms\Meetings;

use Livewire\Component;

class Create extends Component
{
    // This variable controls whether the modal is shown or not
    public $showCreateForm = false;

    // Toggle visibility of the modal
    public function toggleCreateForm()
    {
        $this->showCreateForm = !$this->showCreateForm;
    }

    public function render()
    {
        return view('livewire.forms.meetings.create');
    }
}
