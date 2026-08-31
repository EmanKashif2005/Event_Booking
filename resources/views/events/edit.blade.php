<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Event
        </h2>
    </x-slot>

    <div class="py-10">

        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl">

                <div class="p-8">

                    <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-2">
                        Edit Event
                    </h1>

                    <p class="text-gray-500 dark:text-gray-400 mb-8">
                        Update the event information below.
                    </p>


                    <form
                        action="{{ route('events.update', $event->id) }}"
                        method="POST"
                    >

                        @csrf
                        @method('PUT')


                        <!-- Title -->
                        <div class="mb-5">

                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Title
                            </label>

                            <input
                                type="text"
                                name="title"
                                value="{{ $event->title }}"
                                class="w-full rounded-lg border-gray-300 bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >

                        </div>


                        <!-- Description -->
                        <div class="mb-5">

                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Description
                            </label>

                            <textarea
                                name="description"
                                rows="4"
                                class="w-full rounded-lg border-gray-300 bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >{{ $event->description }}</textarea>

                        </div>


                        <!-- Venue -->
                        <div class="mb-5">

                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Venue
                            </label>

                            <input
                                type="text"
                                name="venue"
                                value="{{ $event->venue }}"
                                class="w-full rounded-lg border-gray-300 bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >

                        </div>


                        <!-- Event Date -->
                        <div class="mb-5">

                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Event Date
                            </label>

                            <input
                                type="datetime-local"
                                name="event_date"
                                value="{{ date('Y-m-d\TH:i', strtotime($event->event_date)) }}"
                                class="w-full rounded-lg border-gray-300 bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >

                        </div>


                        <!-- Capacity -->
                        <div class="mb-5">

                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Capacity
                            </label>

                            <input
                                type="number"
                                name="capacity"
                                value="{{ $event->capacity }}"
                                min="1"
                                class="w-full rounded-lg border-gray-300 bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >

                        </div>


                        <!-- Price -->
                        <div class="mb-8">

                            <label class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                                Price
                            </label>

                            <input
                                type="number"
                                name="price"
                                value="{{ $event->price }}"
                                step="0.01"
                                min="0"
                                class="w-full rounded-lg border-gray-300 bg-white text-gray-900 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            >

                        </div>


                        <!-- Buttons -->
                        <div class="flex items-center gap-4">

                            <button
                                type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg shadow"
                            >
                                Update Event
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