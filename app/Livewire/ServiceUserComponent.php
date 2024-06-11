<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class ServiceUserComponent extends Component
{
    public $services;

    public function render()
    {
        $this->services = Service::all();
        return view('livewire.service-user-component');
    }
}
