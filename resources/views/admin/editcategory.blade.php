<x-form-layout>
     <h1 class="text-3xl font-bold mb-6">Edit Category</h1>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <x-input-label for="name" :value="__('Category Name')" />
            <x-text-input id="name" name="name" type="text" class="w-full mt-1" value="{{ old('name', $category->name) }}" required />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div class="mb-4">
            <x-input-label for="parent_id" :value="__('Parent Category')" />
            <select id="parent_id" name="parent_id" class="w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-green-200 focus:border-green-500">
                <option value="">-- None --</option>
                @foreach($categories as $cat)
                    @if($cat->id != $category->id)
                        <option value="{{ $cat->id }}" {{ old('parent_id', $category->parent_id) == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endif
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('parent_id')" class="mt-2" />
        </div>

        <div class="mt-6">
            <x-primary-button class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded">
                Update Category
            </x-primary-button>
        </div>
    </form>
</x-form-layout>