<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Request;
use App\Models\Plan;
use App\Models\User;

class RequestComponent extends Component
{
    public $requests;
    public $openCreate = false;
    public $openUpdate = false;
    public $planIdCreate, $userIdCreate;
    public $planIdUpdate, $userIdUpdate;
    public $requestId;

    public function mount()
    {
        $this->requests = Request::all();
    }

    public function render()
    {
        $plans = Plan::all();
        $users = User::all();
        return view('livewire.request-component', compact('plans', 'users'));
    }

    public function create()
    {
        $this->openCreate = true;
    }

    public function store()
    {
        $this->validate([
            'planIdCreate' => 'required|exists:plans,id',
            'userIdCreate' => 'required|exists:users,id',
        ]);

        Request::create([
            'plan_id' => $this->planIdCreate,
            'user_id' => $this->userIdCreate,
        ]);

        $this->requests = Request::with(['plan', 'user'])->get();
        $this->reset(['planIdCreate', 'userIdCreate']);
        $this->openCreate = false;
    }

    public function edit($id)
    {
        $request = Request::with(['plan', 'user'])->find($id);
        $this->requestId = $id;
        $this->planIdUpdate = $request->plan_id;
        $this->userIdUpdate = $request->user_id;
        $this->openUpdate = true;
    }

    public function update()
    {
        $this->validate([
            'planIdUpdate' => 'required|exists:plans,id',
            'userIdUpdate' => 'required|exists:users,id',
        ]);

        $request = Request::find($this->requestId);
        $request->update([
            'plan_id' => $this->planIdUpdate,
            'user_id' => $this->userIdUpdate,
        ]);

        $this->requests = Request::with(['plan', 'user'])->get();
        $this->reset(['planIdUpdate', 'userIdUpdate']);
        $this->openUpdate = false;
    }

    public function destroy($id)
    {
        $request = Request::find($id);
        $request->delete();
        $this->requests = Request::with(['plan', 'user'])->get();
    }
}
