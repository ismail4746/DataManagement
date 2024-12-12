<x-layout>
    <x-slot:heading>
        All Products
    </x-slot:heading>

    <div class="container px-6 py-8 mx-auto">
        <!-- Success and Error Notifications -->
        @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success!',
                text: '{{ session('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
        @endif

        @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: '{{ session('error') }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
        @endif

        <!-- Header Section -->
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-semibold text-gray-800">All Products</h2>

            <!-- Create New Product Button -->
            <a href="{{ route('create.product') }}"
               class="px-6 py-3 text-sm font-medium text-white bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-400 focus:ring-offset-2">
                + Add Product
            </a>
        </div>

        <!-- Products Table -->
        <div class="pt-3 mb-3 overflow-hidden bg-white rounded-lg shadow">
            <table id="products-table" class="w-full border-collapse table-auto">
                <thead class="bg-indigo-600 ">
                    <tr class="m-3">
                        <th class="px-4 py-2 text-left text-white">Product Name</th>
                        <th class="px-4 py-2 text-left text-white">Description</th>
                        <th class="px-4 py-2 text-left text-white">Price</th>
                        <th class="px-4 py-2 text-left text-white">Customer</th>
                        <th class="px-4 py-2 text-left text-white">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">

                </tbody>
            </table>
        </div>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#products-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('view.products') }}',
                columns: [
                    { data: 'product_name', name: 'product_name' },
                    { data: 'product_description', name: 'product_description' },
                    { data: 'product_price', name: 'product_price' },
                    { data: 'customer.name', name: 'customer.name' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                pageLength: 10,
                responsive: true,
                language: {
                    emptyTable: "No products available",
                },
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf'],
                createdRow: function (row, data, dataIndex) {
                    $(row).css({
                        'background-color': '#f9fafb',
                    });
                },
                initComplete: function () {
                    $('.dataTables_filter input').addClass('custom-search').attr('placeholder', 'Search Products...');
                }
            });

            $('<style>')
                .prop('type', 'text/css')
                .html(`
                    .custom-search {
                        border: 1px solid #ddd;
                        border-radius: 6px;
                        padding: 8px 12px;
                        width: 250px;
                        margin-right: 8px;
                    }
                    .custom-search:focus {
                        border-color: #4f46e5;
                        box-shadow: 0 0 4px #4f46e5;
                        outline: none;
                    }
                    .dataTables_filter label {
                        font-weight: 600;
                    }
                `)
                .appendTo('head');
        });

        function deleteButton(productId) {
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + productId).submit();
                }
            });
        }
    </script>
</x-layout>
