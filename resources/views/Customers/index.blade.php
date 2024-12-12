<x-layout>
    <x-slot:heading>Customer List</x-slot:heading>
    <div class="w-full max-w-7xl mx-auto p-8 bg-white rounded-lg shadow-md">
        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-6 text-green-700 bg-green-100 border border-green-300 rounded-md p-4 flex items-center">
                <svg class="w-5 h-5 mr-2 fill-green-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-3-3a1 1 0 111.414-1.414L9 11.586l6.293-6.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                </svg>
                {{ session('success') }}
            </div>
        @endif

      <!-- Register Button -->
<div class="mb-6 flex justify-end">
    <a href="{{ route('register.form') }}"
       class="px-6 py-3 text-sm font-medium text-white bg-indigo-600 rounded-lg shadow
              hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        Register Customer
    </a>
</div>


        <!-- Table -->
        <div class="overflow-hidden border border-gray-300 rounded-lg shadow-sm">
            <table class="w-full table-auto">
                <thead class="bg-indigo-600">
                    <tr>
                        <th class="px-6 py-4 text-sm font-semibold text-left text-white">Name</th>
                        <th class="px-6 py-4 text-sm font-semibold text-left text-white">Email</th>
                        <th class="px-6 py-4 text-sm font-semibold text-left text-white">Phone</th>
                        <th class="px-6 py-4 text-sm font-semibold text-left text-white">Address</th>
                        <th class="px-6 py-4 text-sm font-semibold text-left text-white">Gender</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($customers as $customer)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $customer->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $customer->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $customer->phone }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $customer->address }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 capitalize">{{ $customer->gender }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-600">
                                No customers found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($customers->hasPages())
            <div class="flex items-center justify-between mt-6">
                <a href="{{ $customers->previousPageUrl() }}"
                   class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-gray-300 rounded-lg shadow hover:bg-gray-300
                   {{ $customers->onFirstPage() ? 'opacity-50 cursor-not-allowed' : '' }}"
                   {{ $customers->onFirstPage() ? 'aria-disabled=true tabindex=-1' : '' }}>
                    Previous
                </a>

                <div class="flex space-x-1">
                    @php
                        $startPage = max(1, $customers->currentPage() - 2);
                        $endPage = min($customers->lastPage(), $customers->currentPage() + 2);
                    @endphp
                    @foreach(range($startPage, $endPage) as $page)
                        <a href="{{ $customers->url($page) }}"
                           class="px-4 py-2 text-sm font-medium border rounded-lg
                           {{ $page == $customers->currentPage() ? 'bg-indigo-600 text-white border-indigo-600' : 'text-gray-700 bg-gray-200 hover:bg-indigo-600 hover:text-white' }}">
                            {{ $page }}
                        </a>
                    @endforeach
                </div>

                <a href="{{ $customers->nextPageUrl() }}"
                   class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 border border-gray-300 rounded-lg shadow hover:bg-gray-300
                   {{ $customers->hasMorePages() ? '' : 'opacity-50 cursor-not-allowed' }}"
                   {{ $customers->hasMorePages() ? '' : 'aria-disabled=true tabindex=-1' }}>
                    Next
                </a>
            </div>
        @endif
    </div>
</x-layout>
