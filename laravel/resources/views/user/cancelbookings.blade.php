@extends('user/index')

@section('user-content')
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
                    <th class="px-4 py-3">Nama Destinasi</th>
                    <th class="px-4 py-3">Jumlah Ticket</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Alasan</th>
        
                </tr>
                </thead>
                <tbody
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                >

            @foreach( $DB_cancelbook as $cancelbook )
                <tr class="text-gray-700 dark:text-gray-400">
                   
                    @foreach( $DB_ticket as $ticket)
                        @if ( $ticket->ticket_id == $cancelbook->id_ticket )
                            @foreach( $DB_destination as $destination )
                                @if( $destination->idDestination == $ticket->destination_id)                            
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <div
                                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                                            >
                                            <img
                                                class="object-cover w-full h-full rounded-full"
                                                src="{{ asset('img/'.$destination->Image) }}"
                                                alt=""
                                                loading="lazy"
                                            />
                                            <div
                                                class="absolute inset-0 rounded-full shadow-inner"
                                                aria-hidden="true"
                                            ></div>
                                            </div>
                                            <div>
                                            <p class="font-semibold">{{ $destination->Name_Destination }}</p>
                                            <p class="text-xs text-gray-600 dark:text-gray-400">
                                            {{ $destination->Category }}
                                            </p>
                                            </div>
                                        </div>
                                    </td>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    @foreach( $DB_ticket as $ticket)
                        @if ( $ticket->ticket_id == $cancelbook->id_ticket )
                            @foreach( $DB_order->where('id',$ticket->order_id) as $order)
                                <td class="px-4 py-3 text-sm">
                                    {{ $order->count }}
                                </td>
                            @endforeach
                        @endif
                    @endforeach

                    @foreach( $DB_ticket as $ticket)
                        @if ( $ticket->ticket_id == $cancelbook->id_ticket )
                        <td class="px-4 py-3 text-sm">
                            {{ $ticket->issue_date }}
                        </td>
                        @endif
                    @endforeach

                    <td class="px-4 py-3 text-sm">
                        {{ $cancelbook->alasan}}
                    </td>
                 
                </tr>
            @endforeach

                </tbody>
            </table>
            </div>
    
        </div>

        <!-- Charts -->
        
        <div class="grid gap-6 mb-8 md:grid-cols-2">
        
        </div>
        </div>
    </main>
@endsection