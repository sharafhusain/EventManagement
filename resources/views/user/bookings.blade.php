<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Bookings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">#</th>
                            <th scope="col" class="px-6 py-3">Event Name</th>
                            <th scope="col" class="px-6 py-3">Description</th>
                            <th scope="col" class="px-6 py-3">Event Date</th>
                            <th scope="col" class="px-6 py-3">Seats Booked</th>
                            <th scope="col" class="px-6 py-3">Total Price</th>
                            <th scope="col" class="px-6 py-3">Payment Status</th>
                            <th scope="col" class="px-6 py-3">Booked At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $key => $booking)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $bookings->firstItem() + $key }}
                            </th>
                            <td class="px-6 py-4">
                                {{$booking->event->name}}
                            </td>
                            <td class="px-6 py-4">
                                {{$booking->event->description}}
                            </td>
                            <td class="px-6 py-4">
                                {{$booking->event->date}}
                            </td>
                            <td class="px-6 py-4">
                                {{$booking->seats_booked}}
                            </td>
                            <td class="px-6 py-4">
                                {{$booking->total_price}}
                            </td>
                            <td class="px-6 py-4">
                                {{$booking->payment_status}}
                            </td>
                            <td class="px-6 py-4">
                                {{$booking->booked_at}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$bookings->links()}}
            </div>

        </div>

    </div>
</x-app-layout>