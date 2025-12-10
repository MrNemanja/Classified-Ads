<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-green-50 min-h-screen flex flex-col">

    <header class="bg-green-600 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center h-16">
            <a href="{{ route('home') }}" class="text-2xl font-bold">MyAds</a>

            <div class="flex space-x-4">
                <a href="{{ route('login') }}" class="px-4 py-2 rounded-md bg-green-700 hover:bg-green-800 transition-colors">
                    Login
                </a>
                <a href="{{ route('register') }}" class="px-4 py-2 rounded-md bg-green-700 hover:bg-green-800 transition-colors">
                    Register
                </a>
            </div>
        </div>
    </header>

    <div class="w-full flex justify-center mt-6">
        <form action="{{ route('search') }}" method="GET"
            class="flex flex-wrap items-center gap-2 p-3 max-w-7xl w-full">

            <input type="text" name="title" placeholder="Title"
                class="border p-1.5 rounded w-32">

            <input type="text" name="description" placeholder="Description"
                class="border p-1.5 rounded w-32">

            <input type="text" name="location" placeholder="Location"
                class="border p-1.5 rounded w-32">

            <input type="number" name="price_min" placeholder="Min"
                class="border p-1.5 rounded w-20">

            <input type="number" name="price_max" placeholder="Max"
                class="border p-1.5 rounded w-20">

            <select name="category_id" class="border p-1.5 rounded w-32">
                <option value="">All categories</option>
                @foreach($categories as $category)
                    @include('components.category-option', ['category' => $category, 'prefix' => ''])
                @endforeach
            </select>

            <button class="bg-green-600 text-white py-1.5 px-3 rounded hover:bg-green-700 whitespace-nowrap">
                Filter
            </button>
        </form>
    </div>

    <div class="flex flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 space-x-6">

        <aside class="w-64 bg-white rounded-lg shadow p-4">
            <h2 class="text-lg font-semibold mb-4">Categories</h2>
            <ul class="space-y-2">
                @include('components.category-tree', ['categories' => $categories])
            </ul>
        </aside>

        <main class="flex-1 bg-white rounded-lg shadow p-6">
           @if(session('success'))
                <script>
                    alert("{{ session('success') }}");
                </script>
            @endif
            {{ $slot }}
        </main>

    </div>

    <footer class="bg-green-600 text-white py-4 mt-auto">
        <div class="max-w-7xl mx-auto text-center">
            &copy; {{ date('Y') }} MyAds. All rights reserved.
        </div>
    </footer>

</body>
</html>