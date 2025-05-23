<x-layouts.app :title="__('Departments and Positions')">
    <x-page-heading 
        :pageHeading="__('🏢Departments and Positions')" 
        :pageDesc="__('Manage your departments and positions')" 
    />

    <div class="flex flex-col gap-6 p-8 bg-indigo-50 rounded-2xl shadow-inner min-h-screen">

        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-4">
            <div class="bg-white p-5 rounded-xl border border-indigo-200 shadow-md hover:shadow-xl transition duration-300 ease-in-out w-full sm:w-auto">
                <h3 class="text-indigo-600 font-semibold text-lg mb-2">Add Department</h3>
                <livewire:add-department />
            </div>
            <div class="bg-white p-5 rounded-xl border border-blue-200 shadow-md hover:shadow-xl transition duration-300 ease-in-out w-full sm:w-auto">
                <h3 class="text-blue-600 font-semibold text-lg mb-2">Add Position</h3>
                <livewire:add-position />
            </div>
        </div>

        <!-- Table Section -->
        <div class="bg-black rounded-2xl shadow-lg border border-gray-200 p-6 transition hover:shadow-2xl">
            <div class="mb-4 border-b pb-2">
                <h2 class="text-xl font-bold text-white">Departments & Positions Table</h2>
                <p class="text-sm text-gray-500">List of all departments and their positions</p>
            </div>
            <livewire:departments-positions-table />
        </div>

    </div>
</x-layouts.app>
