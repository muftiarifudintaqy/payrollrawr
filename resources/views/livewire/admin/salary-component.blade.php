<div>
    <x-page-heading :pageHeading="__('Salary Components')" :pageDesc="__('Manage your company salary components')" />

    {{-- Include Allowances & Deductions --}}


    {{-- Allowances --}}
    <div class="mb-4">
        <flux:modal.trigger name="main-modal">
        <flux:button icon="plus" variant="primary" type="button" class="w-full">
            {{ __('Add Allowance') }}
        </flux:button>
        </flux:modal.trigger>

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="text-left text-sm uppercase font-bold border-b">
                    <th class="p-4">{{ __('Name') }}</th>
                    <th class="p-4">{{ __('Amount') }}</th>
                    <th class="p-4">{{ __('Rule') }}</th>
                    <th class="p-4">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allowances as $allowance)
                    <tr class="border-b hover:bg-gray-50/5">
                        <td class="px-4 py-2">{{ $allowance->name }}</td>
                        <td class="px-4 py-2">
                            @if ($allowance->rule == 'fixed')
                                {{--  add currency --}}
                                Rp {{ number_format($allowance->amount, 0, ',', '.') }}
                                @else
                                {{--  jadiin persen --}}
                                {{ number_format($allowance->amount * 100, 0, ',', '.') }}%
                            @endif
                        </td>
                        <td class="px-4 py-2 capitalize">{{ $allowance->rule }}</td>
                        <td class="px-4 py-2">
                            <div class="flex items-center gap-2">
                                <flux:button wire:click="editModalAllowance({{ $allowance->id }})" icon="pencil-square" variant="primary" type="button">
                                    {{ __('Edit') }}
                                </flux:button>
                                <flux:button wire:click="deleteModalAllowance(`{{ $allowance->id }}`,`{{ $allowance->name }}`)" icon="trash" variant="danger" type="button">
                                    {{ __('Delete') }}
                                </flux:button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{$allowances->links()}}
    </div>

    {{-- Modal Add and Edit --}}
    <flux:modal wire:close="closeModal" name="main-modal" class="md:w-96">
        <form 

            @if ($isEditAllowance)
                @if ($isDeduction)
                    wire:submit="updateDeduction"
                @else
                    wire:submit="updateAllowance"
                @endif
            @else
                @if ($isDeduction)
                    wire:submit="addDeduction"
                @else
                    wire:submit="addAllowance"
                @endif
            @endif 
            
            class="space-y-6">
            <div>
                <flux:heading size="lg">
                    @if ($isEditAllowance) Edit @else New @endif 
                    @if ($isDeduction) Deduction @else Allowance @endif 
                </flux:heading>
                <flux:text class="mt-2">
                    @if ($isEditAllowance)
                        @if ($isDeduction)
                            Update deduction to the system. This will allow you to manage your deductions for your company.
                        @else
                            Update allowance to the system. This will allow you to manage your allowances more effectively.
                        @endif
                    @else
                        @if ($isDeduction)
                            Add a new deduction to the system. This will allow you to manage your deductions for your company.
                        @else
                            Add a new allowance to the system. This will allow you to manage your allowances more effectively.
                        @endif
                    @endif
                </flux:text>
            </div>
            <flux:input wire:model="name" label="Name" placeholder="Name" required />
            <flux:textarea wire:model="description" label="Description" placeholder="Description" />
            <flux:input wire:model="amount" label="Amount" placeholder="Amount" required />

            @if (!$isDeduction)
            <flux:text class="mt-2">
                For Rule "Percentage".<br /> 1 is equal to 100%,<br /> 0.5 is equal to 50%.
            </flux:text>
            <flux:select label="Rule" wire:model="rule" placeholder="Choose rule..." required>
                <flux:select.option value="fixed">Fixed</flux:select.option>
                <flux:select.option value="percentage">Percentage</flux:select.option>
            </flux:select>
            @endif
            
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Save</flux:button>
            </div>
        </form>
    </flux:modal>

    {{-- Modal Delete Allowance --}}
    <flux:modal wire:close="closeModal" name="delete-modal" class="min-w-[22rem]">
        <form wire:submit="deleteAllowance" class="space-y-6">
            <div>
                <flux:heading size="lg">Delete {{$name}}?
                </flux:heading>
                <flux:text class="mt-2">
                    <p>You're about to delete this position.</p>
                    <p>This action cannot be undone.</p>
                </flux:text>
            </div>
            <div class="flex gap-2">
                <flux:spacer />
                <flux:modal.close>
                    <flux:button variant="ghost">Cancel</flux:button>
                </flux:modal.close>
                <flux:button type="submit" variant="danger">Delete</flux:button>
            </div>
        </form>
    </flux:modal>

    <flux:separator  />

    {{-- Deductions --}}
    <div class="mt-4">
        <flux:modal.trigger name="main-modal" wire:click="$set('isDeduction', true)">
        <flux:button icon="plus" variant="primary" type="button" class="w-full">
            {{ __('Add Deduction') }}
        </flux:button>
        </flux:modal.trigger>

        <table class="w-full table-auto border-collapse">
            <thead>
                <tr class="text-left text-sm uppercase font-bold border-b">
                    <th class="p-4">{{ __('Name') }}</th>
                    <th class="p-4">{{ __('Amount') }}</th>
                    <th class="p-4">{{ __('Actions') }}</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

</div>
