<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\User;
use App\Models\Role;

class UserTable extends Component
{
    public $users = [];
    public $roles = [];
    public $selectedRole;
    public $editingUserId = null;

    public function mount($users = [])
    {
        $this->users = $users;
        $this->roles = Role::all();
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->delete();
            $this->users = User::all();
        }
    }

    public function startEditing($userId)
    {
        $this->editingUserId = $userId;

        if ($userId) {
            $user = User::find($userId);
            $this->selectedRole = $user->roles->first()->id ?? null;
        } else {
            $this->selectedRole = null;
        }
    }

    public function updateRole($userId, $roleId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->roles()->sync([$roleId]);
            $this->editingUserId = null;
            $this->users = User::all();
        }
    }

    public function render()
    {
        return view('livewire.components.user-table');
    }
}
