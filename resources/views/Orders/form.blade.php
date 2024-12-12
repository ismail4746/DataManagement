<x-layout>

    <x-slot:heading>Create New Order</x-slot:heading>

    <div class="w-full max-w-2xl mx-auto p-8 bg-white shadow-lg rounded-lg">
        <!-- Page Heading -->
        <h1 class="text-2xl font-bold text-gray-800 text-center mb-6">Create a New Order</h1>

        <!-- Order Creation Form -->
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <!-- Display the logged-in customer's name -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Customer Name</label>
                <p class="py-2">{{ $customer->name }}</p> <!-- Show the name of the logged-in customer -->
            </div>

            <!-- Pass the customer ID as a hidden input -->
            <input type="hidden" name="customer_id" value="{{ $customer->customer_id }}">

            <!-- Product Name -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="product_name">Product Name</label>
                <input
                    type="text"
                    name="product_name"
                    id="product_name"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-indigo-300"
                    required>
            </div>

            <!-- Quantity -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="quantity">Quantity</label>
                <input
                    type="number"
                    name="quantity"
                    id="quantity"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-indigo-300"
                    required>
            </div>

            <!-- Price -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="price">Price</label>
                <input
                    type="number"
                    name="price"
                    id="price"
                    class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-indigo-300"
                    step="0.01"
                    required>
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="px-6 py-2 font-semibold text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                Create Order
            </button>
        </form>



        <!-- Success Message -->
        @if(session('success'))
            <div class="mt-6">
                <p class="text-lg font-medium text-center text-green-600">{{ session('success') }}</p>
            </div>
        @endif
    </div>

</x-layout>
