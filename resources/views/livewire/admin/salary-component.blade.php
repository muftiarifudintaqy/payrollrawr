<div class="p-6 space-y-10 text-white font-sans">

    <x-page-heading 
        :pageHeading="__('📈📉Salary Components')" 
        :pageDesc="__('Manage your company\'s💰💸💵🤑')" 
    />

    {{-- ALLOWANCES --}}
    <div class="bg-gradient-to-br from-purple-800/70 to-indigo-900/80 backdrop-blur-lg border border-white/10 rounded-3xl shadow-2xl p-8 transition-all hover:shadow-indigo-600/30">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl font-extrabold text-white tracking-wide flex items-center gap-2">
                <x-icon name="gift" class="w-6 h-6 text-pink-400" /> Allowances
            </h2>
            <flux:modal.trigger name="main-modal">
                 <div>
                    <flux:button 
                        icon="plus" 
                        variant="primary" 
                        type="button" 
                        class="w-full md:w-auto"
                        wire:click="$set('isDeduction', false); $set('isEditAllowance', false)"
                    >
                        {{ __('Add Allowance') }}
                    </flux:button>
                </div>
            </flux:modal.trigger>
        </div>

        <div class="overflow-x-auto rounded-xl border border-white/5">
            <table class="w-full text-sm text-left text-gray-200 border-separate border-spacing-y-3">
                <thead class="bg-gradient-to-r from-indigo-700 to-indigo-800 text-white rounded-xl">
                    <tr>
                        <th class="p-4">Name</th>
                        <th class="p-4">Amount</th>
                        <th class="p-4">Rule</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allowances as $allowance)
                        <tr class="bg-gradient-to-r from-gray-800/70 to-gray-900/70 hover:from-purple-800 hover:to-indigo-900 transition-all duration-300 ease-in-out rounded-xl shadow-md">
                            <td class="p-4 rounded-l-xl font-semibold text-pink-300">{{ $allowance->name }}</td>
                            <td class="p-4">
                                @if ($allowance->rule == 'fixed')
                                    Rp {{ number_format($allowance->amount, 0, ',', '.') }}
                                @else
                                    {{ number_format($allowance->amount * 100, 0, ',', '.') }}%
                                @endif
                            </td>
                            <td class="p-4 capitalize">{{ $allowance->rule }}</td>
                            <td class="p-4 flex gap-2 rounded-r-xl">
                                  <flux:button wire:click="editModalAllowance({{ $allowance->id }})" icon="pencil-square" variant="primary" type="button">
                                    Edit
                                </flux:button>
                                <flux:button wire:click="deleteModalAllowance(`{{ $allowance->id }}`, `{{ $allowance->name }}`)" icon="trash" variant="danger" type="button">
                                    Delete
                                </flux:button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $allowances->links() }}
        </div>
    </div>

    {{-- MODALS tetap seperti sebelumnya (optional: bisa ditingkatkan juga stylingnya jika perlu) --}}
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
            class="space-y-6"
        >
            <div>
                <flux:heading size="lg">
                    @if ($isEditAllowance) Edit @else New @endif 
                    @if ($isDeduction) Deduction @else Allowance @endif 
                </flux:heading>
                <flux:text class="mt-2 text-gray-400">
                    @if ($isEditAllowance)
                        @if ($isDeduction)
                            Update deduction to the system for better payroll management.
                        @else
                            Update allowance for more effective compensation settings.
                        @endif
                    @else
                        @if ($isDeduction)
                            Add a new deduction to manage your payroll expenses.
                        @else
                            Add a new allowance to the salary structure.
                        @endif
                    @endif
                </flux:text>
            </div>

            <flux:input wire:model="name" label="Name" placeholder="Name" required />
            <flux:textarea wire:model="description" label="Description" placeholder="Description" />
            <flux:input wire:model="amount" label="Amount" placeholder="Amount" required />

            @if (!$isDeduction)
                <flux:text class="mt-2 text-xs text-gray-400">
                    For Rule "Percentage":<br>1 = 100%, 0.5 = 50%
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

    {{-- MODAL: Delete --}}
    <flux:modal wire:close="closeModal" name="delete-modal" class="min-w-[22rem]">
        <form wire:submit="deleteAllowance" class="space-y-6">
            <div>
                <flux:heading size="lg">Delete {{ $name }}?</flux:heading>
                <flux:text class="mt-2 text-gray-300">
                    You're about to delete this entry. <br>This action cannot be undone.
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

    <flux:separator />
    
    {{-- DEDUCTIONS --}}
    <div class="bg-gradient-to-br from-red-800/70 to-rose-900/80 backdrop-blur-lg border border-white/10 rounded-3xl shadow-2xl p-8 transition-all hover:shadow-rose-600/30">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl font-extrabold text-white tracking-wide flex items-center gap-2">
                <x-icon name="banknotes" class="w-6 h-6 text-yellow-400" /> Deductions
            </h2>
            <flux:modal.trigger name="main-modal">
                <div>
                    <flux:button 
                        icon="plus-circle" 
                        variant="primary" 
                        type="button" 
                        class="w-full md:w-auto"
                        wire:click="$set('isDeduction', true); $set('isEditAllowance', false)"
                    >
                        {{ __('Add Deduction') }}
                    </flux:button>
                </div>
            </flux:modal.trigger>
        </div>

        <div class="overflow-x-auto rounded-xl border border-white/5">
            <table class="w-full text-sm text-left text-gray-200 border-separate border-spacing-y-3">
                <thead class="bg-gradient-to-r from-rose-700 to-red-700 text-white rounded-xl">
                    <tr>
                        <th class="p-4">Name</th>
                        <th class="p-4">Amount</th>
                        <th class="p-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($deductions as $deduction)
                        <tr class="bg-gradient-to-r from-gray-800/70 to-gray-900/70 hover:from-red-800 hover:to-rose-900 transition-all duration-300 ease-in-out rounded-xl shadow-md">
                            <td class="p-4 rounded-l-xl font-semibold text-yellow-300">{{ $deduction->name }}</td>
                            <td class="p-4">Rp {{ number_format($deduction->amount, 0, ',', '.') }}</td>
                            <td class="p-4 flex gap-2 rounded-r-xl">
                                <flux:button wire:click="editModalAllowance({{ $deduction->id }})" icon="pencil" variant="primary" type="button">
                                    Edit
                                </flux:button>
                                <flux:button wire:click="deleteModalAllowance(`{{ $deduction->id }}`, `{{ $deduction->name }}`)" icon="trash" variant="danger" type="button">
                                    Delete
                                </flux:button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-gray-400 py-6 italic">No deductions found 💤</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>


