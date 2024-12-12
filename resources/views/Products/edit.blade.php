<x-layout>
    <x-slot:heading>
        Edit Product
</x-slot:heading>
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-8">

            <form action="{{ route('update.product', ['id' => $product->product_id]) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Product Name -->
                <div>
                    <label for="product_name" class="block text-sm font-medium text-gray-700 mb-1">Product Name</label>
                    <input
                        type="text"
                        name="product_name"
                        id="product_name"
                        value="{{ old('product_name', $product->product_name) }}"
                        class="w-full px-4 py-3 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('product_name') border-red-500 @enderror"
                        placeholder="Enter product name"
                    >
                    @error('product_name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Description -->
                <div>
                    <label for="product_description" class="block text-sm font-medium text-gray-700 mb-1">Product Description</label>
                    <textarea
                        name="product_description"
                        id="product_description"
                        class="w-full px-4 py-3 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('product_description') border-red-500 @enderror"
                        placeholder="Enter product description"
                    >{{ old('product_description', $product->product_description) }}</textarea>
                    @error('product_description')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Product Price -->
                <div>
                    <label for="product_price" class="block text-sm font-medium text-gray-700 mb-1">Product Price</label>
                    <input
                        type="number"
                        name="product_price"
                        id="product_price"
                        value="{{ old('product_price', $product->product_price) }}"
                        class="w-full px-4 py-3 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('product_price') border-red-500 @enderror"
                        placeholder="Enter product price"
                    >
                    @error('product_price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Customer -->
                <div>
                    <label for="customer_id" class="block text-sm font-medium text-gray-700 mb-1">Customer</label>
                    <select
                        id="customer_id"
                        name="customer_id"
                        class="w-full px-4 py-3 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('customer_id') border-red-500 @enderror"
                    >
                        <option value="" disabled>Select a Customer</option>
                        @foreach($customers as $customer)
                            <option
                                value="{{ $customer->customer_id }}"
                                {{ old('customer_id', $product->customer_id) == $customer->customer_id ? 'selected' : '' }}
                            >
                                {{ $customer->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('customer_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button
                        type="submit"
                        class="w-full px-6 py-3 text-white bg-indigo-600 hover:bg-indigo-700 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layout>
