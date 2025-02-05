<div class="overflow-x-auto rounded-lg shadow-md bg-primary dark:bg-primary">
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
                        @foreach($user->roles as $role)
                            {{ $role->name }} @if(!$loop->last), @endif
                        @endforeach
                    </td>
                    <td class="px-6 py-3">
                        <a href="#" class="text-blue-500">Edit</a>
                        <a href="#" class="ml-4 text-red-500">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        
    </table>
</div>
