<?php

namespace App\Livewire\Auth\Client;

use Livewire\Component;

class Sidebar extends Component
{
    public function navigate($route)
    {
        return redirect()->route($route);
    }
    
    public function render()
    {
        return view('livewire.auth.client.sidebar');
    }
}
