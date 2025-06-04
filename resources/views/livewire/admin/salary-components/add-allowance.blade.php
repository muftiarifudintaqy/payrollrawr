<div>
    {{-- The whole world belongs to you. --}}
    {{-- TODO: rule selection is Fixed/Percentage --}}
    <div class="mb-4">
        <flux:modal.trigger name="new-allowance">
            <flux:button class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-md focus:outline-none focus:shadow-outline">
                Add Allowance
            </flux:button>
        </flux:modal.trigger>
    </div>

    <flux:modal name="new-allowance" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg" class="text-blue-800 dark:text-blue-200">Add Allowance</flux:heading>
                <flux:text class="mt-2 text-gray-600 dark:text-gray-300">Make changes to your personal details.</flux:text>
            </div>
            <form wire:submit="newAllowance" class="space-y-4">
                <flux:input wire:model="name" label="Component Name" placeholder="Name" />
                <flux:textarea wire:model="description" label="Component Description" placeholder="Description" />
                <flux:input wire:model="amount" type="number" label="Amount" />
                <flux:select wire:model="rule" label="Rule" placeholder="Select a rule">
                    <option value="">Select a Rule</option>
                    <option value="fixed">Fixed</option>
                    <option value="percentage">Percentage</option>
                </flux:select>
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-md focus:outline-none focus:shadow-outline">
                        Add new Allowance
                    </flux:button>
                </div>
            </form>
        </div>
    </flux:modal>

   
    <flux:modal name="new-deduction" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg" class="text-indigo-800 dark:text-indigo-200">Add Deduction</flux:heading>
                <flux:text class="mt-2 text-gray-600 dark:text-gray-300">Make changes to your personal details.</flux:text>
            </div>
            <form wire:submit="newDeduction" class="space-y-4">
                <flux:input wire:model="name" label="Component Name" placeholder="Name" />
                <flux:textarea wire:model="description" label="Component Description" placeholder="Description" />
                <flux:input wire:model="amount" type="number" label="Amount" />
                <flux:select wire:model="rule" label="Rule" placeholder="Select a rule">
                    <option value="">Select a Rule</option>
                    <option value="fixed">Fixed</option>
                    <option value="percentage">Percentage</option>
                </flux:select>
               
            </form>
        </div>
    </flux:modal>
</div>