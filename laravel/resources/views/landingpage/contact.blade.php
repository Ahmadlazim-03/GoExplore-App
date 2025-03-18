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
        <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="/destination" class="nav-link">Destination</a></li>
		  <li class="nav-item"><a href="/about" class="nav-link">About</a></li>
		  <li class="nav-item cta"><a href="/contact" class="nav-link">Contact</a></li>
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
    <!-- END nav -->
    
    <div class="hero-wrap js-fullheight" style="background-image: url('landingpage/images/bg_4.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-9 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="index.html">Home</a></span> <span>Contact</span></p>
            <h1 class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">HUBUNGI KAMI</h1>
          </div>
        </div>
      </div>
    </div>

		<section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Informasi Kontak</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Address:</span> Universitas Airlangga</p>
          </div>
          <div class="col-md-3">
            <p><span>Phone:</span> <a href="tel://1234567920">+62123456789</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span> <a href="mailto:info@yoursite.com">goexplore@gmail.com</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Website</span> <a href="#">goexplore.com</a></p>
          </div>
        </div>
        <div class="row block-9">
          <div class="col-md-6 pr-md-5">
          
              <div class="form-group">
                  <input id="name" type="text" class="form-control" name="name" placeholder="Your Name" required>
              </div>
              <div class="form-group">
                  <input id="email" type="email" class="form-control" name="email" placeholder="Your Email" required>
              </div>
              <div class="form-group">
                  <input id="subject" type="text" class="form-control" name="subject" placeholder="Subject" required>
              </div>
              <div class="form-group">
                  <textarea name="message" id="pesan" cols="30" rows="7" class="form-control" placeholder="pesan" required></textarea>
              </div>
              <div class="form-group">
                  <input id="submit-button" type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
              </div>
        

          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.js"></script>

          <script>
              $(document).ready(function () {
                  let csrfToken = $('meta[name="csrf-token"]').attr('content');    
                  $('#submit-button').on('click', function () {


                    var name = $('#name').val();
                    var email = $('#email').val();
                    var subject = $('#subject').val();
                    var pesan = $('#pesan').val();

                    if (name == "" || email == "" || subject == "" || pesan == "") {
                        alert('Semua form harus diisi!');
                        return false;
                    }
                    
                    $.ajax({
                    url: "/send-email",
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    contentType: 'application/json',
                    processData: false,
                    data: JSON.stringify({
                        name: name,
                        email: email,
                        subject: subject,
                        pesan: pesan,
                    }),
                    success: function (response) {
                      Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Email berhasil terkirim !",
                        showConfirmButton: false,
                        timer: 1500
                      });
                    },
                    error: function (xhr, status, error) {
                        alert('gagal !');
                    }
                });
                  });
              });
          </script>

          
          </div>

          <div class="col-md-6">
              <iframe 
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.725174355423!2d112.75613117460442!3d-7.272081871457202!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbd38ea51a2f%3A0x2640d21feb8c9fd8!2sUniversitas%20Airlangga%20-%20Kampus%20Dharmawangsa%20(B)!5e0!3m2!1sid!2sid!4v1734475406656!5m2!1sid!2sid"
                  width="100%" 
                  height="400" 
                  style="border:0;" 
                  allowfullscreen="" 
                  loading="lazy" 
                  referrerpolicy="no-referrer-when-downgrade">
              </iframe>
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
    


  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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