<div>
    <flux:modal.trigger name="add-department">
        <flux:button icon="plus" variant="primary" type="button" class="w-full">
            {{ __('Add Department') }}
        </flux:button>
    </flux:modal.trigger>

    <flux:modal wire:close="close" name="add-department" class="md:w-96">
        <form wire:submit="addDepartment" class="space-y-6">
            <div>
                <flux:heading size="lg">New Department</flux:heading>
                <flux:text class="mt-2">
                    Add a new department to the system. This will allow you to manage your departments more effectively.
                </flux:text>
            </div>
            <flux:input wire:model="name" label="Name" placeholder="Department name" required />
            <flux:textarea wire:model="description" label="Description" placeholder="Department description" />
            <div class="flex">
                <flux:spacer />
                <flux:button type="submit" variant="primary">Save</flux:button>
            </div>
        </form>
    </flux:modal>
</div>
