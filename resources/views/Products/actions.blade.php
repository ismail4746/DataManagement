<div class="flex items-center space-x-2">
    <!-- Edit Button -->
    <a href="{{ route('edit.product', ['id' => $product->product_id]) }}"
        class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 focus:outline-none">
        Edit
    </a>

    <!-- Delete Button -->
    <form id="delete-form-{{ $product->product_id }}" action="{{ route('products.delete', ['id' => $product->product_id]) }}" method="POST" class="inline-block">
        @csrf
        @method('DELETE')
        <button type="button" onclick="deleteButton({{ $product->product_id }})" class="px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-600 focus:ring-2 focus:ring-red-400 focus:outline-none">
            Delete
        </button>
    </form>
</div>
