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
          <li class="nav-item cta"><a href="/" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="/destination" class="nav-link">Destination</a></li>
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

    <div class="hero-wrap js-fullheight" style="background-image: url('landingpage/images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><strong>Eksplorasi <br></strong>Tujuan menakjubkan Anda</h1>
            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Mulai perjalanan Anda menuju keindahan Surabaya yang memukau</p>
            <div class="block-17 my-4">


              <form action="/destination" class="d-block d-flex">
              @csrf
                <div class="fields d-block d-flex">
                  <div class="textfield-search one-third">
                  	<input name="search" type="text" class="form-control" placeholder="Temukan Destinasi">
                  </div>
                  <div class="select-wrap one-third">
                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                    <select name="category" id="" class="form-control" placeholder="Kategori">
                      <option value="">Category</option>
					  <option value="Wisata Sejarah dan Budaya">Wisata Sejarah dan Budaya</option>
					<option value="Wisata Alam dan Taman">Wisata Alam dan Taman</option>
					<option value="Wisata Modern dan Hiburan">Wisata Modern dan Hiburan</option>
					<option value="Wisata Religi">Wisata Religi</option>
                    </select>
                  </div>
                </div>
                <input type="submit" class="search-submit btn btn-primary" value="Search">  
              </form>


            </div>
            
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section services-section bg-light">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-guarantee"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Jaminan Harga Terbaik</h3>
                <p>Dapatkan tiket dengan harga terbaik untuk destinasi favorit Anda di Surabaya.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-like"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Dipercaya oleh Para Wisatawan</h3>
                <p>Telah melayani ribuan wisatawan dengan pengalaman terbaik.</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-detective"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3"> Agen Perjalanan Terpercaya</h3>
                <p>Mitra terbaik untuk menjelajahi Surabaya dan sekitarnya.</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services d-block text-center">
              <div class="d-flex justify-content-center"><div class="icon"><span class="flaticon-support"></span></div></div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Layanan Pelanggan yang Siap Membantu</h3>
                <p>Tim kami selalu siap membantu Anda kapan saja.</p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>
    
    <section class="ftco-section ftco-destination">
    	<div class="container">
    		<div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
          	<span class="subheading">Featured</span>
            <h2 class="mb-4"><strong>All</strong> Destination</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-12">
    				<div class="destination-slider owl-carousel ftco-animate">

						@foreach( $DB_Destination as $value)

								<div class="col-sm col-md-6 col-lg ftco-animate">
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
															<button class="btn btn-primary add-list" data-id="{{ $value->idDestination }}">Add List</button>
														</span>
													@endif
												@else
													<span class="ml-auto">
															<button class="btn btn-primary add-list-false" data-id="{{ $value->idDestination }}">Add List</button>
													</span>
												@endif
	
											</p>
										</div>
									</div>
								</div>
						
						@endforeach
	    				
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
          	<span class="subheading">Special Offers</span>
            <h2 class="mb-4"><strong>Top </strong>Destination</h2>
          </div>
        </div>    		
    	</div>
    	<div class="container-fluid">
    		<div class="row">
				<div class="col-md-12">
					<div class="destination-slider owl-carousel ftco-animate">
						@foreach ( $DB_Destination->where('rating',5) as $value )
							<div class="col-sm col-md-6 col-lg ftco-animate">
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
									<p class="bottom-area d-flex">
									<span><i class="icon-map-o"></i> {{ $value->Locations}} </span> 
									<span class="ml-auto"><a href="/destination/single-page/{{ $value->idDestination }}">View</a></span>
									</p>
								</div>
								</div>
							</div>
						@endforeach			
					</div>
				</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(landingpage/images/bg_1.jpg);">
    	<div class="container">
    		<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2 class="mb-4">Some fun facts</h2>
            <span class="subheading">More than {{ $DB_Destination->count() }} destination orders</span>
          </div>
        </div>
    		<div class="row justify-content-center">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="4">0</strong>
		                <span>Wisata Sejarah dan Budaya</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="5">0</strong>
		                <span>Wisata Alam dan Taman</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="6">0</strong>
		                <span>Wisata Modern dan Hiburan</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="7">0</strong>
		                <span>Wisata Religi</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>


    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-start">
          <div class="col-md-5 heading-section ftco-animate">
          	<span class="subheading">Best Directory Website</span>
            <h2 class="mb-4 pb-3"><strong>Why</strong> Choose Us?</h2>
            <p>Surabaya dikenal sebagai kota dengan destinasi wisata yang beragam, mulai dari wisata sejarah hingga hiburan modern. Aplikasi kami memudahkan Anda menemukan dan memesan tiket dengan cepat dan aman.</p>
           	<li><strong>Reservasi Cepat </strong>: Pesan tiket dalam hitungan menit tanpa antre.</li>
			<li><strong>Harga Terbaik</strong>: Kami menawarkan berbagai promo dan diskon menarik.</li>
			<li><strong>Layanan 24/7</strong>: Dukungan pelanggan selalu tersedia untuk membantu Anda.</li>
            <p><a href="#" class="btn btn-primary btn-outline-primary mt-4 px-4 py-3">Read more</a></p>
          </div>
					<div class="col-md-1"></div>
          <div class="col-md-6 heading-section ftco-animate">
          	<span class="subheading">Testimony</span>
            <h2 class="mb-4 pb-3"><strong>Our</strong> Guests Says</h2>
          	<div class="row ftco-animate">
		          <div class="col-md-12">
		            <div class="carousel-testimony owl-carousel">
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url(landingpage/images/person_1.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">Pelayanan sangat memuaskan! Dengan aplikasi ini, saya bisa langsung memesan tiket wisata Surabaya tanpa ribet. Highly recommended!</p>
		                    <p class="name">Ahmad Lazim</p>
		                    <span class="position">Guest from Jombang</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url(landingpage/images/person_2.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">Aplikasi ini sangat membantu saya saat berlibur di Surabaya. Semua tiket ke destinasi favorit tersedia dalam satu platform. Tidak perlu repot mencari ke tempat lain!</p>
		                    <p class="name">Reynaldi Susilo Waskito</p>
		                    <span class="position">Guest from Sidoarjo</span>
		                  </div>
		                </div>
		              </div>
		              <div class="item">
		                <div class="testimony-wrap d-flex">
		                  <div class="user-img mb-5" style="background-image: url(landingpage/images/person_3.jpg)">
		                    <span class="quote d-flex align-items-center justify-content-center">
		                      <i class="icon-quote-left"></i>
		                    </span>
		                  </div>
		                  <div class="text ml-md-4">
		                    <p class="mb-5">Proses pemesanan sangat cepat dan mudah. Saya juga mendapatkan diskon spesial untuk beberapa tempat wisata. Sangat puas dengan pengalaman ini!</p>
		                    <p class="name">Safina</p>
		                    <span class="position">Guest from Neptunus</span>
		                  </div>
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-start mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate">
            <span class="subheading">Recent Blog</span>
            <h2><strong>Tips</strong> &amp; Articles</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-3 d-flex ftco-animate">
            <div class="blog-entry align-self-stretch">
              <a href="/blog/8-best-homestay-surabaya" class="block-20" style="background-image: url('landingpage/images/image_1.jpg');">
              </a>
              <div class="text p-4 d-block">
              	<span class="tag">Tips, Travel</span>
                <h3 class="heading mt-3"><a href="#">8 Best homestay in surabaya that you don't miss out</a></h3>
                
              </div>
            </div>
          </div>
    </section>
		
	<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Jangan Lewatkan Destinasi Menarik di Surabaya !</h2>
              <p>Berlangganan untuk mendapatkan pemberitahuan tentang acara terbaru, promo spesial, dan panduan wisata langsung di inbox Anda</p>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Go Explore</h2>
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
  <script src="landingpage/https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="landingpage/js/google-map.js"></script>
  <script src="landingpage/js/main.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

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