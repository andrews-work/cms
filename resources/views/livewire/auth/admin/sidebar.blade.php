<div>

    <ul class="border-b border-bg-secondary">
        <li class="m-2">
            <button wire:click="navigate('admin.messages')" class="w-full p-2 text-left hover:bg-tertiary">Messages</button>
        </li>
        <li class="m-2">
            <button wire:click="navigate('admin.tasks')" class="w-full p-2 text-left hover:bg-tertiary">Tasks</button>
        </li>
        <li class="m-2">
            <button wire:click="navigate('admin.calendar')" class="w-full p-2 text-left hover:bg-tertiary">Calendar</button>
        </li>
        <li class="m-2">
            <button wire:click="navigate('admin.meetings')" class="w-full p-2 text-left hover:bg-tertiary">Meetings</button>
        </li>
    </ul>

    <ul class="border-b border-bg-secondary">
        <li class="m-2">
            <button wire:click="navigate('admin.users')" class="w-full p-2 text-left hover:bg-tertiary">Users</button>
        </li>
    </ul>

</div>
