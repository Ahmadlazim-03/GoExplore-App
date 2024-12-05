@extends('user/index')

@section('user-content')
<script src="https://cdn.tailwindcss.com">
</script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
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
                    <th class="px-4 py-3">Jumlah</th>
                    <th class="px-4 py-3">Status</th>
                    <th class="px-4 py-3">Date</th>
                    <th class="px-4 py-3">Ticket</th>

                </tr>
                </thead>
                <tbody
                class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                >

                @foreach( $ticket->where('users_id',Auth::user()->id) as $value  )

        
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
                            {{ $values->date }}
                        </td>
                    @endforeach

                        <td>
                        <a href="/ticket">
                            <button
                            class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            >
                            View Ticket
                            </button>
                        </a>                
                        </td>
                    </tr>

                @endforeach

                <!-- <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                    
                        <div
                        class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                        >
                        <img
                            class="object-cover w-full h-full rounded-full"
                            src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&facepad=3&fit=facearea&s=707b9c33066bf8808c934c8ab394dff6"
                            alt=""
                            loading="lazy"
                        />
                        <div
                            class="absolute inset-0 rounded-full shadow-inner"
                            aria-hidden="true"
                        ></div>
                        </div>
                        <div>
                        <p class="font-semibold">Jolina Angelie</p>
                        <p class="text-xs text-gray-600 dark:text-gray-400">
                            Unpaid
                        </p>
                        </div>
                    </div>
                    </td>
                    <td class="px-4 py-3 text-sm">
                    $ 369.95
                    </td>
                    <td class="px-4 py-3 text-xs">
                    <span
                        class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600"
                    >
                        Unpaid
                    </span>
                    </td>
                    <td class="px-4 py-3 text-sm">
                    6/10/2020
                    </td>
                    <td>
                    <button
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    >
                    View Ticket
                    
                    </button>
                    </td>
                </tr> -->

                </tbody>
            </table>
            </div>
            <div
            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
            >
            <span class="flex items-center col-span-3">
                Showing 21-30 of 100
            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <nav aria-label="Table navigation">
                <ul class="inline-flex items-center">
                    <li>
                    <button
                        class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                        aria-label="Previous"
                    >
                        <svg
                        aria-hidden="true"
                        class="w-4 h-4 fill-current"
                        viewBox="0 0 20 20"
                        >
                        <path
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                        ></path>
                        </svg>
                    </button>
                    </li>
                    <li>
                    <button
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                        1
                    </button>
                    </li>
                    <li>
                    <button
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                        2
                    </button>
                    </li>
                    <li>
                    <button
                        class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                        3
                    </button>
                    </li>
                    <li>
                    <button
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                        4
                    </button>
                    </li>
                    <li>
                    <span class="px-3 py-1">...</span>
                    </li>
                    <li>
                    <button
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                        8
                    </button>
                    </li>
                    <li>
                    <button
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple"
                    >
                        9
                    </button>
                    </li>
                    <li>
                    <button
                        class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                        aria-label="Next"
                    >
                        <svg
                        class="w-4 h-4 fill-current"
                        aria-hidden="true"
                        viewBox="0 0 20 20"
                        >
                        <path
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd"
                            fill-rule="evenodd"
                        ></path>
                        </svg>
                    </button>
                    </li>
                </ul>
                </nav>
            </span>
            </div>
        </div>

        <!-- Charts -->
        
        <div class="grid gap-6 mb-8 md:grid-cols-2">
        
        </div>
        </div>
    </main>
@endsection


