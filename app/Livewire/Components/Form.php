<?php

namespace App\Livewire\Components;

use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Form extends Component
{
    public $name;
    public $label;
    public $type;
    public $value;
    public $error;
    public $model;

    public function render()
    {
        Log::info('livewire form component - render');

        return view('livewire.components.form');
    }
}
