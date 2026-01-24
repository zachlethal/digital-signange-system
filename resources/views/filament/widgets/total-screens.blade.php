<x-filament::widget>
    <x-filament::card>
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Total Screens</p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    {{ $totalScreens }}
                </h2>
            </div>
            <x-heroicon-o-tv class="w-10 h-10 text-primary-500" />
        </div>
    </x-filament::card>
</x-filament::widget>
