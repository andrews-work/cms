<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\User;  

class UserTable extends Component
{
    public $users = [];

    public function mount($users = [])
    {
        $this->users = $users;
    }

    public function render()
    {
        return view('livewire.components.user-table');
    }
}
