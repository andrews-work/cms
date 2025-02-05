<!-- resources/views/livewire/auth/dashboard/main.blade.php -->
<div>
    @if ($view === 'tasks')
        <livewire:auth.dashboard.tasks />
    @elseif ($view === 'messages')
        <livewire:auth.dashboard.messages />
    @elseif ($view === 'meetings')
        <livewire:auth.dashboard.meetings />
    @endif
</div>
