{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Orders</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    {{-- <div class="container mx-auto p-6">
        <!-- Page Header -->
        <header class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800 text-center">Customer Orders</h1>
        </header>

        <!-- Orders Table -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full border-collapse border border-gray-300">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th colspan="5" class="text-left py-4 px-6 text-lg font-semibold">
                            Customer Name: {{ @$orders[0]?->customer?->name ?? 'N/A' }}
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
    </div> --}}
</body>
</html> --}}
