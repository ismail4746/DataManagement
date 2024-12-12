<x-layout>
    <x-slot:heading>
        {{-- Contact Us --}}
    </x-slot:heading>

    <!-- Hero Section with Background -->
    <div class="relative bg-blue-600 py-16 px-6 text-white text-center">
        <h1 class="text-4xl font-extrabold mb-4">We're Here to Help</h1>
        <p class="text-lg max-w-3xl mx-auto mb-6">
            Have any questions or need assistance? Don't hesitate to reach out. Our team is ready to assist you with all your needs.
        </p>
        <div class="absolute inset-x-0 bottom-0 bg-blue-500 opacity-50 h-32"></div>
    </div>

    <!-- Contact Info Section -->
    <div class="container mx-auto px-6 py-12 text-center">
        <h2 class="text-3xl font-semibold text-gray-800 mb-8">Get in Touch</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Phone -->
            <div class="flex flex-col items-center">
                <div class="bg-blue-100 p-6 rounded-full mb-4">
                    <i class="fas fa-phone-alt text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800">Call Us</h3>
                <p class="text-gray-600">+1 (800) 123-4567</p>
            </div>

            <!-- Email -->
            <div class="flex flex-col items-center">
                <div class="bg-blue-100 p-6 rounded-full mb-4">
                    <i class="fas fa-envelope text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800">Email Us</h3>
                <p class="text-gray-600">contact@ourcompany.com</p>
            </div>

            <!-- Address -->
            <div class="flex flex-col items-center">
                <div class="bg-blue-100 p-6 rounded-full mb-4">
                    <i class="fas fa-map-marker-alt text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-800">Visit Us</h3>
                <p class="text-gray-600">123 Business St, City, Country</p>
            </div>
        </div>
    </div>

    <!-- Map Section (Optional) -->
    <div class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-semibold text-gray-800 text-center mb-8">Our Location</h2>
        <!-- Google Maps Embed or Placeholder Image -->
        <div class="w-full h-64 bg-gray-200 rounded-lg">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2624.097885636426!2d2.2944815156743896!3d48.8588447792873!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e671d98b3f4ff5%3A0x12b5a5901abaf4bc!2sEiffel%20Tower!5e0!3m2!1sen!2sfr!4v1634026169275!5m2!1sen!2sfr"
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="max-w-lg mx-auto p-6 bg-white shadow-lg rounded-xl mb-16">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Get In Touch</h2>

        <!-- Form Start -->
        <form action="#" method="POST">
            <!-- Name Field -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-semibold text-gray-600">Full Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="John Doe">
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-semibold text-gray-600">Email Address</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="youremail@example.com">
            </div>

            <!-- Subject Field -->
            <div class="mb-4">
                <label for="subject" class="block text-sm font-semibold text-gray-600">Subject</label>
                <input type="text" id="subject" name="subject" class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="Inquiry/Support/Feedback">
            </div>

            <!-- Message Field -->
            <div class="mb-6">
                <label for="message" class="block text-sm font-semibold text-gray-600">Your Message</label>
                <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 mt-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required placeholder="Your message here..."></textarea>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                    Send Message
                </button>
            </div>
        </form>
    </div>

</x-layout>
