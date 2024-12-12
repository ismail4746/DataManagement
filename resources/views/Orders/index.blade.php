<x-layout>
    <x-slot:heading>Customer Orders</x-slot:heading>
    <div class="container mx-auto p-6">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Customer Orders</h1>
            <!-- Create Order Button -->
            <a href="{{ route('orders.create') }}"
                class="px-6 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 transition duration-200">
                Create Order
            </a>
        </div>

        <!-- Orders Table -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full border-collapse border border-gray-300">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th colspan="5" class="text-left py-4 px-6 text-lg font-semibold">
                            Customer Name: {{ optional($orders->first())->customer->name ?? 'N/A' }}
                        </th>
                    </tr>
                    <tr>
                        <th class="py-3 px-6 text-left text-sm font-medium uppercase border border-gray-300">ID</th>
                        <th class="py-3 px-6 text-left text-sm font-medium uppercase border border-gray-300">Product Name</th>
                        <th class="py-3 px-6 text-left text-sm font-medium uppercase border border-gray-300">Quantity</th>
                        <th class="py-3 px-6 text-left text-sm font-medium uppercase border border-gray-300">Price</th>
                        <th class="py-3 px-6 text-left text-sm font-medium uppercase border border-gray-300">Total Amount</th>
                    </tr>
                </thead>
                <tbody class="bg-gray-50 text-gray-800">
                    @foreach($orders as $order)
                        <tr class="hover:bg-gray-100 transition duration-150 ease-in-out">
                            <td class="py-3 px-6 text-sm border border-gray-300">{{ $order->id }}</td>
                            <td class="py-3 px-6 text-sm border border-gray-300">{{ $order->product_name }}</td>
                            <td class="py-3 px-6 text-sm border border-gray-300">{{ $order->quantity }}</td>
                            <td class="py-3 px-6 text-sm border border-gray-300">${{ number_format($order->price, 2) }}</td>
                            <td class="py-3 px-6 text-sm border border-gray-300">${{ number_format($order->total_amount, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- No Orders Message -->
        @if($orders->isEmpty())
            <div class="mt-6 bg-red-100 text-red-800 p-4 rounded-lg shadow-md">
                <p>No orders found for this customer.</p>
            </div>
        @endif
    </div>
</x-layout>
