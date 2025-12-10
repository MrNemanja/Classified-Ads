<x-form-layout>
    <h1 class="text-3xl font-bold mb-6">Edit Ad</h1>

     <form method="POST" action="{{ route('my-ads.update', $ad->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" value="{{ old('title', $ad->title) }}" required autofocus />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />
            <textarea id="description" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-200" name="description" required>{{ old('description', $ad->description) }}</textarea>
            <x-input-error :messages="$errors->get('description')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="price" :value="__('Price (EUR)')" />
            <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" value="{{ old('price', $ad->price) }}" min="0" required />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="condition" :value="__('Condition')" />
            <select id="condition" name="condition" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-200" required>
                <option value="">-- Choose condition --</option>
                <option value="new" {{ old('condition', $ad->condition) == 'new' ? 'selected' : '' }}>New</option>
                <option value="used" {{ old('condition', $ad->condition) == 'used' ? 'selected' : '' }}>Used</option>
            </select>
            <x-input-error :messages="$errors->get('condition')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="image" :value="__('Image')" />
            @if($ad->image_path)
                <div class="mb-2">
                    <img src="{{ asset('storage/'.$ad->image_path) }}" alt="Current Image" class="h-24 rounded">
                </div>
            @endif
            <input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
            <p class="text-sm text-gray-500 mt-1">Leave empty to keep current image.</p>
        </div>

        <div class="mt-4">
            <x-input-label for="phone" :value="__('Phone number')" />
            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="contact_phone" value="{{ old('contact_phone', $ad->contact_phone) }}" required />
            <x-input-error :messages="$errors->get('contact_phone')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="location" :value="__('Location')" />
            <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" value="{{ old('location', $ad->location) }}" required />
            <x-input-error :messages="$errors->get('location')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="category_id" :value="__('Category')" />
            <select id="category_id" name="category_id" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm focus:border-green-500 focus:ring focus:ring-green-200" required>
                <option value="">-- Choose Category --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $ad->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4 px-4 py-2 rounded-md text-white bg-green-700 hover:bg-green-800 transition-colors duration-200">
                {{ __('Update Ad') }}
            </x-primary-button>
        </div>
    </form>
</x-form-layout>