<?php

namespace App\Livewire\Auth\Employee;

use Livewire\Component;

class Sidebar extends Component
{
    public function navigate($route)
    {
        return redirect()->route($route);
    }
    
    public function render()
    {
        return view('livewire.auth.employee.sidebar');
    }
}
