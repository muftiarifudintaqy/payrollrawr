<?php

namespace App\Livewire;

use App\Models\CompanySetting;
use Livewire\Attributes\On;
use Livewire\Component;

class CompanyName extends Component
{
    public $name = '';
    public function mount()
    {
        $companyData = CompanySetting::first();
        $this->name = $companyData->name;
    }
    public function render()
    {
        return <<<'HTML'
        <span  class="mb-0.5 truncate leading-none">
            {{ $name }}
        </span>
        HTML;
    }
    #[On('company-updated')]
    public function listenForCompanyUpdated()
    {
        $this->name = CompanySetting::first()->name;
    }
}
