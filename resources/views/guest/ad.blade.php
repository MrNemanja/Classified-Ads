<x-front-layout :categories="$categories">

     <div class="bg-white shadow rounded-lg p-6">

        <h1 class="text-3xl font-bold text-green-700">
            {{ $ad->title }}
        </h1>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 gap-8">

            <div>
                @if($ad->image_path)
                    <img 
                        src="{{ asset('storage/' . $ad->image_path) }}"
                        class="w-full rounded-lg shadow"
                        alt="Ad Image"
                    >
                @else
                    <div class="w-full h-64 bg-gray-200 flex items-center justify-center text-gray-500 rounded-lg">
                        No image
                    </div>
                @endif
            </div>

            <div class="space-y-4">

                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Description</h2>
                    <p class="text-gray-600 mt-1">{{ $ad->description }}</p>
                </div>

                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Price</h2>
                    <p class="text-green-700 font-bold text-2xl mt-1">
                        {{ number_format($ad->price, 2) }} EUR
                    </p>
                </div>

                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Condition</h2>
                    <p class="text-gray-700 mt-1">{{ ucfirst($ad->condition) }}</p>
                </div>

                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Location</h2>
                    <p class="text-gray-700 mt-1">{{ $ad->location }}</p>
                </div>

                <div>
                    <h2 class="text-xl font-semibold text-gray-800">Contact</h2>
                    <p class="text-gray-700 mt-1">{{ $ad->contact_phone }}</p>
                </div>

                <a 
                    href="{{ url()->previous() }}"
                    class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition"
                >
                    Back
                </a>

            </div>

        </div>

    </div>

</x-front-layout>
