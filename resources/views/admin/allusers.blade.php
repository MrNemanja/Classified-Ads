<x-admin-layout>
    <br />
    <h1 class="text-3xl font-bold mb-6 text-center">All Users</h1>

    @if($users->count() > 0)
        <div class="overflow-x-auto px-4">
            <table class="w-full mx-auto rounded shadow text-center">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="p-2 w-[200px]">Name</th>
                        <th class="p-2 w-[250px]">Email</th>
                        <th class="p-2 w-[150px]">Role</th>
                        <th class="p-2 w-[200px]">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="border-b">
                            <td class="p-2">{{ $user->name }}</td>
                            <td class="p-2">{{ $user->email }}</td>
                            <td class="p-2">{{ ucfirst($user->role) }}</td>
                            <td class="p-2 space-x-2">
                                <form action="{{ route('admin.users.edit', $user->id) }}" method="GET" class="inline-block">
                                    <button type="submit" class="bg-yellow-400 text-black px-3 py-1 rounded hover:bg-yellow-500 transition-colors inline-block">
                                        Edit
                                    </button>
                                </form>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-block bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition-colors">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    @else
        <p class="text-gray-600">No users found.</p>
    @endif
</x-admin-layout>