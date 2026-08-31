<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Bookings') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden">

                <div class="p-6">

                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                            My Bookings
                        </h1>

                        <p class="text-gray-500 dark:text-gray-400 mt-1">
                            View and manage your event bookings
                        </p>
                    </div>


                    @if(session('success'))

                        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-6">
                            {{ session('success') }}
                        </div>

                    @endif


                    @if($bookings->count() > 0)

                        <div class="overflow-x-auto">

                            <table class="w-full text-left">

                                <thead>

                                    <tr class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">

                                        <th class="px-6 py-4 font-semibold">
                                            Event
                                        </th>

                                        <th class="px-6 py-4 font-semibold">
                                            Venue
                                        </th>

                                        <th class="px-6 py-4 font-semibold">
                                            Date
                                        </th>

                                        <th class="px-6 py-4 font-semibold">
                                            Seats
                                        </th>

                                        <th class="px-6 py-4 font-semibold">
                                            Status
                                        </th>

                                        <th class="px-6 py-4 font-semibold">
                                            Action
                                        </th>

                                    </tr>

                                </thead>


                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                    @foreach($bookings as $booking)

                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">

                                            <td class="px-6 py-4 font-semibold text-gray-800 dark:text-white">
                                                {{ $booking->event->title }}
                                            </td>

                                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                                {{ $booking->event->venue }}
                                            </td>

                                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                                {{ $booking->event->event_date }}
                                            </td>

                                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                                {{ $booking->seats }}
                                            </td>

                                            <td class="px-6 py-4">

                                                @if($booking->status === 'confirmed')

                                                    <span class="inline-block bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">
                                                        Confirmed
                                                    </span>

                                                @else

                                                    <span class="inline-block bg-red-100 text-red-700 px-3 py-1 rounded-full text-sm font-semibold">
                                                        Cancelled
                                                    </span>

                                                @endif

                                            </td>

                                            <td class="px-6 py-4">

                                                @if($booking->status === 'confirmed')

                                                    <form
                                                        action="{{ route('bookings.cancel', $booking->id) }}"
                                                        method="POST"
                                                    >

                                                        @csrf
                                                        @method('PATCH')

                                                        <button
                                                            type="submit"
                                                            class="bg-red-100 text-red-700 hover:bg-red-200 px-3 py-1.5 rounded-md font-medium"
                                                        >
                                                            Cancel
                                                        </button>

                                                    </form>

                                                @else

                                                    <span class="text-gray-400">
                                                        Cancelled
                                                    </span>

                                                @endif

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    @else

                        <div class="text-center py-12">

                            <div class="text-5xl mb-4">
                                🎟️
                            </div>

                            <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                                No Bookings Yet
                            </h3>

                            <p class="text-gray-500 dark:text-gray-400 mt-2">
                                You have not booked any events yet.
                            </p>

                            <a
                                href="{{ route('events.index') }}"
                                class="inline-block mt-5 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-semibold"
                            >
                                Browse Events
                            </a>

                        </div>

                    @endif

                </div>

            </div>

        </div>
    </div>

</x-app-layout>