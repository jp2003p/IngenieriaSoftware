<?php

namespace App\Livewire;

use App\Models\Plan;
use App\Models\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\On;

class PlanComponent extends Component
{
    public function render()
    {
        $plans = Plan::all();
        return view('livewire.plan-component', compact('plans'));
    }

    #[On('add-service')]
    public function addService($id)
    {
        $plan = Plan::find($id);
        $user = Auth::user();
        Request::create(['plan_services_id' => $plan->planService->id, 'user_id' => $user->id]);
        //$this->dispatch('succes-process', mensaje: 'El plan se solicito correctamente');
    }
}
