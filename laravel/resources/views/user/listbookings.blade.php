@extends('user/index')

@section('user-content')
 
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script> 
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
        <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
            
        </h2>


        <!-- New Table -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                    <th class="px-4 py-3">Name Destination</th>
                    <th class="px-4 py-3">Price</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Option</th>

                </tr>
                </thead>
                <tbody
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ( $DB_ListBookings as $value)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                @foreach( $DB_Destination->where('idDestination', $value->id_destination) as $values)
                                    <div class="flex items-center text-sm">
                                        <div
                                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                                        >
                                        <img
                                            class="object-cover w-full h-full rounded-full"
                                            src="{{ asset('img/'.$values->Image) }}"
                                            alt=""
                                            loading="lazy"
                                        />
                                        <div
                                            class="absolute inset-0 rounded-full shadow-inner"
                                            aria-hidden="true"
                                        ></div>
                                        </div>
                                        <div>
                                        <p class="font-semibold">{{ $values->Name_Destination }}</p>
                                        <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $values->Category }}
                                        </p>
                                        </div>
                                    </div>
                                @endforeach
                            </td>
                            <td class="px-4 py-3 text-sm">
                            @foreach( $DB_Destination->where('idDestination', $value->id_destination) as $values)
                            Rp. {{ $values->Price_perticket }}
                            @endforeach
                            </td>
                            <td class="px-4 py-3 text-sm">
                            @foreach( $DB_Destination->where('idDestination', $value->id_destination) as $values)
                            {{ \Carbon\Carbon::parse($values->tgl)->format('d-m-Y') }}
                            @endforeach
                            </td>
                            <td>
                            <button type="button" data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            Buy Now
                            </button>
                           
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
    
        </div>
        

        <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full flex">
            <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Header -->
                    <div class="flex flex-col items-center justify-center p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white text-center">
                            Beli Ticket
                        </h3>
                    </div>

                    <!-- Form -->
                    <form class="p-4 md:p-5 flex flex-col items-center">
                        <div class="grid gap-4 mb-4 w-full">
                            <div>
                                <label for="jumlah-ticket" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Ticket</label>
                                <input type="number" name="jumlah-ticket" id="jumlah-ticket" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Masukkan jumlah ticket" required="">
                            </div>
                            <div>
                                <label for="tanggal" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal</label>
                                <input type="date" name="tanggal" id="tanggal" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                            </div>
                        </div>

                        <style>
                            .bg-info {
                            background-color: #17a2b8; 
                            }

                            .hover\:bg-info-dark:hover {
                            background-color: #117a8b; 
                            }
                        </style>
                        <!-- Submit Button -->
                        <button type="submit" class="text-white inline-flex items-center bg-info hover:bg-info-dark focus:ring-4 focus:outline-none focus:ring-info font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                            <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                            </svg>
                            Pesan Ticket
                        </button>
                    </form>
                </div>
            </div>
        </div>



        
        <div class="grid gap-6 mb-8 md:grid-cols-2">
        
        </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
    <script>
		$(document).ready(function () {
					
			let csrfToken = $('meta[name="csrf-token"]').attr('content');
            $('#popup').hide();
            $('.open-popup-btn').click(function(){
                $('#popup').show();
            });

			$('#pay-button').on('click', function () {


				@if (Auth::check())

				var name = "{{ Auth::user()->name }}";
				var id_user = {{ Auth::user()->id }};
				var phone = "{{ Auth::user()->phone_number }}";
				var qty = $('#qty').val();
				var date = $('#date').val();
				

				@else 

				var name = "";
				var id_user = ;
				var phone = "";
				var qty = $('#qty').val();
				var date = $('#date').val();
				var mount = ""; 

				@endif


			let timerInterval;
				Swal.fire({
				title: "Sedang Dalam Proses !!",
	
				timer: 1500,
				timerProgressBar: true,
				didOpen: () => {
					Swal.showLoading();
					const timer = Swal.getPopup().querySelector("b");
					timerInterval = setInterval(() => {
					timer.textContent = `${Swal.getTimerLeft()}`;
					}, 100);
				},
				willClose: () => {
					clearInterval(timerInterval);
				}
				}).then((result) => {

					$.ajax({

					url: "/checkout", 
					method: "POST",
					headers: {
					'X-CSRF-TOKEN': csrfToken },
					contentType: 'application/json', 
					processData: false, 
					data: 
					JSON.stringify({
						name: name,
						phone: phone,
						qty: qty,
						date: date,
						mount: mount,
						id_user: id_user,
						id_destination: id_destination,
			
					}),
					success: function (response) {	

						var latest_id_ticket = response.latest_id_ticket;
						
						var count_seat = $('#qty').val();

						var snapToken = response.snapToken;
						window.snap.pay(response.snapToken, {
						onSuccess: function(result) {
							
							$.ajax({
							url: "/success-paid", 
							method: "POST",
							headers: {
							'X-CSRF-TOKEN': csrfToken },
							contentType: 'application/json', 
							processData: false, 
							data: 
							JSON.stringify({
								latest_id_ticket: latest_id_ticket,
								id: id,
								count_seat : count_seat
							}),
							success: function (response) {	
								Swal.fire({
									title: "Ticket Berhasil dipesan !",
									text: "Ingin Melihat Ticket ?",
									icon: "success",
									showCancelButton: true,
									confirmButtonColor: "#3085d6",
									cancelButtonColor: "#d33",
									confirmButtonText: "Ya"
									}).then((result) => {
									if (result.isConfirmed) {
									 	window.location.href = '/mybookings'
									}
								});
							},
							error: function (xhr, status, error) {

								alert('Status UnPaid!')
							}
							});

						},
						onPending: function(result) {
							console.log(result);
							alert("Pembayaran sedang diproses. Harap tunggu.");
						},
						onError: function(result) {
							console.log(result);
							alert("Pembayaran gagal!");
						},
						onClose: function() {
							alert('Anda menutup popup tanpa menyelesaikan pembayaran.');
						} 
						});

					},
					error: function (xhr, status, error) {

					alert('Midtrans sedang dalam gangguan !');
					}
					});
				});	
			});
		});
	</script>
@endsection