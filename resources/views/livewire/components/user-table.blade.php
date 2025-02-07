<div class="overflow-x-auto rounded-lg shadow-md bg-primary">
    <table class="min-w-full table-auto">
        <thead class="text-2xl bg-primary">
            <tr>
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">Email</th>
                <th class="px-6 py-3 text-left">Role</th>
                <th class="px-6 py-3 text-left">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
                <tr class="border-b">
                    <td class="px-6 py-3">{{ $user->name }}</td>
                    <td class="px-6 py-3">{{ $user->email }}</td>

                    <td class="px-6 py-3">
                        @if($editingUserId === $user->id)
                            <select wire:model="selectedRole" wire:change="updateRole({{ $user->id }}, $event.target.value)" class="bg-primary text-secondary">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        @else
                            @foreach($user->roles as $role)
                                {{ $role->name }} @if(!$loop->last), @endif
                            @endforeach
                        @endif
                    </td>

                    <td class="px-6 py-3">
                        @if($editingUserId === $user->id)
                            <a href="#" wire:click="startEditing(null)" class="ml-4 text-gray-500">Cancel</a>
                        @else
                            <a href="#" wire:click="startEditing({{ $user->id }})" class="text-blue-500">Edit</a>
                        @endif

                        <a href="#" wire:click="deleteUser({{ $user->id }})" wire:confirm="Are you sure you want to delete this user?" class="ml-4 text-red-500">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
