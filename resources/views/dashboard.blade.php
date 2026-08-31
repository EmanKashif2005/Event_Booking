<x-app-layout>

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-10">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Welcome Card -->
            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-8 mb-6">

                <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                    Welcome, {{ Auth::user()->name }} 👋
                </h1>

                <p class="text-gray-500 dark:text-gray-400 mt-2">
                    Welcome to the Event Booking System.
                </p>

            </div>


            <!-- Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


                <!-- Total Events -->
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-gray-500 dark:text-gray-400">
                                Total Events
                            </p>

                            <h2 class="text-4xl font-bold text-blue-600 mt-2">
                                {{ $totalEvents }}
                            </h2>
                        </div>

                        <div class="text-4xl">
                            📅
                        </div>

                    </div>

                </div>


                <!-- My Bookings -->
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6">

                    <div class="flex items-center justify-between">

                        <div>
                            <p class="text-gray-500 dark:text-gray-400">
                                My Bookings
                            </p>

                            <h2 class="text-4xl font-bold text-green-600 mt-2">
                                {{ Auth::user()->bookings()->count() }}
                            </h2>
                        </div>

                        <div class="text-4xl">
                            🎟️
                        </div>

                    </div>

                </div>


                <!-- Account Type -->
                <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-gray-500 dark:text-gray-400">
                                Account Type
                            </p>

                            <h2 class="text-2xl font-bold text-purple-600 mt-2">

                                @if(Auth::user()->is_admin)
                                    Admin
                                @else
                                    User
                                @endif

                            </h2>

                        </div>

                        <div class="text-4xl">
                            👤
                        </div>

                    </div>

                </div>

            </div>


            <!-- Quick Actions -->

            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 mt-6">

                <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-5">
                    Quick Actions
                </h2>

                <div class="flex flex-wrap gap-4">

                    <a
                        href="{{ route('events.index') }}"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-3 rounded-lg"
                    >
                        📅 View Events
                    </a>


                    <a
                        href="{{ route('bookings.index') }}"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-3 rounded-lg"
                    >
                        🎟️ My Bookings
                    </a>


                    @if(Auth::user()->is_admin)

                        <a
                            href="{{ route('events.create') }}"
                            class="bg-purple-600 hover:bg-purple-700 text-white font-semibold px-5 py-3 rounded-lg"
                        >
                            ➕ Add Event
                        </a>

                    @endif

                </div>

            </div>

        </div>

    </div>

</x-app-layout>