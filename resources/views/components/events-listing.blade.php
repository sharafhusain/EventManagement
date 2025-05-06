<div>

    <section class="bg-gray-50 py-8 antialiased dark:bg-gray-900 md:py-12">
        <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <!-- Heading & Filters -->
            <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8">
                <div>
                    <h2 class="mt-3 text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Events</h2>
                </div>
            </div>
            <div class="mb-4 grid gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
                @foreach($events as $event)
                <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="h-56 w-full">
                        <a href="#">
                            <img class="mx-auto h-full dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg" alt="" />
                            <img class="mx-auto hidden h-full dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg" alt="" />
                        </a>
                    </div>
                    <div class="pt-6">
                        <div class="mb-4 flex items-center justify-between gap-4">
                            <span class="me-2 rounded bg-primary-100 px-2.5 py-0.5 text-xs font-medium text-primary-800 dark:bg-primary-900 dark:text-primary-300"> Up to 35% off </span>

                            <div class="flex items-center justify-end gap-1">
                                <button type="button" data-tooltip-target="tooltip-quick-look" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only"> Quick look </span>
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="2" d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </button>
                                <div id="tooltip-quick-look" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700" data-popper-placement="top">
                                    Quick look
                                    <div class="tooltip-arrow" data-popper-arrow=""></div>
                                </div>

                                <button type="button" data-tooltip-target="tooltip-add-to-favorites" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="sr-only"> Add to Favorites </span>
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                                    </svg>
                                </button>
                                <div id="tooltip-add-to-favorites" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700" data-popper-placement="top">
                                    Add to favorites
                                    <div class="tooltip-arrow" data-popper-arrow=""></div>
                                </div>
                            </div>
                        </div>

                        <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Apple iMac 27", 1TB HDD, Retina 5K Display, M3 Max</a>
                        <div class="mt-4 flex items-center justify-between gap-4">
                            <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">$1,699</p>

                            <button type="button" onclick="bookTicket({{json_encode($event)}})" class="bookbtn inline-flex items-center rounded-lg bg-[#1b1b18] px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                                </svg>
                                Book Ticket
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="mt-4">
                {{$events->links()}}
            </div>
        </div>

        <!-- Modal -->
        <div id="myModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md relative">
                <button id="closeModalBtn" class="absolute top-2 right-2 text-gray-500 hover:text-black text-2xl">&times;</button>
                <h2 class="text-xl font-bold mb-4">Event Details</h2>
                <div class="mb-4">
                    <label class="font-bold mb-4">Event Title:</label>
                    <p class="text-gray-900" id='event_title'>Live Music Night</p>
                </div>
                <div class="mb-4">
                    <label class="font-bold mb-4">Event Date:</label>
                    <p class="text-gray-900" id='event_date'>2025-05-10</p>
                </div>
                <div class="mb-4">
                    <label class="font-bold mb-4">Venue:</label>
                    <p class="text-gray-900" id='event_venue'>City Hall Auditorium</p>
                </div>
                <div class="mb-4">
                    <label class="font-bold mb-4">Venue Address:</label>
                    <p class="text-gray-900" id='event_venue_address'>123 Main Street, New York, NY</p>
                </div>
                <form>
                    <div class="bg-white p-6 rounded-lg w-full max-w-md relative">
                        <label class="block mb-2 font-medium">Enter Number of Seats</label>
                        <input type="hidden" name='event_id' id="event_id" value="123" />
                        <input type="number" name="seats" required class="w-full border border-gray-300 rounded px-3 py-2 mb-4" placeholder="Ex: 2" />
                    </div>
                    <div class="flex justify-between">
                        <button type="submit" onclick="saveBookingData()" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Confirm Booking</button>
                        <button id="closeModalBtn2" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 transition">Close</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <!-- JavaScript -->
    <script>
        function bookTicket(eventData) {
            console.log(eventData);
            const modal = document.getElementById('myModal');
            modal.classList.remove('hidden')

            document.getElementById('event_title').textContent = eventData.name;
            document.getElementById('event_date').textContent = eventData.date;
            document.getElementById('event_venue').textContent = eventData.venue.address;
            document.getElementById('event_venue_address').textContent = eventData.venue.address;
            document.getElementById('event_id').value = eventData.id;

        }
        const modal = document.getElementById('myModal');
        const openBtns = document.getElementsByClassName('bookbtn');
        const closeBtns = [document.getElementById('closeModalBtn'), document.getElementById('closeModalBtn2')];
        closeBtns.forEach(btn => btn.addEventListener('click', () => modal.classList.add('hidden')));
    </script>
    <script>
        function saveBookingData() {
            event.preventDefault();

            const form = document.querySelector('form');
            const formData = new FormData(form);

            // If you want to ensure hidden fields are included (like event_id):
            // formData.append('event_id', document.getElementById('event_id').value);


            // Send form data via AJAX using Fetch
            fetch("{{route('event.create')}}", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    credentials: 'include'
                })
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        title: "Ticket Booked Successfully.",
                        icon: "success",
                        draggable: true
                    });
                    document.getElementById('myModal').classList.add('hidden')
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("Something went wrong.");
                });
        }
    </script>

</div>