<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v1 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		<link rel="stylesheet" href="css/formcss/style.css">
	</head>
	<body>
		<div class="wrapper" style="background-color: purple;">
			<div style="border-radius: 20px;" class="inner">
				<div class="image-holder">
					<img  style="border-radius: 15px;" src="https://i.pinimg.com/736x/0e/90/a0/0e90a017bbe27d090255c77d5792abeb.jpg" alt="">
				</div>
				<form style="margin-top: 100px;">
					<h3>Login Form</h3>
					<div class="form-wrapper">
						<input type="text" id="email" placeholder="Email Address" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" id="password" placeholder="Password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button style="border-radius: 20px;" id="login">Login
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
                    <div class="form-wrapper">
						<p style="margin-left:30%; margin-top:10%;">Sign With Google</p>
					</div>
				</form>
			</div>
		</div>	
	</body>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function(){
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$('#login').click(function(e){
				e.preventDefault();
				var email = $('#email').val();
				var password = $('#password').val();	
					$.ajax({
						type: 'POST',
						url: '/login', 
						data: {
							email : email,
							password : password,
						},
						success: function(response) {
							Swal.fire({
								icon: "success",
								title: "Login Berhasil !",
								showConfirmButton: false,
								timer: 1500
							}).then(function() {
                				window.location.href = response.redirect;
            				});
						},
						error: function() {
							Swal.fire({
								icon: "error",
								title: "Oops...",
								text: "Harap isi form dengan benar !"
							});
						}
					});
				})
			});	
	</script>
</html>