<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #eff6ff, #d1fae5);
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .login-header {
            background: linear-gradient(to right, #3b82f6, #10b981);
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="w-full max-w-md login-container ">
        <!-- Header -->
        <div class="login-header ">
            <h1 class="text-3xl font-bold">Welcome Back!</h1>
            <p class="text-sm">Log in to access your account</p>
        </div>

        <!-- Login Form -->
        <div class="p-8">
            @if(session('error'))
                <div class="p-4 mb-4 text-red-700 bg-red-100 border border-red-300 rounded">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST">
                @csrf

                <!-- Email Input -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                    <input type="email" name="email" id="email"
                           class="w-full p-3 mt-2 transition-all border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           value="{{ old('email') }}" placeholder="Enter your email">
                    @error('email')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="mb-6">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password"
                           class="w-full p-3 mt-2 transition-all border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Enter your password">
                    @error('password')
                        <span class="mt-1 text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Login Button -->
                <button type="submit"
                        class="w-full py-3 text-white transition-all rounded-lg bg-gradient-to-r from-blue-500 to-green-500 hover:bg-gradient-to-l focus:outline-none focus:ring-4 focus:ring-green-300">
                    Login
                </button>

                <!-- Forgot Password -->
                <div class="mt-6 text-sm text-center text-gray-500">
                    <p>Forgot your password? <a href="#" class="text-blue-500 hover:underline">Reset here</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
