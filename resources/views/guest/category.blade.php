<x-front-layout :categories="$categories">
    <div class="space-y-6">

        <h1 class="text-3xl font-bold text-green-700">
            {{ $category->name }}
        </h1>

        @if($ads->isEmpty())
            <div class="p-6 bg-white shadow rounded-lg">
                <p class="text-gray-600">Right now, there is no ads in this category.</p>
            </div>
        @endif

         @foreach ($ads as $ad)
            <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">

                <h2 class="text-lg font-semibold line-clamp-2">
                    {{ $ad->title }}
                </h2>

                <p class="mt-2 text-gray-600 text-sm line-clamp-2">
                    {{ $ad->description }}
                </p>

                <p class="mt-3 font-bold text-green-600">
                    {{ $ad->price }} RSD
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
</x-front-layout>