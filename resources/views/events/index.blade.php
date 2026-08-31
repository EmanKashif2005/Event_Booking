<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-xl overflow-hidden">

                <div class="p-6">

                    <div class="flex items-center justify-between mb-6">

                        <div>
                            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">
                                All Events
                            </h1>

                            <p class="text-gray-500 dark:text-gray-400 mt-1">
                                Browse and manage available events
                            </p>
                        </div>

                        @if(Auth::user()->is_admin)

                            <a href="{{ route('events.create') }}"
                               class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-5 py-2.5 rounded-lg shadow">
                                + Add New Event
                            </a>

                        @endif

                    </div>


                    @if(session('success'))

                        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-lg mb-6">
                            {{ session('success') }}
                        </div>

                    @endif


                    @if($events->count() > 0)

                        <div class="overflow-x-auto">

                            <table class="w-full text-left">

                                <thead>
                                    <tr class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">

                                        <th class="px-6 py-4 font-semibold">
                                            Title
                                        </th>

                                        <th class="px-6 py-4 font-semibold">
                                            Venue
                                        </th>

                                        <th class="px-6 py-4 font-semibold">
                                            Date
                                        </th>

                                        <th class="px-6 py-4 font-semibold">
                                            Capacity
                                        </th>

                                        <th class="px-6 py-4 font-semibold">
                                            Price
                                        </th>

                                        <th class="px-6 py-4 font-semibold">
                                            Action
                                        </th>

                                    </tr>
                                </thead>


                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">

                                    @foreach($events as $event)

                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">

                                            <td class="px-6 py-4 font-medium text-gray-800 dark:text-white">
                                                {{ $event->title }}
                                            </td>

                                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                                {{ $event->venue }}
                                            </td>

                                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                                {{ $event->event_date }}
                                            </td>

                                            <td class="px-6 py-4 text-gray-600 dark:text-gray-300">
                                                {{ $event->capacity }}
                                            </td>

                                            <td class="px-6 py-4 font-semibold text-gray-800 dark:text-white">
                                                {{ $event->price }}
                                            </td>

                                            <td class="px-6 py-4">

                                                <div class="flex items-center gap-2">

                                                    <a href="{{ route('events.show', $event->id) }}"
                                                       class="bg-blue-100 text-blue-700 hover:bg-blue-200 px-3 py-1.5 rounded-md font-medium">
                                                        View
                                                    </a>


                                                    @if(Auth::user()->is_admin)

                                                        <a href="{{ route('events.edit', $event->id) }}"
                                                           class="bg-yellow-100 text-black-700 hover:bg-yellow-200 px-3 py-1.5 rounded-md font-medium">
                                                            Edit
                                                        </a>


                                                        <form
                                                            action="{{ route('events.destroy', $event->id) }}"
                                                            method="POST"
                                                        >

                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                    class="bg-red-100 text-red-700 hover:bg-red-200 px-3 py-1.5 rounded-md font-medium">
                                                                Delete
                                                            </button>

                                                        </form>

                                                    @endif

                                                </div>

                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    @else

                        <div class="text-center py-12">

                            <h3 class="text-xl font-semibold text-gray-700 dark:text-gray-200">
                                No Events Found
                            </h3>

                            <p class="text-gray-500 mt-2">
                                There are currently no events available.
                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>
    </div>

</x-app-layout>