<div class="w-64 p-4 border-r text-secondary bg-primary border-secondary">
    @auth
        @php
            $user = Auth::user();
            $roles = $user->roles->pluck('name')->toArray();
        @endphp

        <!-- admin -->
        @if (in_array('admin', $roles))
            <livewire:auth.admin.sidebar :role="'admin'" />

        <!-- employee -->
        @elseif (in_array('employee', $roles))
            <livewire:auth.employee.sidebar :role="'employee'" />

        <!-- client -->
        @elseif (in_array('client', $roles))
            <livewire:auth.client.sidebar :role="'client'" />
        @else
            <p>No sidebar available for your role.</p>
        @endif
    @endauth
</div>
