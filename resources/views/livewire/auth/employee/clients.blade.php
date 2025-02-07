<div class="overflow-x-auto rounded-lg shadow-md bg-primary">
    <table class="min-w-full table-auto">
        <thead class="text-2xl bg-primary">
            <tr>
                <th class="px-6 py-3 text-left">Name</th>
                <th class="px-6 py-3 text-left">Email</th>
                <th class="px-6 py-3 text-left">Date started</th>
                <th class="px-6 py-3 text-left">Status</th>
                <th class="px-6 py-3 text-left">Country</th>
                <th class="px-6 py-3 text-left">View</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
                <tr class="border-b">
                    <td class="px-6 py-3">{{ $user->name }}</td>
                    <td class="px-6 py-3">{{ $user->email }}</td>
                    <td class="px-6 py-3">{{ $user->created_at->format('M d, Y') }}</td>
                    <td class="px-6 py-3">{{ $user->status }}</td>
                    <td class="px-6 py-3">{{ $user->country ?? 'N/A' }}</td>
                    <td class="px-6 py-3">

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
