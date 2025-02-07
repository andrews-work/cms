<?php

namespace App\Livewire\Auth\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;

class UserList extends Component
{
    public $tabs = [
        '1' => 'All',
        '2' => 'Admins',
        '3' => "Employee's",
        '4' => "Client's",
        '5' => "Visitor's",
    ];

    public $selectedTab = '1';
    public $users = [];

    public $tabValues = [
        '1' => 'Users List',
        '2' => 'Hello from Tab 2',
        '3' => 'Hello from Tab 3',
        '4' => 'Hello from Tab 4',
        '5' => 'Coming later once i do session/cookies/cache',
    ];

    public function loadTabContent($tab)
    {
        Log::info("Selected Tab: " . $tab);

        switch ($tab) {
            case '1':
                $this->users = User::all();
                break;
            case '2':
                $this->users = User::whereHas('roles', function ($query) {
                    $query->where('name', 'admin');
                })->get();
                break;
            case '3':
                $this->users = User::whereHas('roles', function ($query) {
                    $query->where('name', 'employee');
                })->get();
                break;
            case '4':
                $this->users = User::whereHas('roles', function ($query) {
                    $query->where('name', 'client');
                })->get();
                break;
            case '5':
                $this->users = [];
                break;
            default:
                $this->users = [];
                break;
        }
    }

    public function updatedSelectedTab($tab)
    {
        $this->loadTabContent($tab);
    }

    public function mount()
    {
        $this->loadTabContent($this->selectedTab);
    }

    public function render()
    {
        return view('livewire.auth.admin.user-list', [
            'tabs' => $this->tabs,
            'selectedTab' => $this->selectedTab,
            'users' => $this->users,
            'tabValues' => $this->tabValues,
        ]);
    }
}
