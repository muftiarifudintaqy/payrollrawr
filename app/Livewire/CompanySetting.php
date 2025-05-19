<?php

namespace App\Livewire;

use App\Models\CompanySetting as ModelsCompanySetting;
use Livewire\Attributes\Title;
use Livewire\Component;

class CompanySetting extends Component
{
    public $id = '';
    public $name = '';
    public $description = '';
    public $address = '';
    public $phone = '';
    public $value = '';
    public function mount()
    {
        $companyData = ModelsCompanySetting::first();
        $this->id = $companyData->id;
        $this->name = $companyData->name;
        $this->description = $companyData->description;
        $this->address = $companyData->address;
        $this->phone = $companyData->phone;
        $this->value = $companyData->value;
    }
    #[Title('Company Settings')]
    public function render()
    {
        return view('livewire.admin.company-setting');
    }

    public function updateCompany()
    {
        $this->validate([
            'name' => 'required|min:3|max:255',
            'description' => 'required|string',
            'address' => 'required|string|min:3|max:255',
            'phone' => 'required|min:8',
            'value' => 'required|string|min:3|max:255',
        ]);

        ModelsCompanySetting::updateOrCreate([
            'id' => $this->id,
        ], [
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,
            'phone' => $this->phone,
            'value' => $this->value,
        ]);

        $this->dispatch('company-updated');
    }
}
