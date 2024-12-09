<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Go Explore - Find your Destination</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

    <link rel="stylesheet" href="landingpage/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="landingpage/css/animate.css">
    
    <link rel="stylesheet" href="landingpage/css/owl.carousel.min.css">
    <link rel="stylesheet" href="landingpage/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="landingpage/css/magnific-popup.css">

    <link rel="stylesheet" href="landingpage/css/aos.css">

    <link rel="stylesheet" href="landingpage/css/ionicons.min.css">

    <link rel="stylesheet" href="landingpage/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="landingpage/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="landingpage/css/flaticon.css">
    <link rel="stylesheet" href="landingpage/css/icomoon.css">
    <link rel="stylesheet" href="landingpage/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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
          <li class="nav-item"><a href="/logout" class="nav-link"><span>Logout</span></a></li>
          @else
          <li class="nav-item"><a href="/login" class="nav-link"><span>Login</span></a></li>
          @endif
        </ul>
        
      </div>
    </div>
  </nav>
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('landingpage/images/bg_3.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Tour</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Destination</h1>
          </div>
        </div>
      </div>
    </div>


    <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
        	<div class="col-lg-3 sidebar ftco-animate">

        		<div class="sidebar-wrap bg-light ftco-animate">
            <form action="/destination">
              @csrf
        			<h3 class="heading mb-4">Find Destination</h3>
        
        				<div class="fields">
		              <div class="form-group">
		                <input type="text" class="form-control" placeholder="Destination Name" name="search">
		              </div>
		              <div class="form-group">
		                <div class="select-wrap one-third">
	                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                    <select name="category" id="" class="form-control" placeholder="Keyword search">
	                      <option value="">Select Category</option>
	                      <option value="Wisata Sejarah dan Budaya">Wisata Sejarah dan Budaya</option>
	                      <option value="Wisata Alam dan Taman">Wisata Alam dan Taman</option>
	                      <option value="Wisata Modern dan Hiburan">Wisata Modern dan Hiburan</option>
	                      <option value="Wisata Religi">Wisata Religi</option>
	                    </select>
	                  </div>
		              </div>

                  <div class="form-check">
                    <input name="rating" value="5" type="radio" class="form-check-input" id="rating5">
                    <label class="form-check-label" for="rating5">
                        <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i></span></p>
                    </label>
                </div>
                <div class="form-check">
                    <input name="rating" value="4" type="radio" class="form-check-input" id="rating4">
                    <label class="form-check-label" for="rating4">
                        <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i></span></p>
                    </label>
                </div>
                <div class="form-check">
                    <input name="rating" value="3" type="radio" class="form-check-input" id="rating3">
                    <label class="form-check-label" for="rating3">
                        <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
                    </label>
                </div>
                <div class="form-check">
                    <input name="rating" value="2" type="radio" class="form-check-input" id="rating2">
                    <label class="form-check-label" for="rating2">
                        <p class="rate"><span><i class="icon-star"></i><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
                    </label>
                </div>
                <div class="form-check">
                    <input name="rating" value="1" type="radio" class="form-check-input" id="rating1">
                    <label class="form-check-label" for="rating1">
                        <p class="rate"><span><i class="icon-star"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i><i class="icon-star-o"></i></span></p>
                    </label>
                </div>
		              <div class="form-group">
		                <input type="submit" value="Search" class="btn btn-primary py-3 px-5">
		              </div>
		            </div>
	            </form>
        		</div>
        	
          </div>
          <div class="col-lg-9">
          	<div class="row">

            @if ( $Destination->count() == 0)
            <style>
              .no-result-container {
                  text-align: center;
                  padding: 20px;
                  background: #fff;
                  border-radius: 10px;
                  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                  max-width: 400px;
                  margin: auto; 
              }

              .no-result-icon i {
                  font-size: 100px;
                  color: #999; 
                  margin-bottom: 20px;
              }

              .no-result-text {
                  font-size: 24px;
                  font-weight: bold; 
                  margin: 10px 0;
              }

              .no-result-subtext {
                  font-size: 16px; 
                  color: #666;
              }
            </style>

            <div class="no-result-container">
                <div class="no-result-icon">
                <i class="fas fa-search-minus"></i>
                </div>
                <h2 class="no-result-text">Oops! Tidak ada hasil yang ditemukan.</h2>
                <p class="no-result-subtext">Coba gunakan kata kunci yang spesifik untuk mencari lagi.</p>
            </div>
            @else 
              @foreach( $Destination as $value)             
              <div class="col-md-4 ftco-animate">
                <div class="destination">
                  <a href="/destination/single-page/{{ $value->idDestination }}" class="img img-2 d-flex justify-content-center align-items-center" style="background-image: url('img/{{ $value->Image }}');">
                    <div class="icon d-flex justify-content-center align-items-center">
                  <span class="icon-search2"></span>
                </div>
                  </a>
                  <div class="text p-3">
                    <div class="d-flex">
                      <div class="one">
                        <h3><a href="#">{{ $value->Name_Destination }}</a></h3>

                        @if ( $value->rating == 5 )
                        <p class="rate">
                          <i class="icon-star"></i>
                          <i class="icon-star"></i>
                          <i class="icon-star"></i>
                          <i class="icon-star"></i>
                          <i class="icon-star"></i>
                          <span>{{ $value->rating }} Rating</span>
                        </p>
                        @endif
                       
                        @if ( $value->rating == 4 )
                        <p class="rate">
                          <i class="icon-star"></i>
                          <i class="icon-star"></i>
                          <i class="icon-star"></i>
                          <i class="icon-star"></i>
                          <i class="icon-star-o"></i>
                          <span>{{ $value->rating }} Rating</span>
                        </p>
                        @endif
                    
                        @if ( $value->rating == 3 )
                        <p class="rate">
                          <i class="icon-star"></i>
                          <i class="icon-star"></i>
                          <i class="icon-star"></i>
                          <i class="icon-star-o"></i>
                          <i class="icon-star-o"></i>
                          <span>{{ $value->rating }} Rating</span>
                        </p>
                        @endif

                        @if ( $value->rating == 2 )
                        <p class="rate">
                          <i class="icon-star"></i>
                          <i class="icon-star"></i>
                          <i class="icon-star-o"></i>
                          <i class="icon-star-o"></i>
                          <i class="icon-star-o"></i>
                          <span>{{ $value->rating }} Rating</span>
                        </p>
                        @endif

                        @if ( $value->rating == 1 )
                        <p class="rate">
                          <i class="icon-star"></i>
                          <i class="icon-star-o"></i>
                          <i class="icon-star-o"></i>
                          <i class="icon-star-o"></i>
                          <i class="icon-star-o"></i>
                          <span>{{ $value->rating }} Rating</span>
                        </p>
                        @endif
          
                      </div>
                      <div class="two">
                        <span class="price">Rp.{{ $value->Price_perticket }}</span>
                      </div>
                    </div>
                    <p>{{ $value->Description }}</p>
                    <p class="days"><span>{{ $value->Opening_hours }}</span></p>
                    <hr>
                      <p class="bottom-area d-flex" >
                          @if(Auth::check())
                            @if( $DB_ListBookings->contains(function($booking) use ($value) {
                              return $booking->id_user == Auth::user()->id && $booking->id_destination == $value->idDestination;
                            }) )
                            <span class="ml-auto">
                                <button class="btn btn-success add-list" data-id="{{ $value->idDestination }}">Added</button>
                              </span>
                            @else
      
                              <span class="ml-auto">
                                <button class="btn btn-primary add-list" data-id="{{ $value->idDestination }}"><i class="fas fa-shopping-cart"></i> Add List</button>
                              </span>
                            @endif
                          @else
                            <span class="ml-auto">
                                <button class="btn btn-primary add-list-false" data-id="{{ $value->idDestination }}"><i class="fas fa-shopping-cart"></i> Add List</button>
                            </span>
                          @endif
                        </p>
                  </div>
                </div>
              </div>
              @endforeach
            @endif

          	</div>


          	<div class="row mt-5">
		          <div class="col text-center">
              {{ $Destination->links('pagination::bootstrap-4') }}
		          </div>
		        </div>
          </div> <!-- .col-md-8 -->
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
    
  

  <script src="landingpage/js/jquery.min.js"></script>
  <script src="landingpage/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="landingpage/js/popper.min.js"></script>
  <script src="landingpage/js/bootstrap.min.js"></script>
  <script src="landingpage/js/jquery.easing.1.3.js"></script>
  <script src="landingpage/js/jquery.waypoints.min.js"></script>
  <script src="landingpage/js/jquery.stellar.min.js"></script>
  <script src="landingpage/js/owl.carousel.min.js"></script>
  <script src="landingpage/js/jquery.magnific-popup.min.js"></script>
  <script src="landingpage/js/aos.js"></script>
  <script src="landingpage/js/jquery.animateNumber.min.js"></script>
  <script src="landingpage/js/bootstrap-datepicker.js"></script>
  <script src="landingpage/js/jquery.timepicker.min.js"></script>
  <script src="landingpage/js/scrollax.min.js"></script>
  <script src="landingpage/js/range.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="landingpage/js/google-map.js"></script>
  <script src="landingpage/js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    window.addEventListener("scroll", function () {
        localStorage.setItem("scrollPosition", window.scrollY);
    });
    window.addEventListener("load", function () {
        const scrollPosition = localStorage.getItem("scrollPosition");
        if (scrollPosition) {
            window.scrollTo(0, scrollPosition);
        }
    });
  </script>
  <script>
	$(document).ready(function(){
		let csrfToken = $('meta[name="csrf-token"]').attr('content');
		$('.add-list-false').click(function(){
			window.location.href = "/login"
		})
		$('.add-list').click(function(){
			@if (Auth::check())
			var id_user = {{ Auth::user()->id }};
			var id_destination = $(this).data('id'); 
			@else 
			window.location.href ='/login'
			@endif
			$.ajax({
				url: "/add-list", 
				method: "POST",
				headers: {
					'X-CSRF-TOKEN': csrfToken
				},
				contentType: 'application/json', 
				processData: false, 
				data: JSON.stringify({
					id_user: id_user,
					id_destination: id_destination,
				}),
				success: function (response) {	

					if(response.menambah){
						Swal.fire({
						position: "center",
						icon: "success",
						title: "Berhasil Menambahkan ke Daftar List",
						showConfirmButton: false,
						timer: 1500
					});

						$('.btn.btn-primary.add-list[data-id="' + id_destination + '"]')
						.text('Added')       
						.removeClass('btn-primary')       
						.addClass('btn-success')          
					  
					}
		
					if(response.menghapus){
						Swal.fire({
						position: "center",
						icon: "success",
						title: "Berhasil Menghapus dari Daftar List",
						showConfirmButton: false,
						timer: 1500
					});

						$('.btn.btn-success.add-list[data-id="' + id_destination + '"]')
						.text('Add List')       
						.removeClass('btn-success')       
						.addClass('btn-primary')          
						    
					}
				},
				error: function (xhr, status, error) {
					alert('Gagal !');
				}
			});
		});
	});
  </script>

    
  </body>
</html>