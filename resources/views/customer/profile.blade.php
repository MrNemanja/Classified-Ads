<x-customer-layout>
    <div class="flex flex-col items-center justify-center text-center max-w-2xl mx-auto mt-20">

        <h1 class="text-3xl font-bold text-center">Welcome, {{ auth()->user()->name }}!</h1>

        <p class="text-lg text-center text-gray-700 mt-4">
            This is your personal dashboard. From here, you can manage all your ads, 
            create new ones, and keep track of your activity.  
            Use the navigation menu on the left to start exploring your tools.
        </p>

    </div>
</x-customer-layout>