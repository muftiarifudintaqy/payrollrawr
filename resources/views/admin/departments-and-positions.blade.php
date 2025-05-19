<x-layouts.app :title="__('Departments and Positions')">
    <x-page-heading :pageHeading="__('Departments and Positions')" :pageDesc="__('Manage your departments and positions')" />

    <div class="flex h-full w-full flex-1 flex-col gap-4">

        <div class="flex items-center gap-4">
            <livewire:add-department />
            <livewire:add-position />
        </div>
            
        <livewire:departments-positions-table />
    </div>
</x-layouts.app>