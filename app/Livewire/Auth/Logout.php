<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Logout extends Component
{
    public function logout()
    {
        // logout
        Auth::logout();

        // redirect
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.auth.logout');
    }
}
