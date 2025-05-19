<div>
    <table class="w-full table-auto border-collapse">
        <thead>
            <tr class="text-left text-sm uppercase font-bold border-b">
                <th class="p-4">{{ __('Department') }}</th>
                <th class="p-4">{{ __('Position') }}</th>
                <th class="p-4">{{ __('Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($positions as $position)
                <tr class="text-sm border-b border-neutral-500 hover:bg-gray-50/5">
                    <td class="px-4 py-2">{{ $position->department->name }}</td>
                    <td class="px-4 py-2">{{ $position->name }}</td>
                    <td class="px-4 py-2">
                        <div class="flex items-center gap-2">
                            <flux:button wire:click="editModal({{ $position->id }})" icon="pencil-square" variant="primary" type="button">
                                {{ __('Edit') }}
                            </flux:button>

                            <flux:modal.trigger :name="'delete-position-' . $position->id">
                                <flux:button icon="trash" variant="danger" type="button">
                                    {{ __('Delete') }}
                                </flux:button>
                            </flux:modal.trigger>
                            <flux:modal :name="'delete-position-' . $position->id" class="min-w-[22rem]">
                                <div class="space-y-6">
                                    <div>
                                        <flux:heading size="lg">Delete {{$position->name}}?
                                        </flux:heading>
                                        <flux:text class="mt-2">
                                            <p>You're about to delete this position.</p>
                                            <p>This action cannot be republic $selectedPositionId = "";versed.</p>
                                        </flux:text>
                                    </div>
                                    <div class="flex gap-2">
                                        <flux:spacer />
                                        <flux:modal.close>
                                            <flux:button variant="ghost">Cancel</flux:button>
                                        </flux:modal.close>
                                        <flux:button type="submit" variant="danger" wire:click="deletePosition({{ $position->id }})">Delete</flux:button>
                                    </div>
                                </div>
                            </flux:modal>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{$positions->links()}}

    <flux:modal wire:close="closeEditModal" name="edit-position" class="min-w-[22rem]">
        <form wire:submit="updatePosition" class="space-y-6">
            <div>
                <flux:heading size="lg">Update Position</flux:heading>
                <flux:text class="mt-2">
                    Update position to the system. This will allow you to manage your positions more effectively.
                </flux:text>
            </div>
            <flux:input wire:model="name" label="Name" placeholder="Position name" required />
            <flux:textarea wire:model="description" label="Description" placeholder="Position description" />

            <flux:select label="Department" wire:model="selectedDepartment" placeholder="Choose department..." required>
                @foreach ($departments as $department )
                    <flux:select.option value="{{ $department->id }}">{{ $department->name }}</flux:select.option>
                @endforeach
            </flux:select>

            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Save</flux:button>
            </div>
        </form>
    </flux:modal>
</div>