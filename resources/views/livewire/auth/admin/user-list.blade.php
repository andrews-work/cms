<div class="flex justify-center w-full">
    <div class="w-2/3 p-4">
        <!-- Tab names -->
        <div class="flex mb-6 space-x-4">
            @foreach($tabs as $tabKey => $tabName)
                <button wire:click="$set('selectedTab', '{{ $tabKey }}')"
                        class="px-4 w-full py-2 border rounded {{ $selectedTab == $tabKey ? 'bg-primary text-secondary' : 'bg-primary text-secondary' }} hover:bg-tertiary">
                    {{ $tabName }}
                </button>
            @endforeach
        </div>

        <!-- Switch tabs -->
        <div class="mt-4">
            <livewire:components.user-table :users="$users" :key="'tab-' . $selectedTab" />
        </div>
    </div>
</div>
