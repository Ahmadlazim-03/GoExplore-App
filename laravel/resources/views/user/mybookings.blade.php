@extends('user/index')

@section('user-content')
<script src="https://cdn.tailwindcss.com">
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
<style>
    @foreach( $ticket as $value )
        .myModal{{ $value->ticket_id }} {
            visibility: hidden; 
            opacity: 0;
            transition: opacity 0.3s ease, visibility 0s ease 0.3s; 
            display: flex;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 50;
        }
        
        .myModal{{ $value->ticket_id }}.show {
            visibility: visible;
            opacity: 1;
            transition: opacity 0.3s ease, visibility 0s ease 0s;
        }
    @endforeach
</style>

    <main class="h-full overflow-y-auto">
        <div class="container px-6 mx-auto grid">
        <h2
            class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
        >
            
        </h2>


        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                >
                    <th class="px-4 py-3">Nama Destinasi</th>
                    <th class="px-4 py-3">Jumlah</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Ticket</th>
                    <th class="px-4 py-3">Option</th>

                </tr>
                </thead>
                <tbody
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                >

                @foreach( $ticket as $value  )

        
                    <tr class="text-gray-700 dark:text-gray-400">
                   
                    @foreach( $destination->Where('idDestination', $value->destination_id) as $values)
                       
                        <td class="px-4 py-3">
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
                                <p class="font-semibold">{{ $values->Name_Destination }} </p>
                                <p class="text-xs text-gray-600 dark:text-gray-400">
                                {{ $values->Category }}
                                </p>
                                </div>
                            </div>
                        </td>   

                    @endforeach
                    

                    @foreach( $order->Where('id',$value->order_id) as $values)
                        <td class="px-4 py-3 text-sm">
                            {{ $values->count }}
                        </td>
                    @endforeach

                        <td class="px-4 py-3 text-xs">
                            @if ( $value->status == "Unpaid")
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                                >
                                    Unpaid
                                </span>
                            @else 
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                                >
                                    Paid
                                </span>
                            @endif
                        </td>

                    @foreach( $order->Where('id',$value->order_id) as $values)
                        <td class="px-4 py-3 text-sm">
                        {{ \Carbon\Carbon::parse($values->date)->format('d-m-Y') }}
                        </td>
                    @endforeach

                        <td>
                            <a href="/ticket/{{ $value->ticket_id }}">
                            <button
                                class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-500 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"
                            >
                            View Ticket                            
                            </button>
                            </a>                
                        </td>

                        <td>
                       
                        <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red openModal{{ $value->ticket_id }}">
                            Cancel Ticket
                        </button>

                      
                        <div class="myModal{{ $value->ticket_id }} fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center z-50 hidden">
                            <div class="bg-white p-6 rounded-lg w-96">
                                <h2 class="text-lg font-semibold mb-4">Cancel Ticket</h2>
                                <textarea id="alasan" class="longtextInput{{ $value->ticket_id }} w-full p-3 border rounded-lg" rows="5" placeholder="Masukkan alasan cancel ticket..."></textarea>
                                <div class="mt-4 flex justify-end">
                                    <button class="closeModal{{ $value->ticket_id }} btnClose px-4 py-2 bg-gray-300 text-gray-800 rounded-lg hover:bg-gray-400">Close</button>
                                    <button class="ml-2 submitModal{{ $value->ticket_id }} px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700" data-ticket-id="{{ $value->ticket_id }}">Submit</button>
                                </div>
                            </div>
                        </div>

                        </a>                
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
            </div>
           
        </div>

         <div class="mt-3">
            
         {{ $ticket->links() }}

         </div>
    
        
        <div class="grid gap-6 mb-8 md:grid-cols-2">
        
        </div>
        </div>
    </main>
   

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function(){
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
            @foreach ($ticket as $value)
                $('.openModal{{ $value->ticket_id }}').click(function(){
                    $('.myModal{{ $value->ticket_id }}').addClass('show'); 
                });
            @endforeach

            @foreach ($ticket as $value)
                $('.closeModal{{ $value->ticket_id }}').click(function(){
                    $('.myModal{{ $value->ticket_id }}').removeClass('show'); 
                });
            @endforeach

            @foreach ($ticket as $value)
                $('.submitModal{{ $value->ticket_id }}').click(function(){
                    var id = $(this).data('ticket-id');
                    var alasan = $('.longtextInput{{ $value->ticket_id }}').val();

                    $.ajax({
                    url: "/cancelbookings", 
                    method: "POST",
                    headers: {
                    'X-CSRF-TOKEN': csrfToken },
                    contentType: 'application/json', 
                    processData: false, 
                    data: 
                    JSON.stringify({
                        id: id,
                        alasan: alasan
                    }),
                    success: function (response) {	
                        Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Dana akan dikembalikan ke Rekening anda!",
                        showConfirmButton: true,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                    },
                    error: function (xhr, status, error) {
                        console.log('gagal');
                    }
                    });
                });
            @endforeach
        });
    </script>
@endsection


