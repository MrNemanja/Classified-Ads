<x-form-layout>
     <h1 class="text-3xl font-bold mb-6">Create User</h1>

    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="w-full mt-1" value="{{ old('name') }}" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="w-full mt-1" value="{{ old('email') }}" required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" name="password" type="password" class="w-full mt-1" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="password" :value="__('Confirm Password')" />
            <x-text-input id="password" name="password_confirmation" type="password" class="w-full mt-1" required />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200 focus:border-green-500" required>
                <option value="">-- Choose Role --</option>
                <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>Customer</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-primary-button class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded">
                Create User
            </x-primary-button>
        </div>
    </form>
</x-form-layout>