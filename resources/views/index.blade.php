<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Orders</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans leading-normal tracking-normal bg-gray-100">

    <div class="px-4 py-8 mx-auto max-w-7xl">
        <!-- Page Title -->
        <h1 class="mb-8 text-3xl font-semibold text-center text-gray-800">All Orders</h1>

        <!-- Success Message -->
        @if (session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-100 rounded-lg">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <!-- Create Order Button -->
        <div class="mb-6 text-right">
            <a href="{{ route('orders.create') }}"
                class="inline-block px-6 py-2 font-semibold text-white transition duration-300 bg-blue-500 rounded-lg shadow-md hover:bg-blue-600">
                Create a New Order
            </a>
        </div>

        <!-- Orders Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow-lg">
            <table class="w-full text-left border-collapse table-auto">
                <thead>
                    <tr class="bg-indigo-100">
                        <th class="px-6 py-3 text-sm font-medium text-gray-700">Order ID</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-700">Customer Name</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-700">Product Name</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-700">Quantity</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-700">Price</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-700">Total Amount</th>
                        <th class="px-6 py-3 text-sm font-medium text-gray-700">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $order->id }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $order->customer->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $order->product_name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $order->quantity }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $order->price }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $order->total_amount }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $order->created_at->format('M d, Y h:i A') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex items-center justify-between mt-6">
            <!-- Display pagination links -->
            <div class="flex items-center space-x-4">
                <!-- Previous page button -->
                <a href="{{ $orders->previousPageUrl() }}" class="px-4 py-2 text-sm font-semibold text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                   {{ $orders->onFirstPage() ? 'disabled' : '' }}>
                    Previous
                </a>

                <!-- Page links -->
                <div class="flex space-x-2">
                    @foreach($orders->getUrlRange(1, $orders->lastPage()) as $page => $url)
                        <a href="{{ $url }}" class="px-3 py-2 text-sm font-semibold text-gray-600 border border-gray-300 rounded-lg hover:bg-indigo-500 hover:text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 {{ $page == $orders->currentPage() ? 'bg-indigo-500 text-white' : '' }}">
                            {{ $page }}
                        </a>
                    @endforeach
                </div>

                <!-- Next page button -->
                <a href="{{ $orders->nextPageUrl() }}" class="px-4 py-2 text-sm font-semibold text-gray-600 border border-gray-300 rounded-lg hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                   {{ $orders->hasMorePages() ? '' : 'disabled' }}>
                    Next
                </a>
            </div>
        </div>

    </div>

</body>
</html>
