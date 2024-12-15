<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Go Explore - Find your Destination</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
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
        <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="/destination" class="nav-link">Destination</a></li>
          <li class="nav-item cta"><a href="/about" class="nav-link">About</a></li>
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
    
    <div class="hero-wrap js-fullheight" style="background-image: url('landingpage/images/bg_2.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>About</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">About Us</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section">
    	<div class="container">
    		<div class="row d-md-flex">
	    		<div class="col-md-6 ftco-animate img about-image" style="background-image: url({{ asset('landingpage/images/sby.png') }});">
	    		</div>
	    		<div class="col-md-6 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <a class="nav-link active" id="v-pills-whatwedo-tab" data-toggle="pill" href="#v-pills-whatwedo" role="tab" aria-controls="v-pills-whatwedo" aria-selected="true">What we do</a>

		              <a class="nav-link" id="v-pills-mission-tab" data-toggle="pill" href="#v-pills-mission" role="tab" aria-controls="v-pills-mission" aria-selected="false">Our mission</a>

		              <a class="nav-link" id="v-pills-goal-tab" data-toggle="pill" href="#v-pills-goal" role="tab" aria-controls="v-pills-goal" aria-selected="false">Our goal</a>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">

		              <div class="tab-pane fade show active" id="v-pills-whatwedo" role="tabpanel" aria-labelledby="v-pills-whatwedo-tab">
		              	<div>
			                <h2 class="mb-4">Your Gateway to Surabaya's Best Destinations</h2>
			              	<p>
                        Discover the charm of Surabaya, the City of Heroes, with Go Explore as your trusted companion.</p>
			                <p>From iconic landmarks to hidden gems, plan your journey effortlessly and enjoy the best of Surabaya!</p>
				            </div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-mission" role="tabpanel" aria-labelledby="v-pills-mission-tab">
		                <div>
			                <h2 class="mb-4">Empowering Memorable Journeys</h2>
			              	<p>To inspire and simplify travel in Surabaya by connecting explorers with the city's rich culture, iconic landmarks, and hidden treasures, creating unforgettable memories for every journey.
                      </p>
			               
				            </div>
		              </div>

		              <div class="tab-pane fade" id="v-pills-goal" role="tabpanel" aria-labelledby="v-pills-goal-tab">
		                <div>
			                <h2 class="mb-4">Help Our Customer</h2>
			              	<p>To provide a seamless and enjoyable travel experience, helping customers discover, plan, and explore Surabaya’s best destinations with ease and confidence.</p>
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
          	<span class="subheading">FAQS</span>
            <h2 class="mb-4"><strong>Frequently</strong> Ask Question</h2>
          </div>
        </div>  
    		<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div id="accordion">
    					<div class="row">
    						<div class="col-md-6">
    							<div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menuone" aria-expanded="true" aria-controls="menuone">What destinations can I explore with Go Explore? <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menuone" class="collapse show">
						          <div class="card-body">
												<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
						          </div>
						        </div>
						      </div>

						      <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menutwo" aria-expanded="false" aria-controls="menutwo">Italic Mountains, she had a last <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menutwo" class="collapse">
						          <div class="card-body">
												<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
						          </div>
						        </div>
						      </div>

						      <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menu3" aria-expanded="false" aria-controls="menu3"> Bookmarksgrove, the headline? <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menu3" class="collapse">
						          <div class="card-body">
												<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
						          </div>
						        </div>
						      </div>
    						</div>

    						<div class="col-md-6">
    							<div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menu4" aria-expanded="false" aria-controls="menu4">Alphabet Village and the subline of her own? <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menu4" class="collapse">
						          <div class="card-body">
												<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
						          </div>
						        </div>
						      </div>

						      <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menu5" aria-expanded="false" aria-controls="menu5">Then she continued her way? <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menu5" class="collapse">
						          <div class="card-body">
												<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
						          </div>
						        </div>
						      </div>

						      <div class="card">
						        <div class="card-header">
										  <a class="card-link" data-toggle="collapse"  href="#menu6" aria-expanded="false" aria-controls="menu6">Skyline of her hometown Bookmarksgrove? <span class="collapsed"><i class="icon-plus-circle"></i></span><span class="expanded"><i class="icon-minus-circle"></i></span></a>
						        </div>
						        <div id="menu6" class="collapse">
						          <div class="card-body">
												<p>When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.</p>
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

    <footer class="ftco-footer ftco-bg-pink ftco-section">
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
    
    <!-- Custom CSS -->
    <style>
      .ftco-footer {
        background-color: #ff69b4;  /* Pink background */
        color: #fff;  /* White text */
        padding-top: 4rem;
        padding-bottom: 4rem;
      }
      .ftco-footer .ftco-heading-2 {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: #fff;  /* White for headings */
      }
      .ftco-footer .list-unstyled a {
        color: #fff; /* White links */
        text-decoration: none;
        font-size: 1rem;
      }
      .ftco-footer .list-unstyled a:hover {
        color: #ff1493;  /* Darker pink on hover */
      }
      .ftco-footer .text-white {
        color: #fff !important; /* Ensuring all text remains white */
      }
      .ftco-footer-social a {
        font-size: 1.5rem;
        margin-right: 15px;
        color: #fff;  /* White color for social icons */
      }
      .ftco-footer-social a:hover {
        color: #ff1493;  /* Darker pink on hover */
      }
      .ftco-footer .block-23 ul {
        list-style: none;
        padding: 0;
      }
      .ftco-footer .block-23 ul li {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
      }
      .ftco-footer .block-23 ul li .icon {
        font-size: 1.5rem;
        margin-right: 10px;
      }
    </style>
    


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
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="landingpage/js/google-map.js"></script>
  <script src="landingpage/js/main.js"></script>


    
  </body>
</html>