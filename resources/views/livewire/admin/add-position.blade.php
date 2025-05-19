<div>
    <flux:modal.trigger name="add-position">
        <flux:button icon="plus" variant="primary" type="button" class="w-full">
            {{ __('Add Position') }}
        </flux:button>
    </flux:modal.trigger>

    <flux:modal wire:close="close" name="add-position" class="md:w-96">
        <form wire:submit="addPosition" class="space-y-6">
            <div>
                <flux:heading size="lg">New Position</flux:heading>
                <flux:text class="mt-2">
                    Add a new position to the system. This will allow you to manage your positions more effectively.
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
