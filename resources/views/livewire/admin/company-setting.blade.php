<div>
    <x-page-heading :pageHeading="__('Company Settings')" :pageDesc="__('Manage your company settings')" />

    <form wire:submit="updateCompany" class="w-full space-y-6">
        <flux:input wire:model="name" :label="__('Company Name')" type="text" required autofocus autocomplete="name" />

        <flux:textarea wire:model="description" :label="__('Company Description')" required rows="4" />

        <flux:input wire:model="address" :label="__('Company Address')" type="text" required autocomplete="address" />

        <flux:input wire:model="phone" :label="__('Company Phone')" type="tel" required autocomplete="phone" />

        <flux:input wire:model="value" :label="__('Company Value')" type="text" required autocomplete="value" />

        <div class="flex items-center gap-4">
            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full">{{ __('Save') }}</flux:button>
            </div>

            <x-action-message class="me-3" on="company-updated">
                {{ __('Saved.') }}
            </x-action-message>
        </div>
    </form>
</div>