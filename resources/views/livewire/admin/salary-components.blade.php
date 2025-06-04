<div class="grid gap-4">
    <div class="col-span-full">
        <x-page-heading pageHeading="Salary Components" pageDesc="Manage your company's salary components here"></x-page-heading>
    </div>

    <div class="col-span-full md:col-span-12 lg:col-span-6">
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-blue-900 dark:text-blue-100 mb-2">
                Allowances
            </h2>
            <div class="w-full">
                <livewire:admin.salary-components.add-allowance class="w-full shadow-md rounded-md" />
            </div>
        </div>
        <div
            class="bg-white dark:bg-gradient-to-br from-gray-900 to-gray-800 rounded-md shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-300 dark:border-gray-700 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-blue-100 dark:bg-blue-900/70 backdrop-blur-sm">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-blue-900 dark:text-blue-100 uppercase tracking-wider">Name</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-blue-900 dark:text-blue-100 uppercase tracking-wider">Description</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-blue-900 dark:text-blue-100 uppercase tracking-wider">Amount</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-blue-900 dark:text-blue-100 uppercase tracking-wider">Rule</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-blue-900 dark:text-blue-100 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($allowances as $allowance)
                        <tr class="hover:bg-blue-50 dark:hover:bg-gray-700/30 transition-all duration-200 animate-enter">
                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-100">
                                <span class="inline-block hover:underline">{{ $allowance->name }}</span>
                            </td>
                            <td class="px-4 py-4 whitespace-normal text-sm text-gray-600 dark:text-gray-300">{{ $allowance->description }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                                {{ ($allowance->rule == "fixed") ? $company_settings->currency_prefix : "" }} {{ number_format($allowance->amount) }} {{ ($allowance->rule == "percentage") ? "%" : "" }}
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">{{ $allowance->rule }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <livewire:admin.salary-components.edit-allowance :allowance="$allowance" />
                                    <livewire:admin.salary-components.delete-allowance :allowance="$allowance" />
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-span-full md:col-span-12 lg:col-span-6">
        <div class="mb-4">
            <h2 class="text-lg font-semibold text-indigo-900 dark:text-indigo-100 mb-2">
                Deductions
            </h2>
            <div class="w-full">
                <livewire:admin.salary-components.add-deduction class="w-full shadow-md rounded-md" />
            </div>
        </div>
        <div
            class="bg-white dark:bg-gradient-to-br from-gray-900 to-gray-800 rounded-md shadow-sm hover:shadow-md transition-shadow duration-300 border border-gray-300 dark:border-gray-700 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-indigo-100 dark:bg-indigo-900/70 backdrop-blur-sm">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-indigo-900 dark:text-indigo-100 uppercase tracking-wider">Name</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-indigo-900 dark:text-indigo-100 uppercase tracking-wider">Description</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-indigo-900 dark:text-indigo-100 uppercase tracking-wider">Amount</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-indigo-900 dark:text-indigo-100 uppercase tracking-wider">Rule</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-indigo-900 dark:text-indigo-100 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($deductions as $deduction)
                        <tr class="hover:bg-indigo-50 dark:hover:bg-gray-700/30 transition-all duration-200 animate-enter">
                            <td class="px-4 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-100">
                                <span class="inline-block hover:underline">{{ $deduction->name }}</span>
                            </td>
                            <td class="px-4 py-4 whitespace-normal text-sm text-gray-600 dark:text-gray-300">{{ $deduction->description }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">
                                {{ ($deduction->rule == "fixed") ? $company_settings->currency_prefix : "" }} {{ number_format($deduction->amount) }} {{ ($deduction->rule == "percent") ? "%" : "" }}
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-300">{{ $deduction->rule }}</td>
                            <td class="px-4 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <livewire:admin.salary-components.edit-allowance :allowance="$allowance" />
                                    <livewire:admin.salary-components.delete-allowance :allowance="$allowance" />
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes enter {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        .animate-fade-in {
            animation: fadeIn 0.4s ease-out forwards;
        }
        .animate-enter {
            animation: enter 0.3s ease-out forwards;
        }
    </style>
</div>