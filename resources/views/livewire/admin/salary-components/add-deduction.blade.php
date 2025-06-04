<div>
    {{-- The whole world belongs to you. --}}
    {{-- TODO: rule selection is Fixed/Percentage --}}
    <div class="mb-4">
        <flux:modal.trigger name="new-deduction">
            <flux:button class="w-full bg-blue-600 hover:bg-blue-700 text-indigo-900 font-bold py-2 px-4 rounded shadow-md focus:outline-none focus:shadow-outline">
                Add Deduction
            </flux:button>
        </flux:modal.trigger>
    </div>

    <flux:modal name="new-deduction" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg" class="text-indigo-800">Add Deduction</flux:heading>
                <flux:text class="mt-2 text-gray-600 dark:text-gray-300">Make changes to your personal details.</flux:text>
            </div>
            <form wire:submit="newDeduction" class="space-y-4">
                <flux:input wire:model="name" label="Name" placeholder="Name" />
                <flux:textarea wire:model="description" label="Description" placeholder="Description" />
                <flux:input wire:model="amount" type="number" label="Amount" />
                <flux:select wire:model="rule" label="Rule" placeholder="Select a rule">
                    <option value="">Select a Rule</option>
                    <option value="fixed">Fixed</option>
                    <option value="percentage">Percentage</option>
                </flux:select>
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded shadow-md focus:outline-none focus:shadow-outline">
                        Add new Deduction
                    </flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>