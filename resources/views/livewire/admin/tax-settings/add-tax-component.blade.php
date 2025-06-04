<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <flux:modal.trigger name="new-tax">
        <flux:button class="w-1/3 bg-gradient-to-r from-blue-500 to-indigo-500 hover:from-blue-700 hover:to-indigo-700 text-white font-semibold rounded-md shadow-sm py-2 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Add Tax Component
        </flux:button>
    </flux:modal.trigger>

    <flux:modal name="new-tax" class="md:w-96">
        <div class="space-y-6 rounded-lg shadow-lg p-6">
            <div class="text-center">
                <flux:heading size="xl" class="text-indigo-600 font-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mx-auto mb-2 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Add New Tax Component
                </flux:heading>
                <flux:text class="mt-2 text-gray-600">Define the details for the new tax component.</flux:text>
            </div>
            <form wire:submit="newTaxComponent" class="space-y-4">
                <div class="mb-4">
                    <flux:label for="name" class="block text-gray-700 text-sm font-bold mb-2">Component Name</flux:label>
                    <flux:input wire:model="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter component name" />
                    <flux:error field="name" class="text-red-500 text-xs italic" />
                </div>
                <div class="mb-4">
                    <flux:label for="description" class="block text-gray-700 text-sm font-bold mb-2">Component Description</flux:label>
                    <flux:textarea wire:model="description" id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Provide a brief description" />
                    <flux:error field="description" class="text-red-500 text-xs italic" />
                </div>
                <div class="mb-4">
                    <flux:label for="rate" class="block text-gray-700 text-sm font-bold mb-2">Component Rate (%)</flux:label>
                    <div class="relative">
                        <flux:input wire:model="rate" type="number" min="1" max="100" id="rate" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline pr-10" />
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none text-gray-500">
                            %
                        </div>
                    </div>
                    <flux:error field="rate" class="text-red-500 text-xs italic" />
                </div>
                <div class="mb-4">
                    <flux:label for="threshold" class="block text-gray-700 text-sm font-bold mb-2">Salary Threshold</flux:label>
                    <flux:input wire:model="threshold" type="number" id="threshold" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter salary threshold (optional)" />
                    <flux:error field="threshold" class="text-red-500 text-xs italic" />
                </div>
                <div class="flex justify-end">
                    <flux:button type="submit" variant="primary" class="bg-gradient-to-r from-green-400 to-blue-500 hover:from-green-600 hover:to-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition ease-in-out duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Add Tax Component
                    </flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>