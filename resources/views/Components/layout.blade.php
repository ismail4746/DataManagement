<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FirstApp</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- SweetAlert2 CSS (Optional) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.15/dist/sweetalert2.min.css">
    <!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- DataTables Bootstrap CSS (optional, for styling with Bootstrap) -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">

</head>

<body class="font-sans antialiased bg-gradient-to-r from-blue-50 to-green-100">

    <!-- Navbar -->
    <nav class="top-0 z-10 w-full bg-transparent shadow-xl">
        <div class="flex items-center justify-between px-6 py-4 mx-auto space-x-6 max-w-7xl">
            <a href="#" class="text-3xl font-extrabold text-transparent transition-all duration-300 ease-in-out bg-clip-text bg-gradient-to-r from-blue-600 to-green-500 hover:scale-110">
                FirstApp
            </a>
            <div class="flex space-x-6">
                <a href="/" class="text-lg font-medium text-gray-800 transition duration-300 hover:text-blue-600">Home</a>
                <a href="/about" class="text-lg font-medium text-gray-800 transition duration-300 hover:text-blue-600">About</a>
                <a href="/contact" class="text-lg font-medium text-gray-800 transition duration-300 hover:text-blue-600">Contact</a>
            </div>
            <!-- Logout Button -->
            <a href="/logout" class="px-2 py-1 text-lg font-semibold text-white transition-all duration-300 rounded-lg bg-gradient-to-r from-blue-500 to-teal-500 hover:bg-gradient-to-l">
                Logout
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container px-6 py-16 mx-auto mt-16">
        <h1 class="mb-12 text-5xl font-bold text-center text-gray-800">
            {{$heading}}
        </h1>
        {{$slot}} <!-- Dynamic content injected here -->
    </main>

    <!-- SweetAlert2 JS - Ensure this is loaded BEFORE your custom scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.15/dist/sweetalert2.min.js"></script>

    <!-- SweetAlert2 Handling (e.g., delete confirmation) -->
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

    <!-- Add SweetAlert2 Delete Confirmation -->
    <script>
        document.querySelectorAll('.delete-product').forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Prevent form submission
                const form = this.closest('form'); // Get the form

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Submit the form if confirmed
                    }
                });
            });
        });
    </script>

</body>

</html>
