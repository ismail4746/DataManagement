<x-layout>
    <x-slot:heading>Create New Product</x-slot:heading>
    <div class="container p-6 mx-auto">

        <div class="max-w-lg p-6 mx-auto bg-white rounded-lg shadow-lg">
            <form action="{{ route('store.product') }}" method="POST">
                @csrf
                <!-- Product Name -->
                <div class="mb-6">
                    <label for="product_name" class="block mb-2 text-lg font-medium text-gray-700">Product Name:</label>
                    <input type="text" name="product_name" id="product_name" required
                        class="w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" value="{{old('product_name')}}">
                </div>

                <!-- Product Description -->
                <div class="mb-6">
                    <label for="product_description" class="block mb-2 text-lg font-medium text-gray-700">Product Description:</label>
                    <textarea name="product_description" id="product_description" required
                        class="w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" rows="4" value={{old('product_description')}}></textarea>
                </div>

                <!-- Product Price -->
                <div class="mb-6">
                    <label for="product_price" class="block mb-2 text-lg font-medium text-gray-700">Product Price ($):</label>
                    <input type="number" name="product_price" id="product_price" required
                        class="w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" value="{{old('product_price')}}">
                </div>

                <!-- Customer Selection -->
                <div class="mb-6">
                    <label for="customer_id" class="block mb-2 text-lg font-medium text-gray-700">Customer:</label>
                    <select id="customer_id" name="customer_id" required
                        class="w-full p-3 border-2 border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="" disabled selected>Select a Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->customer_id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit" class="px-8 py-3 text-lg font-medium text-white transition duration-200 bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Create Product</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
