<div class="rounded-lg shadow-md">
    {{-- The whole world belongs to you. --}}
    {{-- TODO: rule selection is Fixed/Percentage --}}
    <flux:modal.trigger name="edit-tax-{{ $tax->id }}">
        <flux:button
            class="text-indigo-500 hover:text-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-400 transition ease-in-out duration-150"
            >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15.828 10 16.5V14.7l8.586-8.586z" />
            </svg>
        </flux:button>
    </flux:modal.trigger>

    <flux:modal name="edit-tax-{{ $tax->id }}" class="md:w-96">
        <div class="space-y-6 bg-gray-800 rounded-lg shadow-lg p-6 text-white">
            <div class="flex items-center justify-between">
                <flux:heading size="xl" class="font-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2 inline-block text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15.828 10 16.5V14.7l8.586-8.586z" />
                    </svg>
                    Edit Tax Component
                </flux:heading>
                <flux:modal.close name="edit-tax-{{ $tax->id }}">
                   
                </flux:modal.close>
            </div>
            <flux:text class="mt-2 text-gray-400">Modify the details of this tax component.</flux:text>
            <form wire:submit="updateTax" class="space-y-4">
                <div class="mb-4">
                    <flux:label for="name" class="block text-gray-300 text-sm font-bold mb-2">Component Name</flux:label>
                    <flux:input wire:model="name" id="name-{{ $tax->id }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 bg-gray-700" placeholder="Name" />
                    <flux:error field="name" class="text-red-500 text-xs italic" />
                </div>
                <div class="mb-4">
                    <flux:label for="description" class="block text-gray-300 text-sm font-bold mb-2">Component Description</flux:label>
                    <flux:textarea wire:model="description" id="description-{{ $tax->id }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 bg-gray-700" placeholder="Description" />
                    <flux:error field="description" class="text-red-500 text-xs italic" />
                </div>
                <div class="mb-4">
                    <flux:label for="rate" class="block text-gray-300 text-sm font-bold mb-2">Component Rate (%)</flux:label>
                    <div class="relative">
                        <flux:input wire:model="rate" type="number" min="1" max="100" id="rate-{{ $tax->id }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 bg-gray-700 pr-10" />
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-400">
                            %
                        </div>
                    </div>
                    <flux:error field="rate" class="text-red-500 text-xs italic" />
                </div>
                <div class="mb-4">
                    <flux:label for="threshold" class="block text-gray-300 text-sm font-bold mb-2">Salary Threshold</flux:label>
                    <flux:input wire:model="threshold" type="number" id="threshold-{{ $tax->id }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 bg-gray-700" placeholder="Salary Threshold" />
                    <flux:error field="threshold" class="text-red-500 text-xs italic" />
                </div>
                <div class="flex justify-end">
                    <flux:button type="submit" variant="primary" class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-green-600 hover:to-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition ease-in-out duration-150">
                        Save changes
                    </flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>