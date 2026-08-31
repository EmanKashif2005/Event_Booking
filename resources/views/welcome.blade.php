<!DOCTYPE html>
<html>
<head>
    <title>Event Booking System</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

    <div class="min-h-screen flex items-center justify-center">

        <div class="bg-white shadow-xl rounded-2xl p-10 text-center max-w-lg w-full">

            <h1 class="text-4xl font-bold text-gray-800 mb-4">
                Event Booking System
            </h1>

            <p class="text-gray-600 mb-8">
                Discover events, reserve your seats and manage your bookings easily.
            </p>

            <div class="flex justify-center gap-4">

                <a href="{{ route('login') }}"
                   class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                    Login
                </a>

                <a href="{{ route('register') }}"
                   class="bg-gray-800 text-white px-6 py-3 rounded-lg hover:bg-gray-900">
                    Register
                </a>

                <a href="{{ route('events.index') }}"
                   class="border border-gray-300 px-6 py-3 rounded-lg hover:bg-gray-100">
                    Events
                </a>

            </div>

        </div>

    </div>

</body>
</html>