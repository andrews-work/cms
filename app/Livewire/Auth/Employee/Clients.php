<?php

namespace App\Livewire\Auth\Employee;

use Livewire\Component;
use App\Models\Role;
use App\Models\User;

class Clients extends Component
{
    public $users = [];
    public $roles = [];

    public function mount()
    {
        $this->roles = Role::client()->get();

        $this->users = User::whereHas('roles', function ($query) {
            $query->where('name', 'client');
        })->get();
    }

    public function render()
    {
        return view('livewire.auth.employee.clients');
    }
}
