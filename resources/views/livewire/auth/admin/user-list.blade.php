<div class="flex justify-center w-full">
    <div class="w-2/3 p-4">

        <div class="flex mb-6 space-x-4">
            @foreach($tabs as $tabKey => $tabName)
                <button wire:click="$set('selectedTab', '{{ $tabKey }}')"
                        class="px-4 w-full py-2 border rounded {{ $selectedTab == $tabKey ? 'bg-primary text-secondary' : 'bg-primary text-secondary' }} hover:bg-tertiary">
                    {{ $tabName }}
                </button>
            @endforeach
        </div>

        <!-- switch tabs -->
        <div class="mt-4">
            @if($selectedTab == '1')
                <livewire:components.user-table :users="$users" />
            @elseif($selectedTab == '2')
                <livewire:components.user-table :users="$users" />
            @elseif($selectedTab == '3')
                <livewire:components.user-table :users="$users" />
            @elseif($selectedTab == '4')
                <livewire:components.user-table :users="$users" />
            @else
                <p class="text-lg text-center">{{ $tabValues[$selectedTab] }}</p>
            @endif
        </div>

    </div>
</div>
