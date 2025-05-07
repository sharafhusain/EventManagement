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
                        <a href="#" class="text-lg font-semibold leading-tight text-gray-900 hover:underline dark:text-white">{{$event->name}}</a>
                        <p class="text-gray-900 hover:underline dark:text-white">{{$event->description}}</p>
                        <p class="text-gray-900 hover:underline dark:text-white">Available Seats: <span id="available-seat-{{$event->id}}">{{$event->available_seat()}}</span></p>
                        <div class="mt-4 flex items-center justify-between gap-4">
                            <p class="text-2xl font-extrabold leading-tight text-gray-900 dark:text-white">${{$event->price_per_seat}}</p>
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
                    <p class="text-gray-900" id='event_title'></p>
                </div>
                <div class="mb-4">
                    <label class="font-bold mb-4">Event Date:</label>
                    <p class="text-gray-900" id='event_date'></p>
                </div>
                <div class="mb-4">
                    <label class="font-bold mb-4">Ticket Price:</label>
                    <p class="text-gray-900" id='event_ticket_price'></p>
                </div>
                <div class="mb-4">
                    <label class="font-bold mb-4">Venue:</label>
                    <p class="text-gray-900" id='event_venue'></p>
                </div>
                <div class="mb-4">
                    <label class="font-bold mb-4">Venue Address:</label>
                    <p class="text-gray-900" id='event_venue_address'></p>
                </div>
                <form onsubmit="(e)=> event.preventDefault()">
                    <div class="bg-white p-6 rounded-lg w-full max-w-md relative">
                        <label class="block mb-2 font-medium">Enter Number of Seats</label>
                        <input type="hidden" name='event_id' id="event_id" value="123" />
                        <input type="number" name="seats" onkeyup="updatePriceLabel()" value="1" required class="w-full border border-gray-300 rounded px-3 py-2 mb-4" placeholder="Ex: 2" />
                    </div>
                    <div class="flex justify-between">
                        <button type="submit" onclick="saveBookingData()" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">Process to payment: <span id="payment-amount"></span></button>
                        <button id="closeModalBtn2" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-400 transition">Close</button>
                    </div>
                </form>
            </div>
        </div>

    </section>
    <!-- JavaScript -->
    <script>
        function bookTicket(eventData) {
            let isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};

            if(!isLoggedIn){
                Swal.fire({
                        title: "Pleaase Login to Book Tickets.",
                        showCancelButton: true,
                        confirmButtonText: "Login",
                        }).then((result) => {
                        if (result.isConfirmed) {
                           window.location = '{{route('login')}}'
                        }
                        });
                return;
            }
            console.log(eventData);
            document.getElementById('myModal').classList.remove('hidden')
            document.getElementById('event_title').textContent = eventData.name;
            document.getElementById('event_date').textContent = eventData.date;
            document.getElementById('event_ticket_price').textContent = eventData.price_per_seat;
            document.getElementById('event_venue').textContent = eventData.venue.address;
            document.getElementById('event_venue_address').textContent = eventData.venue.address;
            document.getElementById('event_id').value = eventData.id;
            document.getElementById('payment-amount').textContent = eventData.price_per_seat;

        }
        const modal = document.getElementById('myModal');
        const openBtns = document.getElementsByClassName('bookbtn');
        const closeBtns = [document.getElementById('closeModalBtn'), document.getElementById('closeModalBtn2')];
        closeBtns.forEach(btn => btn.addEventListener('click', () => modal.classList.add('hidden')));
    
        
        function updatePriceLabel() {
            let seatInput = document.querySelector("input[name='seats']");
            let seatCount = parseInt(seatInput.value) || 0;

            let pricePerSeat = parseFloat(document.getElementById('event_ticket_price')?.textContent) || 0;
            let totalPrice = seatCount * pricePerSeat;
            console.log(
                'hello',
                seatCount,
                pricePerSeat,
                totalPrice);
            
            document.getElementById('payment-amount').textContent = totalPrice.toFixed(2); // or .textContent for labels
        }
        function saveBookingData() {
            event.preventDefault();

            const form = document.querySelector('form');
            const formData = new FormData(form);
            const eventId = formData.get('event_id');
            const seats = parseInt(formData.get('seats'));

            console.log(seats,'seats');
            

            fetch("{{route('user.event.create')}}", {
                    method: 'POST',
                    body: formData,
                    headers: {
                        // 'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    credentials: 'include'
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if(data.status == 'error'){
                        showValidationErrors(data.errors)
                        return
                    }
                    Swal.fire({
                        title: "Ticket Booked Successfully.",
                        icon: "success",
                        draggable: true
                    });
                    document.getElementById('myModal').classList.add('hidden')
                    let totalSeats = parseInt(document.getElementById('available-seat-'+eventId).textContent)
                    document.getElementById('available-seat-'+eventId).textContent = totalSeats-seats
                    
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("Something went wrong.");
                });
        }
        function showValidationErrors(errors) {
    let messages = [];
    for (const field in errors) {
        if (Array.isArray(errors[field])) {
            messages.push(...errors[field]);
        }
    }

    if (messages.length) {
        Swal.fire({
            icon: 'error',
            title: 'Validation Error',
            html: messages.map(msg => `<p>${msg}</p>`).join('')
        });
    }
}
    </script>

</div>