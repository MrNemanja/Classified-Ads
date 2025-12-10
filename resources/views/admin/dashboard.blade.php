<x-admin-layout>
    <br/>
    <div class="p-6 bg-white rounded shadow-md max-w-3xl mx-auto mt-10 text-center">
        <h1 class="text-3xl font-bold mb-6">Welcome, {{ auth()->user()->name }}!</h1>
        <p class="text-lg mb-4">Here is an overview of your application:</p>

        <div class="grid grid-cols-3 gap-6 mt-6">
            <div class="bg-green-100 p-4 rounded shadow">
                <h2 class="text-xl font-semibold">Users</h2>
                <p class="text-2xl mt-2">{{ $usersCount }}</p>
            </div>

            <div class="bg-green-100 p-4 rounded shadow">
                <h2 class="text-xl font-semibold">Ads</h2>
                <p class="text-2xl mt-2">{{ $adsCount }}</p>
            </div>

            <div class="bg-green-100 p-4 rounded shadow">
                <h2 class="text-xl font-semibold">Categories</h2>
                <p class="text-2xl mt-2">{{ $categoriesCount }}</p>
            </div>
        </div>
    </div>
</x-admin-layout>