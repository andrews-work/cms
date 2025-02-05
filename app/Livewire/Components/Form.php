<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Form extends Component
{
    public $name;       // Input name and ID
    public $label;      // Label text
    public $type;       // Input type (e.g., text, email, password)
    public $value;      // Initial value
    public $error;      // Error message
    public $model;      // Wire model binding (optional)

    public function render()
    {
        Log::info('livewire form component - render');

        return view('livewire.components.form');
    }
}
