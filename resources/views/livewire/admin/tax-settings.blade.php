<div class="p-6 bg-gradient-to-b from-gold-400 to-yellow-500 text-white rounded-lg shadow-md">
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
    <div class="mb-8">
        <h1 class="text-2xl font-semibold mb-2 text-purple-300">
            {{ __('Tax Settings') }}
        </h1>
        <p class="text-indigo-200">
            {{ __('Edit your tax components here') }}
        </p>
    </div>

    {{-- Make action bar layout --}}
    <div class="mb-6">
        <livewire:admin.tax-settings.add-tax-component />
    </div>

    <div class="rounded-xl shadow overflow-hidden border border-indigo-400 bg-white dark:bg-gray-500">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm divide-y divide-indigo-200 dark:divide-gray-700">
                <thead class="bg-indigo-500 dark:bg-gray-700 text-indigo-600 dark:text-gray-300">
                    <tr>
                        <th scope="col" class="px-4 py-3 font-medium text-left uppercase tracking-wide">
                            {{ __('Name') }}
                        </th>
                        <th scope="col" class="px-4 py-3 font-medium text-left uppercase tracking-wide">
                            {{ __('Description') }}
                        </th>
                        <th scope="col" class="px-4 py-3 font-medium text-left uppercase tracking-wide">
                            {{ __('Rate') }}
                        </th>
                        <th scope="col" class="px-4 py-3 font-medium text-left uppercase tracking-wide">
                            {{ __('Salary Threshold') }}
                        </th>
                        <th scope="col" class="px-4 py-3 font-medium text-right uppercase tracking-wide">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-indigo-200 dark:divide-gray-700">
                    @foreach ($taxes as $tax)
                    <tr class="transition-colors duration-200 hover:bg-indigo-50 dark:hover:bg-gray-700/50">
                        <td class="px-4 py-3 whitespace-nowrap text-indigo-700 dark:text-gray-200">
                            <span class="inline-block hover:underline hover:text-yellow-400 dark:hover:text-yellow-300 transition-colors duration-200">
                                {{ $tax->name }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-indigo-500 dark:text-gray-400 w-1/3">
                            <p class="line-clamp-2 text-pretty">
                                {{ $tax->description }}
                            </p>
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-indigo-500 dark:text-gray-400">
                            {{ $tax->rate }}%
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-indigo-500 dark:text-gray-400">
                            {{ $company_settings->currency_prefix }} {{ number_format($tax->threshold_range) }}
                        </td>
                        <td class="px-4 py-3 whitespace-nowrap text-right">
                            <div class="flex justify-end space-x-2">
                                <livewire:admin.tax-settings.edit-tax-component :tax="$tax" />
                                <livewire:admin.tax-settings.delete-tax-component :tax="$tax" />
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>