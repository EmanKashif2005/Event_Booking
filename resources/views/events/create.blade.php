<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Add New Event
        </h2>
    </x-slot>

    <div class="py-10">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden">

                <div class="p-8">

                    <!-- Page Title -->
                    <div class="mb-8">

                        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                            Create New Event
                        </h1>

                        <p class="text-gray-500 dark:text-gray-400 mt-2">
                            Enter the details of the new event.
                        </p>

                    </div>


                    <!-- Validation Errors -->
                    @if ($errors->any())

                        <div class="bg-red-100 border border-red-300 text-red-700 px-4 py-3 rounded-lg mb-6">

                            <ul class="list-disc list-inside">

                                @foreach ($errors->all() as $error)

                                    <li>{{ $error }}</li>

                                @endforeach

                            </ul>

                        </div>

                    @endif


                    <!-- Create Event Form -->
                    <form
                        action="{{ route('events.store') }}"
                        method="POST"
                    >

                        @csrf


                        <!-- Title -->
                        <div class="mb-5">

                            <label
                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"
                            >
                                Event Title
                            </label>

                            <input
                                type="text"
                                name="title"
                                value="{{ old('title') }}"
                                required
                                placeholder="Enter event title"
                                class="w-full rounded-lg border-gray-300 bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >

                        </div>


                        <!-- Description -->
                        <div class="mb-5">

                            <label
                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"
                            >
                                Description
                            </label>

                            <textarea
                                name="description"
                                rows="4"
                                required
                                placeholder="Enter event description"
                                class="w-full rounded-lg border-gray-300 bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >{{ old('description') }}</textarea>

                        </div>


                        <!-- Venue -->
                        <div class="mb-5">

                            <label
                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"
                            >
                                Venue
                            </label>

                            <input
                                type="text"
                                name="venue"
                                value="{{ old('venue') }}"
                                required
                                placeholder="Enter event venue"
                                class="w-full rounded-lg border-gray-300 bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >

                        </div>


                        <!-- Event Date -->
                        <div class="mb-5">

                            <label
                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"
                            >
                                Event Date
                            </label>

                            <input
                                type="datetime-local"
                                name="event_date"
                                value="{{ old('event_date') }}"
                                required
                                class="w-full rounded-lg border-gray-300 bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >

                        </div>


                        <!-- Capacity -->
                        <div class="mb-5">

                            <label
                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"
                            >
                                Capacity
                            </label>

                            <input
                                type="number"
                                name="capacity"
                                value="{{ old('capacity') }}"
                                min="1"
                                required
                                placeholder="Enter number of seats"
                                class="w-full rounded-lg border-gray-300 bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >

                        </div>


                        <!-- Price -->
                        <div class="mb-8">

                            <label
                                class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2"
                            >
                                Price
                            </label>

                            <input
                                type="number"
                                name="price"
                                value="{{ old('price') }}"
                                step="0.01"
                                min="0"
                                required
                                placeholder="Enter ticket price"
                                class="w-full rounded-lg border-gray-300 bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >

                        </div>


                        <!-- Buttons -->
                        <div class="flex items-center gap-4">

                            <button
                                type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow"
                            >
                                Create Event
                            </button>


                            <a
                                href="{{ route('events.index') }}"
                                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-6 py-3 rounded-lg"
                            >
                                Cancel
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>