<div class="flex flex-col h-full">
    <div class="flex-grow overflow-y-auto text-secondary">

        <div class="flex justify-center mb-4 space-x-4">
            <button wire:click="switchView('monthly')" class="px-4 py-2 rounded-md text-secondary bg-primary hover:bg-blue-600">
                Monthly
            </button>
            <button wire:click="switchView('weekly')" class="px-4 py-2 rounded-md text-secondary bg-primary hover:bg-blue-600">
                Weekly
            </button>
            <button wire:click="switchView('daily')" class="px-4 py-2 rounded-md text-secondary bg-primary hover:bg-blue-600">
                Daily
            </button>
        </div>

        @if ($view == 'monthly')
            <livewire:components.calendar.monthly />
        @elseif ($view == 'weekly')
            <livewire:components.calendar.weekly />
        @else ($view == 'daily')
            <livewire:components.calendar.daily />
        @endif

    </div>
</div>
