@foreach($categories as $category)
    <li>
        <div class="flex items-center justify-between">
            <a href="{{ route('category.show', $category->id) }}" 
               class="block px-2 py-1 rounded hover:bg-green-100 transition-colors">
                {{ $category->name }}
            </a>

            @if($category->children->count())
                <button 
                    class="ml-2 text-green-600 hover:text-green-800 focus:outline-none"
                    onclick="
                        const list = this.parentElement.parentElement.querySelector('.children-list');
                        list.classList.toggle('hidden');
                    "
                >
                    ▼
                </button>
            @endif
        </div>

        @if($category->children->count())
            <ul class="ml-4 mt-1 space-y-1 hidden children-list">
                @include('components.category-tree', ['categories' => $category->children])
            </ul>
        @endif
    </li>
@endforeach