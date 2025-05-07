<x-nav-link :href="route('home')" :active="request()->routeIs('home')">
    {{ __('Home') }}
</x-nav-link>                    
<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
    {{ __('Dashboard') }}
</x-nav-link>                    
<x-nav-link :href="route('user.booking.listing')" :active="request()->routeIs('user.booking.listing')">
    {{ __('My Bookings') }}
</x-nav-link>