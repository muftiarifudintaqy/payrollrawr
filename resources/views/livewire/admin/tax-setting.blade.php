<div>
    <x-page-heading :pageHeading="__('Tax-Settings')" :pageDesc="__('Manage your tax settings here.')"/>

    <div class="min-h-screen bg-gradient-to-b from-orange-100 via-pink-200 to-purple-300 p-6">
        <div class="max-w-3xl mx-auto bg-white/80 backdrop-blur-md rounded-3xl shadow-xl p-8 border border-pink-300">
            <h1 class="text-4xl font-bold text-purple-800 mb-6 text-center">🌇 Tax Settings</h1>

            @if (session()->has('message'))
                <div class="mb-4 text-green-800 bg-green-100 p-3 rounded-xl shadow text-center">
                    {{ session('message') }}
                </div>
            @endif

            <form wire:submit.prevent="{{ $editMode ? 'update' : 'save' }}" class="space-y-5">
                <input type="hidden" wire:model="editingId">

                <div>
                    <label class="block text-sm font-semibold text-purple-700 mb-1">Tax Name</label>
                    <input type="text" wire:model="taxName" class="text-black w-full rounded-xl border border-purple-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="Tax Name...">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-purple-700 mb-1">Tax Rate (%)</label>
                    <input type="number" wire:model="taxRate" class="text-black w-full rounded-xl border border-purple-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500" placeholder="123...">
                </div>

                <div>
                    <label class="block text-sm font-semibold text-purple-700 mb-1">Description</label>
                    <textarea wire:model="taxDescription" class="text-black w-full rounded-xl border border-purple-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-purple-500" rows="3" placeholder="Describe the tax here..."></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-gradient-to-r from-purple-500 via-pink-500 to-orange-400 text-white px-6 py-3 rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 ease-in-out transform hover:scale-105">
                        {{ $editMode ? '✏️ Update Tax' : '☀️ Save Settings' }}
                    </button>
                </div>
            </form>

           @if ($taxes->count())
    <div class="mt-10 bg-white/70 rounded-2xl p-6 shadow-md">
        <h2 class="text-xl font-semibold text-purple-800 mb-4">🧾 Saved Taxes</h2>
        <ul class="space-y-4">
           @foreach ($taxes as $tax)
    <li class="flex justify-between items-start bg-purple-50 p-4 rounded-xl shadow">
        <div>
            <p class="font-bold text-purple-700">{{ $tax->name }} ({{ $tax->rate }}%)</p>
            <p class="text-sm text-gray-700">{{ $tax->description }}</p>
        </div>
        <div class="flex gap-2">
            <button wire:click="edit({{ $tax->id }})" class="text-blue-600 hover:underline">✏️ Edit</button>
            <button wire:click="delete({{ $tax->id }})" class="text-red-600 hover:underline">🗑️ Delete</button>
        </div>
    </li>
@endforeach
        </ul>
    </div>
@endif
        </div>
    </div>
</div>
