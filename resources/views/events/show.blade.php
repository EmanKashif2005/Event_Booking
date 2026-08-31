<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Event Details
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden">

                <div class="p-8">

                    <div class="mb-8">
                        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                            {{ $event->title }}
                        </h1>

                        <p class="text-gray-500 dark:text-gray-400 mt-2">
                            Event Information
                        </p>
                    </div>


                    @if(session('error'))

                        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-6">
                            {{ session('error') }}
                        </div>

                    @endif


                    @if(session('success'))

                        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-6">
                            {{ session('success') }}
                        </div>

                    @endif


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                        <div class="bg-gray-50 dark:bg-gray-700 p-5 rounded-lg">
                            <p class="text-sm text-gray-500 dark:text-gray-300">
                                Description
                            </p>

                            <p class="mt-2 text-gray-800 dark:text-white">
                                {{ $event->description }}
                            </p>
                        </div>


                        <div class="bg-gray-50 dark:bg-gray-700 p-5 rounded-lg">
                            <p class="text-sm text-gray-500 dark:text-gray-300">
                                Venue
                            </p>

                            <p class="mt-2 font-semibold text-gray-800 dark:text-white">
                                {{ $event->venue }}
                            </p>
                        </div>


                        <div class="bg-gray-50 dark:bg-gray-700 p-5 rounded-lg">
                            <p class="text-sm text-gray-500 dark:text-gray-300">
                                Event Date
                            </p>

                            <p class="mt-2 font-semibold text-gray-800 dark:text-white">
                                {{ $event->event_date }}
                            </p>
                        </div>


                        <div class="bg-gray-50 dark:bg-gray-700 p-5 rounded-lg">
                            <p class="text-sm text-gray-500 dark:text-gray-300">
                                Price
                            </p>

                            <p class="mt-2 text-xl font-bold text-blue-600">
                                {{ $event->price }}
                            </p>
                        </div>


                        <div class="bg-gray-50 dark:bg-gray-700 p-5 rounded-lg">
                            <p class="text-sm text-gray-500 dark:text-gray-300">
                                Total Capacity
                            </p>

                            <p class="mt-2 font-semibold text-gray-800 dark:text-white">
                                {{ $event->capacity }}
                            </p>
                        </div>


                        <div class="bg-green-50 dark:bg-green-900/20 p-5 rounded-lg">
                            <p class="text-sm text-green-600 dark:text-green-300">
                                Available Seats
                            </p>

                            <p class="mt-2 text-2xl font-bold text-green-600">
                                {{ $event->capacity - $event->bookings()->where('status', 'confirmed')->sum('seats') }}
                            </p>
                        </div>

                    </div>


                    <div class="border-t border-gray-200 dark:border-gray-700 pt-8">

                        <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">
                            Book Your Seats
                        </h2>

                        <form action="{{ route('bookings.store') }}" method="POST">

                            @csrf

                            <input type="hidden" name="event_id" value="{{ $event->id }}">

                            <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-end">

                                <div>
                                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Number of Seats
                                    </label>

                                    <input
                                        type="number"
                                        name="seats"
                                        value="1"
                                        min="1"
                                        max="{{ $event->capacity }}"
                                        class="border-gray-300 rounded-lg shadow-sm w-40"
                                    >
                                </div>

                                <button
                                    type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2.5 rounded-lg shadow"
                                >
                                    Book Now
                                </button>

                            </div>

                        </form>

                    </div>


                    <div class="mt-8">

                        <a href="{{ route('events.index') }}"
                           class="text-gray-600 hover:text-gray-900 dark:text-gray-300">
                            ← Back to Events
                        </a>

                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>