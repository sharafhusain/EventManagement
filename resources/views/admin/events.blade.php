<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Events') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">#</th>
                <th scope="col" class="px-6 py-3">Name</th>
                <th scope="col" class="px-6 py-3">Description</th>
                <th scope="col" class="px-6 py-3">Venue</th>
                <th scope="col" class="px-6 py-3">Date</th>
                <th scope="col" class="px-6 py-3">Total Seats</th>
                <th scope="col" class="px-6 py-3">Available Seats</th>
                <th scope="col" class="px-6 py-3">Price / Seat</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $key => $event)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">{{ $loop->iteration }}</td>
                <td class="px-6 py-4">{{ $event->name }}</td>
                <td class="px-6 py-4">{{ Str::limit($event->description, 30) }}</td>
                <td class="px-6 py-4">{{ $event->venue->name }}</td>
                <td class="px-6 py-4">{{ $event->date }}</td>
                <td class="px-6 py-4">{{ $event->total_seats }}</td>
                <td class="px-6 py-4">{{ $event->available_seat() }}</td>
                <td class="px-6 py-4">${{ $event->price_per_seat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

        </div>

    </div>
</x-app-layout>