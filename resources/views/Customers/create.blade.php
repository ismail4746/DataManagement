<x-layout>
    <x-slot:heading>Customer Registration Form</x-slot:heading>

    <div class="w-full max-w-md mx-auto p-8 bg-white rounded-lg shadow-md">
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block mb-2 font-medium text-gray-700">Full Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Enter your full name"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-200 focus:ring-opacity-50"
                    value="{{ old('name') }}">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block mb-2 font-medium text-gray-700">Email Address</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your email address"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-200 focus:ring-opacity-50"
                    value="{{ old('email') }}">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block mb-2 font-medium text-gray-700">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Enter your password"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-200 focus:ring-opacity-50">
                @error('password')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Phone -->
            <div class="mb-4">
                <label for="phone" class="block mb-2 font-medium text-gray-700">Phone Number</label>
                <input
                    type="text"
                    id="phone"
                    name="phone"
                    placeholder="Enter your phone number"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-200 focus:ring-opacity-50"
                    value="{{ old('phone') }}">
                @error('phone')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Address -->
            <div class="mb-4">
                <label for="address" class="block mb-2 font-medium text-gray-700">Address</label>
                <input
                    type="text"
                    id="address"
                    name="address"
                    placeholder="Enter your address"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-200 focus:ring-opacity-50"
                    value="{{ old('address') }}">
                @error('address')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Gender -->
            <div class="mb-4">
                <label for="gender" class="block mb-2 font-medium text-gray-700">Gender</label>
                <select
                    id="gender"
                    name="gender"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-200 focus:ring-opacity-50">
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <div>
                <button
                    type="submit"
                    class="w-full px-4 py-2 text-white bg-indigo-500 rounded-lg hover:bg-indigo-600 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    Register Customer
                </button>
            </div>
        </form>
    </div>
</x-layout>
