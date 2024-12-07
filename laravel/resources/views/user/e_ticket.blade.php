<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
	<link rel="stylesheet" href="{{ asset('ticket/style.css') }}">
	<script src="{{ asset('ticket/script.js') }}"></script>
	<style>
		.button-container {
			display: flex;
			justify-content: space-between;
			align-items: center; 
			width: 100%; 
			padding: 10px;
		}

		.btn-back {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			background-color: #4CAF50;
			color: white;
			padding: 12px 24px;
			border-radius: 30px;
			text-decoration: none;
			font-size: 16px;
			font-weight: bold;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
			transition: all 0.3s ease;
			white-space: nowrap;
			max-width: 200px;
			overflow: hidden;
			text-overflow: ellipsis;
			height: 50px;
			line-height: 50px;
		}


		.icon {
			font-size: 20px;
			margin-right: 8px;
		}

		.button-text {
			font-size: 30px;
			font-weight: bold;
			color: white;
			text-align: center;
			flex-grow: 1; 
		}


		.btn-back:hover {
			background-color: #45a049;
			box-shadow: 0 6px 15px rgba(0, 0, 0, 0.3);
			transform: translateY(-4px); 
		}


		.btn-back:focus {
			outline: none;
			box-shadow: 0 0 10px rgba(72, 157, 95, 0.5);
		}
	</style>
</head>
<body class="content">

<div class="button-container">
    <a href="/mybookings" class="btn-back">
        <span class="icon">&#8592;</span> Kembali
    </a>

    <span class="button-text">E_TICKET</span>

    <button id="downloadPdfBtn" class="btn-back">
		<span class="icon"><i class="fas fa-print"></i></span> Cetak
    </button>
</div>


@foreach(range(1, $count) as $i)

	<div class="ticket" >
		<div class="left">
			<div class="image" style="
				margin-top: 10px;
				margin-left: 10px;
				margin-bottom: 20px;
				height: 250px; 
				width: 250px; 
				background-image: url('https://external-preview.redd.it/cg8k976AV52mDvDb5jDVJABPrSZ3tpi1aXhPjgcDTbw.png?auto=webp&s=1c205ba303c1fa0370b813ea83b9e1bddb7215eb'); 
				background-size: cover; 
				background-position: center; 
				background-repeat: no-repeat; 			
				padding: 0; 
				display: block;">
				<p class="admit-one"></p>
				<div class="ticket-number" style="margin-top:15px">
					<p>#{{ $ticket->ticket_code }}</p>
				</div>
			</div>

			<div class="ticket-info">
				<p class="date">
					<span>Go Explore</span>
					<span class="june-29">
					{{ \Carbon\Carbon::parse($ticket->issue_date)->locale('id')->isoFormat('MMMM Do') }}
					</span>
					<span>{{ \Carbon\Carbon::parse($ticket->valid_until)->format('Y') }}</span>
				</p>
				<div class="show-name">
					<h2>
					@foreach( $user->where('id', Auth::user()->id) as $value)
					{{ $value->name }}
					@endforeach
					</h2>
				</div>
				<div class="time">
					<p>
					{{ \Carbon\Carbon::parse($ticket->issue_date)->format('Y-m-d') }}
					<span>TO</span>
					{{ \Carbon\Carbon::parse($ticket->valid_until)->format('Y-m-d') }}</p>
					<p>TIME <span>:</span>
					@foreach( $destination->where('idDestination', $ticket->destination_id) as $value)
						{{ $value->Opening_hours }}
					@endforeach
				</p>
				</div>
				<p class="location"><span>
					@foreach( $destination->where('idDestination', $ticket->destination_id) as $value)
						{{ $value->Name_Destination }}
					@endforeach
				</span>
					<span class="separator"><i class="far fa-smile"></i></span><span>
					@foreach( $destination->where('idDestination', $ticket->destination_id) as $value)
						{{ $value->Locations }}
					@endforeach
					</span>
				</p>
			</div>
		</div>
		<div class="right">
			<p class="admit-one">
				<span>GO EXPLORE</span>
				<span>GO EXPLORE</span>
				<span>GO EXPLORE</span>
			</p>
			<div class="right-info-container">
				<div class="show-name">
					<h1>
					@foreach( $destination->where('idDestination', $ticket->destination_id) as $value)
						{{ $value->Name_Destination }}
					@endforeach
					</h1>
				</div>
				<div class="time">
				
					@foreach( $destination->where('idDestination', $ticket->destination_id) as $value)
						{{ $value->Opening_hours }}
					@endforeach
				</div>
				<div class="barcode">
					@foreach( $destination->where('idDestination', $ticket->destination_id) as $value)
						<img src="{{ asset('img/'.$value->Image) }}" alt="QR code">
					@endforeach
				</div>
				<p class="ticket-number">
					#{{ $ticket->ticket_code }}
				</p>
			</div>
		</div>
	</div>
@endforeach


</body>
<script>
    
    document.getElementById("downloadPdfBtn").addEventListener("click", function() {  
        var element = document.querySelector(".ticket");
		var options = {
			margin:       0,
			filename:     'ticket.pdf',
			image:        { type: 'jpeg', quality: 0.98 },
			html2canvas:  { 
				scale: 2,
				useCORS: true,  
				logging: true,    
				allowTaint: false 
			},
			jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
		};
        html2pdf().from(element).set(options).save();
    });
</script>
</html>