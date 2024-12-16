<x-layout>
    <x-slot:heading>
        Edit Product
</x-slot:heading>
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-lg p-8 bg-white rounded-lg shadow-lg">

            <form action="{{ route('update.product', ['id' => $product->product_id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="product_image" class="block mb-1 text-sm font-medium text-gray-700">Product Image</label>
                    <input
                        type="file"
                        name="product_image"
                        id="product_image"
                        class="w-full px-4 py-3 border rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('product_image') border-red-500 @enderror"
                    >
                    @error('product_image')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror

                    <!-- Display Current Product Image -->
                    @if ($product->image_path)
                        <div class="mt-4">
                            <p class="text-sm text-gray-500">Current Image:</p>
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="Product Image" class="w-24 h-24 rounded-lg">
                        </div>
                    @endif
                </div>

                <!-- Product Name -->
                <div>
                    <label for="product_name" class="block mb-1 text-sm font-medium text-gray-700">Product Name</label>
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
                    <label for="product_description" class="block mb-1 text-sm font-medium text-gray-700">Product Description</label>
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
                    <label for="product_price" class="block mb-1 text-sm font-medium text-gray-700">Product Price</label>
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
                    <label for="customer_id" class="block mb-1 text-sm font-medium text-gray-700">Customer</label>
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
                        class="w-full px-6 py-3 text-white bg-indigo-600 rounded-lg shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                    >
                        Update Product
                    </button>
                </div>
            </form>
        </div>
    </div>

</x-layout>
