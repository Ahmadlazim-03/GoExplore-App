<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Go Explore - Find your Destination</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('landingpage/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landingpage/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('landingpage/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landingpage/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landingpage/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('landingpage/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('landingpage/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landingpage/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('landingpage/css/jquery.timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('landingpage/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('landingpage/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('landingpage/css/style.css') }}">
	<script type="text/javascript"
	src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="{{ config('midtrans.client_key') }}"></script>
	<style>
		.video-container {
			width: 100%; 
			padding-left: 15px;
			padding-right: 15px; 
			border: 5px solid #FF5733; 
			border-radius: 20px; 
			background: #fff; 
			box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1), 0 4px 12px rgba(0, 0, 0, 0.15); 
			overflow: hidden; 
			transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out, border-color 0.3s ease-in-out; 
			position: relative; 
		}

		.video-container:hover {
			transform: scale(1.05); 
			box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2), 0 6px 15px rgba(0, 0, 0, 0.25); 
			border-color: #FF4500; 
		}

		.video-container::before {
			content: ""; 
			position: absolute;
			top: 50%; 
			left: 50%; 
			width: 0;
			height: 0;
			background-color: #FF5733; 
			transition: all 0.5s ease-out;
			border-radius: 50%;
			z-index: 1;
		}

		.video-container.loaded::before {
			width: 100%;
			height: 100%;
			top: 0;
			left: 0;
			border-radius: 0; 
		}

		.styled-video {
			width: 100%; 
			height: auto; 
			display: block; 
			border-radius: 15px; 
			transition: transform 0.3s ease-in-out; 
		}

		.video-container:hover .styled-video {
			transform: scale(1.00); 
			filter: brightness(1.1); 
		}

		.styled-video {
			animation: fadeIn 1s ease-out;
		}

		@keyframes fadeIn {
			0% {
				opacity: 0;
				transform: translateY(20px);
			}
			100% {
				opacity: 1;
				transform: translateY(0);
			}
		}
		
	</style>

</body>

  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Go Explore</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
          <li class="nav-item cta"><a href="/destination" class="nav-link">Destination</a></li>
		  <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
		  <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
          @if(Auth::check())
		  <li class="nav-item"><a href="/mybookings" class="nav-link"><span>My Booking</span></a></li>
		  	@if ( Auth::user()->role == 1 )
			  <li class="nav-item"><a href="/dashboard" class="nav-link"><span>Admin</span></a></li>
			@endif
          <li class="nav-item"><a href="/logout" class="nav-link"><span>Logout</span></a></li>
		  @else
		  <li class="nav-item"><a href="/login" class="nav-link"><span>Login</span></a></li>
		  @endif
        </ul>
      </div>
    </div>
  </nav>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
          	<div class="row">
          		<div class="col-md-12 ftco-animate">
          			<div class="single-slider owl-carousel">

					  	@foreach (json_decode($detail->image) as $value)
							<div class="item">
								<div class="hotel-img" style="background-image: url('{{ asset($value) }}');"></div>
							</div>
						@endforeach
				
          			</div>
		
          		</div>
          		<div class="col-md-12 hotel-single mt-4 mb-5 ftco-animate">
          			<span>{{ $destination->Category }}</span>
          			<h2>{{ $destination->Name_Destination }}</h2>
          			<p class="rate mb-5">
          				<span class="loc"><a href="{{ $destination->Link_Location }}"><i class="icon-map"></i> {{ $destination->Locations }}</a></span>
						@if ( $detail->rating == 1 )
          						<span class="star">
    							<i class="icon-star"></i>
    							<i class="icon-star-o"></i>
    							<i class="icon-star-o"></i>
    							<i class="icon-star-o"></i>
    							<i class="icon-star-o"></i>
    							{{ $detail->rating }} Rating</span>
						@endif			
						@if ( $detail->rating == 2 )
          						<span class="star">
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star-o"></i>
    							<i class="icon-star-o"></i>
    							<i class="icon-star-o"></i>
    							{{ $detail->rating }} Rating</span>
						@endif		
						@if ( $detail->rating == 3 )
          						<span class="star">
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star-o"></i>
    							<i class="icon-star-o"></i>
    							{{ $detail->rating }} Rating</span>
						@endif	
						@if ( $detail->rating == 4 )
          						<span class="star">
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star-o"></i>
    							{{ $detail->rating }} Rating</span>
						@endif
						@if ( $detail->rating == 5 )
          						<span class="star">
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							<i class="icon-star"></i>
    							{{ $detail->rating }} Rating</span>
						@endif									
					</p>
    				<p>{{ $detail->description }}</p>



          	</div>
          </div> <!-- .col-md-8 -->
        </div>
		<div class="col-lg-3 sidebar">
        		


			<div class="sidebar-wrap bg-light ftco-animate">
				<h3 class="heading mb-4">Add Comment</h3>

				@if(Auth::check())
					<form action="/tambah-comment/{{ $destination->idDestination }}" method="POST">
						@csrf
						<div class="form-group mb-4">
							<label for="commentText">Your Comment</label>
							<textarea  id="commentText" name="comment" class="form-control" rows="5" required></textarea>
						</div>

						<div class="form-check">
							<input type="radio" name="rating" value="5" class="form-check-input" id="checkbox1">
							<label class="form-check-label" for="checkbox1">
								<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></p>
							</label>
						</div>
						<div class="form-check">
							<input type="radio" name="rating" value="4" class="form-check-input" id="checkbox2">
							<label class="form-check-label" for="checkbox2">
								<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i></span></p>
							</label>
						</div>
						<div class="form-check">
							<input type="radio" name="rating" value="3" class="form-check-input" id="checkbox3">
							<label class="form-check-label" for="checkbox3">
								<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
							</label>
						</div>
						<div class="form-check">
							<input type="radio" name="rating" value="2" class="form-check-input" id="checkbox4">
							<label class="form-check-label" for="checkbox4">
								<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
							</label>
						</div>
						<div class="form-check">
							<input type="radio" name="rating" value="1" class="form-check-input" id="checkbox5">
							<label class="form-check-label" for="checkbox5">
								<p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
							</label>
						</div>

						
						<div class="form-group">
						<input type="submit" value="Add" class="btn btn-primary py-3 px-5">
						</div>
					</form>
				@else 
				
						
						<div class="form-group mb-4">
							<label for="commentText">Your Comment</label>
							<textarea  id="commentText" name="commentText" class="form-control" rows="5"></textarea>
						</div>

						<div class="form-check">
							<input type="radio" name="rating" value="5" class="form-check-input" id="checkbox1">
							<label class="form-check-label" for="checkbox1">
								<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></p>
							</label>
						</div>
						<div class="form-check">
							<input type="radio" name="rating" value="4" class="form-check-input" id="checkbox2">
							<label class="form-check-label" for="checkbox2">
								<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i></span></p>
							</label>
						</div>
						<div class="form-check">
							<input type="radio" name="rating" value="3" class="form-check-input" id="checkbox3">
							<label class="form-check-label" for="checkbox3">
								<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
							</label>
						</div>
						<div class="form-check">
							<input type="radio" name="rating" value="2" class="form-check-input" id="checkbox4">
							<label class="form-check-label" for="checkbox4">
								<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
							</label>
						</div>
						<div class="form-check">
							<input type="radio" name="rating" value="1" class="form-check-input" id="checkbox5">
							<label class="form-check-label" for="checkbox5">
								<p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
							</label>
						</div>

						
						<div class="form-group">
						<a href="/login"><input type="submit" value="Add" class="btn btn-primary py-3 px-5"></a>
					</div>			
				@endif
				
			
			</div>

			<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
			<script>
				$(document).ready(function() {
					$('.form-check-input').on('change', function() {
						$('.form-check-input').not(this).prop('checked', false);
					});
				});
			</script>



    <div class="sidebar-wrap bg-light ftco-animate">
        <h3 class="heading mb-4">Recent Comment</h3>
                
        @foreach( $DB_comment as $comment)
            <div class="comment-item d-flex mb-4">					
                <div class="profile-pic mr-3">
                        @foreach(DB::table('users')->where('id', $comment->id_user)->get() as $user)
                            <img src="{{ asset('img/'.$user->profile_picture) }}" alt="User's Profile" class="rounded-circle" width="50" height="50">
                        @endforeach
                </div>              
                <div class="comment-content">   
                    <h5 class="username mb-2">
                        @foreach(DB::table('users')->where('id', $comment->id_user)->get() as $user)
                            {{ $user->name }}
                        @endforeach
                    </h5>                  
                    <p class="comment-text">
                        {{ $comment->comment }}
                    </p>

                    @if( $comment->rating == 5)
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                    @endif

                    @if( $comment->rating == 4)
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star-o"></i>
                    @endif

                    @if( $comment->rating == 3)
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star-o"></i>
                        <i class="icon-star-o"></i>
                    @endif

                    @if( $comment->rating == 2)
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star-o"></i>
                        <i class="icon-star-o"></i>
                        <i class="icon-star-o"></i>
                    @endif

                    @if( $comment->rating == 1)
                        <i class="icon-star"></i>
                        <i class="icon-star-o"></i>
                        <i class="icon-star-o"></i>
                        <i class="icon-star-o"></i>
                        <i class="icon-star-o"></i>
                    @endif

                    <hr>
                </div>
            </div>
        @endforeach
		<div class="d-flex justify-content-center">
    {{ $DB_comment->links('pagination::bootstrap-4') }}
</div>

    </div>
				









          </div>
					

		<div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
			<h4 class="mb-4">Take A Tour</h4>
			<div class="block-16 video-container">
				<figure>
					<video class="styled-video mt-3" controls>
						<source src="{{ asset('video/'.$detail->video) }}" type="video/mp4">
						Your browser does not support the video tag.
					</video>
				</figure>
			</div>
		</div>


          	
				
					<div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
						<h4 class="mb-5">Check Availability &amp; Booking</h4>
						<div class="fields">
							<div class="row">
								<div class="col-md-12">
								<div class="form-group">
									<input data-toggle="modal" data-target=".bd-example-modal-lg" type="submit" value="Check Availability" class="btn btn-primary py-3">
								</div>
							</div>
						</div>
						</div>
					</div>
					<style>
						.custom-modal-lg {
							max-width: 900px; 
							margin-top: 75px;
						}
					</style>

					<div
					class="modal fade bd-example-modal-lg"
					tabindex="-1"
					role="dialog"
					aria-labelledby="myLargeModalLabel"
					aria-hidden="true"
					>
					<div class="modal-dialog modal-lg custom-modal-lg">
						<div class="modal-content">
						<div class="row no-gutters">
							
							<div class="col-md-6 p-4">
							<div class="destination">
								<a
								href="/destination/single-page/{{ $destination->idDestination }}"
								class="img img-2 d-flex justify-content-center align-items-center"
								style="background-image: url({{ asset('img/' . $destination->Image) }});"
								>
								<div class="icon d-flex justify-content-center align-items-center">
									<span class="icon-search2"></span>
								</div>
								</a>
								<div class="text p-3">
								<div class="d-flex">
									<div class="one">
									<h3>
										<a href="">{{ $destination->Name_Destination }}</a>
									</h3>
									<p class="rate">
										<i class="icon-star"></i>
										<i class="icon-star"></i>
										<i class="icon-star"></i>
										<i class="icon-star"></i>
										<i class="icon-star-o"></i>
										<span>8 Rating</span>
									</p>
									</div>
									<div class="two">
									<span class="price">Rp.{{ $destination->Price_perticket }}</span>
									</div>
								</div>
								<p>{{ $destination->Description }}</p>
								
								<div class="d-flex justify-content-between align-items-center">
									<p class="days mb-0"><span>{{ $destination->Opening_hours }}</span></p>
									@if( $destination->Available_seat <= 0 )
										<p class="mb-0" style="color:red;">Slot Habis</p>
									@else 
										<p class="mb-0">Tersisa <span style="color:red;">{{ $destination->Available_seat }}</span> Slot</p>
									@endif
								
								</div>

								<hr />
								<p class="bottom-area d-flex">
									<span>
									<a href="{{ $destination->Link_Location }}"
										><i class="icon-map-o"></i
									></a>
									{{ $destination->Locations }}
									</span>
								</p>
								</div>
							</div>
							</div>
						
							<div class="col-md-6 p-4">
							<h4 class="mb-3">Pendaftaran Tiket</h4>
						
							
					
								<div class="form-group">
								<label for="tickets">Jumlah Tiket</label>
								<input
									type="number"
									class="form-control"
									id="qty"
									name="qty"
									placeholder="Masukkan Jumlah Tiket"
									min="1"
									max="{{ $destination->Available_seat }}"
									required
								/>
								</div>
								<div class="form-group">
								<label for="date">Tanggal</label>
								<input
									type="date"
									class="form-control"
									id="date"
									name="date"
									required
								/>
								</div>

								@if (Auth::check())

									<button @if( $destination->Available_seat <= 0 )
											disabled 
											@endif 
									type="submit" id="pay-button" class="btn btn-info w-100 mt-2">
									Pesan Tiket
									</button>

								@else
								
									<a href="/login"><button 
									type="submit" class="btn btn-info w-100 mt-2">
									Pesan Tiket
									</button></a>

								@endif
							

							<div id="snap-container"></div>

							</div>
						</div>
						</div>
					</div>
					</div>


				
					<div class="col-md-12 hotel-single ftco-animate mb-5 mt-5">
						<h4 class="mb-4">Related Destination</h4>
						<div class="row">

						@foreach( $related as $value)

							@if ( $value->idDestination != $detail->destinations_id )
							<div class="col-md-4 ftco-animate">
								<div class="destination">
									<a href="/destination/single-page/{{ $value->idDestination }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset('img/'.$value->Image) }});">
										<div class="icon d-flex justify-content-center align-items-center">
									<span class="icon-search2"></span>
								</div>
									</a>
									<div class="text p-3">
										<div class="d-flex">
											<div class="one">
												<h3><a href="">{{ $value->Name_Destination }}</a></h3>
												<p class="rate">
													<i class="icon-star"></i>
													<i class="icon-star"></i>
													<i class="icon-star"></i>
													<i class="icon-star"></i>
													<i class="icon-star-o"></i>
													<span>8 Rating</span>
												</p>
											</div>
											<div class="two">
												<span class="price">Rp.{{ $value->Price_perticket }}</span>
											</div>
										</div>
										<p>{{ $value->Description }}</p>
										<p class="days"><span>{{ $value->Opening_hours }}</span></p>
										<hr>
										<p class="bottom-area d-flex">
											<span><i class="icon-map-o"></i> {{ $value->Locations}} </span> 
											<span class="ml-auto"><a href="/destination/single-page/{{ $value->idDestination }}">View</a></span>
										</p>
									</div>
								</div>
							</div>
							@endif

						@endforeach

						</div>
					</div>


      </div>
    </section> <!-- .section -->

	<footer class="ftco-footer ftco-bg-dark ftco-section">
		<div class="container">
		  <div class="row mb-5">
			<!-- Go Explore Section -->
			<div class="col-md-3">
			  <div class="ftco-footer-widget mb-4">
				<h2 class="ftco-heading-2 text-white">Go Explore</h2>
				<p class="text-white">Setiap Langkah di Surabaya Menawarkan Cerita Baru. Bergabunglah dengan Kami dalam Menyusuri Kota Ini dan Temukan Keajaiban yang Menanti.</p>
				<ul class="ftco-footer-social list-unstyled mt-5">
				  <li class="ftco-animate"><a href="#" class="text-white"><span class="icon-twitter"></span></a></li>
				  <li class="ftco-animate"><a href="#" class="text-white"><span class="icon-facebook"></span></a></li>
				  <li class="ftco-animate"><a href="#" class="text-white"><span class="icon-instagram"></span></a></li>
				</ul>
			  </div>
			</div>
	  
			<!-- Information Section -->
			<div class="col-md-3">
			  <div class="ftco-footer-widget mb-4">
				<h2 class="ftco-heading-2 text-white">Information</h2>
				<ul class="list-unstyled">
				  <li><a href="#" class="py-2 d-block text-white">About</a></li>
				  <li><a href="#" class="py-2 d-block text-white">Destination</a></li>
				  <li><a href="#" class="py-2 d-block text-white">Login</a></li>
				  <li><a href="#" class="py-2 d-block text-white">Become a partner</a></li>
				  <li><a href="#" class="py-2 d-block text-white">Best Price Guarantee</a></li>
				  <li><a href="#" class="py-2 d-block text-white">Privacy and Policy</a></li>
				</ul>
			  </div>
			</div>
	  
			<!-- Customer Support Section -->
			<div class="col-md-3">
			  <div class="ftco-footer-widget mb-4">
				<h2 class="ftco-heading-2 text-white">Customer Support</h2>
				<ul class="list-unstyled">
				  <li><a href="#" class="py-2 d-block text-white">FAQ</a></li>
				  <li><a href="#" class="py-2 d-block text-white">Payment Option</a></li>
				  <li><a href="#" class="py-2 d-block text-white">Booking Tips</a></li>
				  <li><a href="#" class="py-2 d-block text-white">How it works</a></li>
				  <li><a href="#" class="py-2 d-block text-white">Contact Us</a></li>
				</ul>
			  </div>
			</div>
	  
			<!-- Contact Information Section -->
			<div class="col-md-3">
			  <div class="ftco-footer-widget mb-4">
				<h2 class="ftco-heading-2 text-white">Have a Questions?</h2>
				<div class="block-23 mb-3">
				  <ul>
					<li><span class="icon icon-map-marker text-white"></span><span class="text text-white">Surabaya</span></li>
					<li><a href="#" class="text-white"><span class="icon icon-phone"></span><span class="text text-white">+62 12345678</span></a></li>
					<li><a href="#" class="text-white"><span class="icon icon-envelope"></span><span class="text text-white">@goexplorecom</span></a></li>
				  </ul>
				</div>
			  </div>
			</div>
		  </div>
	  
		  <!-- Footer Bottom Section -->
		  <div class="row">
			<div class="col-md-12 text-center">
			  <p class="text-white">© 2024 Go Explore. All Rights Reserved.</p>
			</div>
		  </div>
		</div>
	  </footer>

	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
    <script src="{{ asset('landingpage/js/jquery.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/popper.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('landingpage/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/aos.js') }}"></script>
    <script src="{{ asset('landingpage/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('landingpage/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('landingpage/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('landingpage/js/google-map.js') }}"></script>
    <script src="{{ asset('landingpage/js/main.js') }}"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	
	<script>
		$(document).ready(function () {
					
			let csrfToken = $('meta[name="csrf-token"]').attr('content');

			$('#pay-button').on('click', function () {


				@if (Auth::check())

				var name = "{{ Auth::user()->name }}";
				var id_user = {{ Auth::user()->id }};
				var phone = "{{ Auth::user()->phone_number }}";
				var qty = $('#qty').val();
				var date = $('#date').val();
				var mount = {{ $destination->Price_perticket }}; 
				var id_destination = {{ $destination->idDestination }}

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
						var id = {{ $destination->idDestination }};
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

	



  </body>
</html>