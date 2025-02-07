<div class="flex flex-col h-full">
    <div class="flex-grow overflow-y-auto text-secondary">

        <div class="flex justify-center mb-4 space-x-4">
            <button wire:click="switchView('monthly')" class="px-4 py-2 border-2 rounded-md text-secondary bg-primary border-primary hover:bg-primary hover:border-secondary focus:outline-none">
                Monthly
            </button>
            <button wire:click="switchView('weekly')" class="px-4 py-2 border-2 rounded-md text-secondary bg-primary border-primary hover:bg-primary hover:border-secondary focus:outline-none">
                Weekly
            </button>
            <button wire:click="switchView('daily')" class="px-4 py-2 border-2 rounded-md text-secondary bg-primary border-primary hover:bg-primary hover:border-secondary focus:outline-none">
                Daily
            </button>
        </div>

        @if ($view == 'monthly')
            <livewire:components.calendar.monthly />
        @elseif ($view == 'weekly')
            <livewire:components.calendar.weekly />
        @else
            <livewire:components.calendar.daily />
        @endif

    </div>
</div>
