<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-gray-100">

    <header class="bg-green-600 text-white shadow-md">
        <div class="w-full mx-auto flex items-center h-16 px-4">

            <div class="flex items-center space-x-3" style="margin-left: 145px;">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center">
                    <svg class="w-7 h-7 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.7 0 4.9-2.2 4.9-4.9S14.7 2.2 12 2.2 7.1 4.4 7.1 7.1 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                    </svg>
                </div>
                &nbsp;
                <span class="text-lg font-semibold">{{ auth()->user()->name }}</span>
            </div>

            <div class="flex-1"></div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" 
                    class="px-4 py-2 rounded-md bg-green-700 hover:bg-green-800 text-white"
                    style="margin-right: 80px;">
                    Logout
                </button>
            </form>

         </div>
    </header>

    <div class="flex flex-1">

        <aside class="w-44 bg-green-600 text-white flex flex-col p-6 space-y-4 shadow-lg">

            <h2 class="text-xl font-semibold mb-4">Navigation</h2>

            <nav class="flex flex-col space-y-2">

                <a href="{{ route('admin.ads.index') }}"
                   class="flex items-center space-x-2 px-3 py-2 rounded hover:bg-green-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M3 7h18M3 12h18M3 17h18"/>
                    </svg>
                    <span>All Ads</span>
                </a>

                <a href="{{ route('admin.users.index') }}"
                   class="flex items-center space-x-2 px-3 py-2 rounded hover:bg-green-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M3 7h18M3 12h18M3 17h18"/>
                    </svg>
                    <span>All Users</span>
                </a>

                <a href="{{ route('admin.categories.index') }}"
                   class="flex items-center space-x-2 px-3 py-2 rounded hover:bg-green-600 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M3 7h18M3 12h18M3 17h18"/>
                    </svg>
                    <span>All Categories</span>
                </a>

                <a href="{{ route('admin.ads.create') }}"
                   class="flex items-center space-x-2 px-3 py-2 rounded hover:bg-green-600 transition">
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Create Ad</span>
                </a>

                <a href="{{ route('admin.users.create') }}"
                   class="flex items-center space-x-2 px-3 py-2 rounded hover:bg-green-600 transition">
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Create User</span>
                </a>

                <a href="{{ route('admin.categories.create') }}"
                   class="flex items-center space-x-2 px-3 py-2 rounded hover:bg-green-600 transition">
                   <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" 
                              d="M12 4v16m8-8H4"/>
                    </svg>
                    <span>Create Category</span>
                </a>
            </nav>
        </aside>

        <main class="flex-1 p-50">
            @if(session('success'))
                <script>
                    alert("{{ session('success') }}");
                </script>
            @endif
            {{ $slot }}
        </main>
    </div>

</body>
</html>