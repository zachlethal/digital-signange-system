<x-filament::widget>
    <x-filament::card>
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Departments</p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ $totalDepartments }}
                </h2>
            </div>
            <x-heroicon-o-building-office class="w-10 h-10 text-primary-500" />
        </div>
    </x-filament::card>
</x-filament::widget>
