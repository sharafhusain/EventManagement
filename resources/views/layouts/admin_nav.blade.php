<x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
    {{ __('Dashboard') }}
</x-nav-link>
<x-nav-link :href="route('admin.event.listing')" :active="request()->routeIs('admin.event.listing')">
    {{ __('Events') }}
</x-nav-link>
<x-nav-link :href="route('admin.booking.listing')" :active="request()->routeIs('admin.booking.listing')">
    {{ __('Bookings') }}
</x-nav-link>
