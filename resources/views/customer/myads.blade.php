<x-customer-layout>
    <br/>
    <h1 class="text-3xl font-bold mb-6 text-center">My Ads</h1>

    @if($ads->count() > 0)
        <div class="overflow-x-auto px-4">
            <table class="w-full mx-auto rounded shadow text-center">
                <thead class="bg-green-600 text-white">
                    <tr>
                        <th class="p-2 w-[400px]">Title</th>
                        <th class="p-2 w-[120px]">Price</th>
                        <th class="p-2 w-[120px]">Condition</th>
                        <th class="p-2 w-[200px]">Location</th>
                        <th class="p-2 w-[200px]">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ads as $ad)
                        <tr class="border-b">
                            <td class="p-2">{{ $ad->title }}</td>
                            <td class="p-2">{{ $ad->price }} EUR</td>
                            <td class="p-2">{{ ucfirst($ad->condition) }}</td>
                            <td class="p-2">{{ $ad->location }}</td>
                            <td class="p-2 space-x-2">
                                <form action="{{ route('my-ads.edit', $ad->id) }}" method="GET" class="inline-block">
                                    <button type="submit" class="bg-yellow-400 text-black px-3 py-1 rounded hover:bg-yellow-500 transition-colors inline-block">
                                        Edit
                                    </button>
                                </form>
                                <form action="{{ route('my-ads.destroy', $ad->id) }}" method="POST" class="inline-block"
                                      onsubmit="return confirm('Are you sure you want to delete this ad?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition-colors">
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
            {{ $ads->links() }}
        </div>
    @else
        <p class="text-gray-600 text-center">You don't have any ads yet.</p>
    @endif
</x-customer-layout>