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
			<div class="inner" style="border-radius: 20px;">
				<div class="image-holder">
					<img style="border-radius: 15px;" src="https://i.pinimg.com/736x/0e/90/a0/0e90a017bbe27d090255c77d5792abeb.jpg" alt="">
				</div>
				<form style="margin-top: 30px;">
					<h3>Registration Form</h3>
					<div class="form-wrapper">
						<input type="text" placeholder="Username" id="name" class="form-control">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						<input type="text" placeholder="Email Address" id="email" class="form-control">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						<select name="" id="gender" class="form-control">
							<option value="" disabled selected>Gender</option>
							<option value="male">Male</option>
							<option value="female">Female</option>
							<option value="other">Other</option>
						</select>
						<i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password" id="password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Confirm Password" id="repeat_password" class="form-control">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<button style="border-radius: 20px;" id="register">Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
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
			$('#register').click(function(e){
				e.preventDefault();
				var name = $('#name').val();
				var email = $('#email').val();
				var password = $('#password').val();
				var repeat_password = $('#repeat_password').val();
				var gender = $('#gender').val();

				if ( password == repeat_password ) {
					$.ajax({
						type: 'POST',
						url: '/register', 
						data: {
							name : name,
							email : email,
							password : password,
							gender : gender
						},
						success: function(response) {
							Swal.fire({
								icon: "success",
								title: "Registrasi Berhasil !",
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
				} else {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: "Masukkan repeat password dengan benar !",
					});
				}
			})
		});	
	</script>
</html>