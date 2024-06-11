<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class ServiceAdminComponent extends Component
{
    public $openCreate = false;
    public $openUpdate = false;
    public $nameCreate, $descriptionCreate, $priceCreate, $categoryIdCreate;
    public $nameUpdate, $descriptionUpdate, $priceUpdate, $categoryIdUpdate;
    public $serviceId;

    public function render()
    {
        $services = Service::orderBy('id', 'desc')->get();
        return view('livewire.service-admin-component', compact('services'));
    }

    public function create()
    {
        $this->openCreate = true;
    }

    public function store()
    {
        $this->validate([
            'nameCreate' => 'required',
            'descriptionCreate' => 'required',
            'priceCreate' => 'required|numeric',
        ]);

        Service::create([
            'name' => $this->nameCreate,
            'description' => $this->descriptionCreate,
            'price' => $this->priceCreate,
        ]);

        $this->reset(['nameCreate', 'descriptionCreate', 'priceCreate', 'categoryIdCreate']);
        $this->openCreate = false;
    }

    public function edit($id)
    {
        $service = Service::find($id);
        $this->serviceId = $service->id;
        $this->nameUpdate = $service->name;
        $this->descriptionUpdate = $service->description;
        $this->priceUpdate = $service->price;
        $this->openUpdate = true;
    }

    public function update()
    {
        $this->validate([
            'nameUpdate' => 'required',
            'descriptionUpdate' => 'required',
            'priceUpdate' => 'required|numeric'
        ]);

        $service = Service::find($this->serviceId);
        $service->update([
            'name' => $this->nameUpdate,
            'description' => $this->descriptionUpdate,
            'price' => $this->priceUpdate,
        ]);

        $this->reset(['nameUpdate', 'descriptionUpdate', 'priceUpdate', 'categoryIdUpdate']);
        $this->openUpdate = false;
    }

    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
    }
}
