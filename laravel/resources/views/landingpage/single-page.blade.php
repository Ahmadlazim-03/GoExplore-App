<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Go Explore - Find your Destination</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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

  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="index.html">Go Explore.</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
          <li class="nav-item active"><a href="/destination" class="nav-link">Destination</a></li>
		  <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
		  <li class="nav-item"><a href="/contact" class="nav-link">Contact</a></li>
          @if(Auth::check())
		  <li class="nav-item cta"><a href="/mybookings" class="nav-link"><span>My Booking</span></a></li>
		  @else
		  <li class="nav-item cta"><a href="/login" class="nav-link"><span>Login</span></a></li>
		  @endif
        </ul>
      </div>
    </div>
  </nav>

    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
        	<div class="col-lg-3 sidebar">
        		
        		<!-- <div class="sidebar-wrap bg-light ftco-animate">
        			<h3 class="heading mb-4">Star Rating</h3>
        			<form method="post" class="star-rating">
							  <div class="form-check">
									<input type="checkbox" class="form-check-input" id="exampleCheck1">
									<label class="form-check-label" for="exampleCheck1">
										<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></p>
									</label>
							  </div>
							  <div class="form-check">
						      <input type="checkbox" class="form-check-input" id="exampleCheck1">
						      <label class="form-check-label" for="exampleCheck1">
						    	   <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i></span></p>
						      </label>
							  </div>
							  <div class="form-check">
						      <input type="checkbox" class="form-check-input" id="exampleCheck1">
						      <label class="form-check-label" for="exampleCheck1">
						      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
						     </label>
							  </div>
							  <div class="form-check">
							    <input type="checkbox" class="form-check-input" id="exampleCheck1">
						      <label class="form-check-label" for="exampleCheck1">
						      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
						      </label>
							  </div>
							  <div class="form-check">
						      <input type="checkbox" class="form-check-input" id="exampleCheck1">
						      <label class="form-check-label" for="exampleCheck1">
						      	<p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
							    </label>
							  </div>
							</form>
        		</div> -->
				<div class="sidebar-wrap bg-light ftco-animate">
					<h3 class="heading mb-4">Add Comment</h3>
					
					<form action="submit_comment.php" method="POST">
						
						<div class="form-group mb-4">
							<label for="commentText">Your Comment</label>
							<textarea id="commentText" name="commentText" class="form-control" rows="5"></textarea>
						</div>

						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="checkbox1">
							<label class="form-check-label" for="checkbox1">
								<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></p>
							</label>
						</div>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="checkbox2">
							<label class="form-check-label" for="checkbox2">
								<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i></span></p>
							</label>
						</div>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="checkbox3">
							<label class="form-check-label" for="checkbox3">
								<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
							</label>
						</div>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="checkbox4">
							<label class="form-check-label" for="checkbox4">
								<p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
							</label>
						</div>
						<div class="form-check">
							<input type="checkbox" class="form-check-input" id="checkbox5">
							<label class="form-check-label" for="checkbox5">
								<p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
							</label>
						</div>
						
						<div class="form-group">
		                <input type="submit" value="Add" class="btn btn-primary py-3 px-5">
		              </div>
					</form>
				</div>


				<div class="sidebar-wrap bg-light ftco-animate">
					<h3 class="heading mb-4">Recent Comment</h3>
					
				
					<div class="comment-item d-flex mb-4">
						
						<div class="profile-pic mr-3">
							<img src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png" alt="User's Profile" class="rounded-circle" width="50" height="50">
						</div>
						
						
						<div class="comment-content">
						
							<h5 class="username mb-2">Ahmad Lazim</h5>
							
							<p class="comment-text">This is a comment text. The user can type here.</p>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
    						<i class="icon-star"></i>

							<hr>
						</div>
					</div>

					<div class="comment-item d-flex mb-4">
						
						<div class="profile-pic mr-3">
							<img src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png" alt="User's Profile" class="rounded-circle" width="50" height="50">
						</div>
						
						
						<div class="comment-content">
							
							<h5 class="username mb-2">Reynaldi Susilo</h5>
							
							<p class="comment-text">This is a comment text. The user can type here.</p>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
							<i class="icon-star"></i>
    						<i class="icon-star"></i>

							<hr>
						</div>
					</div>
				</div>









          </div>
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

		<div class="col-md-12 hotel-single ftco-animate mb-5 mt-4">
						<h4 class="mb-4">Take A Tour</h4>
						<div class="block-16">
							<figure>
								<video width="100%" controls>
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
									<input type="submit" value="Check Availability" class="btn btn-primary py-3">
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
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">dirEngine</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">About</a></li>
                <li><a href="#" class="py-2 d-block">Service</a></li>
                <li><a href="#" class="py-2 d-block">Terms and Conditions</a></li>
                <li><a href="#" class="py-2 d-block">Become a partner</a></li>
                <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
                <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Customer Support</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">FAQ</a></li>
                <li><a href="#" class="py-2 d-block">Payment Option</a></li>
                <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
                <li><a href="#" class="py-2 d-block">How it works</a></li>
                <li><a href="#" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script>
    // Get all the checkboxes
    const checkboxes = document.querySelectorAll('.form-check-input');
    
    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('change', function () {
            // If any checkbox is checked, disable all others
            if (this.checked) {
                checkboxes.forEach((cb) => {
                    if (cb !== this) {
                        cb.disabled = true;
                    }
                });
            } else {
                // If unchecking, re-enable all checkboxes
                checkboxes.forEach((cb) => {
                    cb.disabled = false;
                });
            }
        });
    });
	</script>
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

    
  </body>
</html>