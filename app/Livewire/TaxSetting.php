<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\TaxSetting as TaxSettingModel;

class TaxSetting extends Component
{
    public $taxName;
    public $taxRate;
    public $taxDescription;

    public $editMode = false;
    public $editingId;

    public function save()
    {
        $this->validate([
            'taxName' => 'required|string|max:255',
            'taxRate' => 'required|numeric|min:0',
            'taxDescription' => 'nullable|string',
        ]);

        TaxSettingModel::create([
            'name' => $this->taxName,
            'rate' => $this->taxRate,
            'description' => $this->taxDescription,
        ]);

        $this->resetForm();

        session()->flash('message', '🎉 Tax settings saved successfully!');
    }

    public function edit($id)
    {
        $tax = TaxSettingModel::findOrFail($id);

        $this->editingId = $tax->id;
        $this->taxName = $tax->name;
        $this->taxRate = $tax->rate;
        $this->taxDescription = $tax->description;
        $this->editMode = true;
    }

    public function update()
    {
        $this->validate([
            'taxName' => 'required|string|max:255',
            'taxRate' => 'required|numeric|min:0',
            'taxDescription' => 'nullable|string',
        ]);

        $tax = TaxSettingModel::findOrFail($this->editingId);
        $tax->update([
            'name' => $this->taxName,
            'rate' => $this->taxRate,
            'description' => $this->taxDescription,
        ]);

        $this->resetForm();

        session()->flash('message', '✅ Tax updated successfully!');
    }

    public function delete($id)
    {
        $tax = TaxSettingModel::findOrFail($id);
        $tax->delete();

        session()->flash('message', '🗑️ Tax deleted successfully!');
    }

    private function resetForm()
    {
        $this->reset(['taxName', 'taxRate', 'taxDescription', 'editingId', 'editMode']);
    }

    public function render()
    {
        $taxes = TaxSettingModel::orderBy('created_at', 'desc')->get();

        return view('livewire.admin.tax-setting', compact('taxes'));
    }
}
