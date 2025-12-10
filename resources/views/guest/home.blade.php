<x-front-layout :categories="$categories">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach ($ads as $ad)
            <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">

                <h2 class="text-lg font-semibold line-clamp-2">
                    {{ $ad->title }}
                </h2>

                <p class="mt-2 text-gray-600 text-sm line-clamp-2">
                    {{ $ad->description }}
                </p>

                <p class="mt-3 font-bold text-green-600">
                    {{ $ad->price }} EUR
                </p>

                <a 
                    href="{{ route('ad.single', $ad->id) }}" 
                    class="inline-block mt-4 px-3 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition"
                >
                    View Details
                </a>

            </div>
        @endforeach

        <div class="mt-4">
            {{ $ads->links() }}
        </div>

    </div>

    @if($ads->isEmpty())
        <p class="mt-6 text-gray-500 text-center">There are no ads right now.</p>
    @endif

</div>
</x-front-layout>
