<x-layout>
    <x-slot:heading>
        Your Data, Made Easy to Manage
    </x-slot:heading>

    @if(session('success'))
        <div id="success-dialog" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-green-500 text-white px-4 py-2 rounded-md shadow-md z-50">
            {{ session('success') }}
        </div>
    @endif
    <!-- Action Cards -->
    <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Register Card -->
        <div class="transition duration-500 ease-in-out transform bg-white rounded-lg shadow-xl hover:shadow-2xl hover:scale-105">
            <div class="p-8">
                <div class="flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7v6m8-6v6m-4-3h4m-8 0H8m8-5h-8c-1.104 0-2 .896-2 2v12c0 1.104.896 2 2 2h8c1.104 0 2-.896 2-2V9c0-1.104-.896-2-2-2z" />
                    </svg>
                </div>
                <h2 class="mb-4 text-2xl font-semibold text-center text-gray-800">Register New Customer</h2>
                <p class="mb-6 text-center text-gray-600">Easily create a new customer profile and manage their information.</p>
                <button onclick="window.location.href='/register'" class="w-full py-3 font-semibold text-white transition-all duration-300 rounded-lg shadow-md bg-gradient-to-r from-blue-500 to-teal-500 hover:bg-gradient-to-l">
                    Go to Registration
                </button>
            </div>
        </div>

        <!-- View Customers Card -->
        <div class="transition duration-500 ease-in-out transform bg-white rounded-lg shadow-xl hover:shadow-2xl hover:scale-105">
            <div class="p-8">
                <div class="flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-teal-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 19l-6-6m0 0l-6 6m6-6V5m-4 0H5m9 7H5m9 0H5" />
                    </svg>
                </div>
                <h2 class="mb-4 text-2xl font-semibold text-center text-gray-800">View Customers</h2>
                <p class="mb-6 text-center text-gray-600">Explore and manage your customers' data.</p>
                <button onclick="window.location.href='/customers'" class="w-full py-3 font-semibold text-white transition-all duration-300 rounded-lg shadow-md bg-gradient-to-r from-teal-500 to-blue-500 hover:bg-gradient-to-l">
                    View Customers
                </button>
            </div>
        </div>

        <!-- Orders Card -->
        <div class="transition duration-500 ease-in-out transform bg-white rounded-lg shadow-xl hover:shadow-2xl hover:scale-105">
            <div class="p-8">
                <div class="flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5v14h6V5m-6 7h6m-6 4h6" />
                    </svg>
                </div>
                <h2 class="mb-4 text-2xl font-semibold text-center text-gray-800">Manage Orders</h2>
                <p class="mb-6 text-center text-gray-600">Create, view, and manage customer orders seamlessly.</p>
                <button onclick="window.location.href='/orders'" class="w-full py-3 font-semibold text-white transition-all duration-300 rounded-lg shadow-md bg-gradient-to-r from-green-500 to-yellow-500 hover:bg-gradient-to-l">
                    View Orders
                </button>
            </div>
        </div>


        <div class="transition duration-500 ease-in-out transform bg-white rounded-lg shadow-xl hover:shadow-2xl hover:scale-105">
            <div class="p-8">
                <div class="flex items-center justify-center mb-6">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12M6 12h12" />
                    </svg>
                </div>
                <h2 class="mb-4 text-2xl font-semibold text-center text-gray-800">Manage Product</h2>
                <p class="mb-6 text-center text-gray-600">Add, view, and manage products easily.</p>
                <button onclick="window.location.href='/products'" class="w-full py-3 font-semibold text-white transition-all duration-300 rounded-lg shadow-md bg-gradient-to-r from-blue-500 to-teal-500 hover:bg-gradient-to-l">
                    View Products
                </button>
            </div>
        </div>

    </div>

    @if(session('success'))
    <script>
        toastr.success("{{ session('success') }}", "Success");
    </script>
@endif

@if($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error("{{ $error }}", "Error");
        </script>
    @endforeach
@endif
   
</x-layout>
