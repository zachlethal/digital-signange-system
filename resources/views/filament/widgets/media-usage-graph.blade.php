<x-filament::widget>
    <x-filament::card>
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500 dark:text-gray-400">Screens by Media</p>
                <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                    Media Usage on Screens
                </h2>
            </div>
        </div>

        <x-filament::chart
            :data="[
                'labels' => $mediaUsage->pluck('media_id')->toArray(),
                'datasets' => [
                    [
                        'label' => 'Screens Displaying Media',
                        'data' => $mediaUsage->pluck('screen_count')->toArray(),
                    ],
                ],
            ]"
            type="bar"
            :options="[
                'scales' => [
                    'x' => [
                        'beginAtZero' => true,
                    ],
                    'y' => [
                        'beginAtZero' => true,
                    ],
                ],
            ]"
        />
    </x-filament::card>
</x-filament::widget>
