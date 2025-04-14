<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel='stylesheet' href='{{ asset('/form/index.css') }}'>
</head>

<body>
    <body>
        <section>
            <div class="form-box">
                <div class="form-value">
                    <form>
                        <h2>Login</h2>
                        <div class="inputbox"> <ion-icon name="mail-outline"></ion-icon> <input  id="email" type="email" required>
                            <label>Email</label>
                        </div>
                        <div class="inputbox"> <ion-icon name="lock-closed-outline"></ion-icon> <input id="password" type="password"
                                required> <label>Password</label> </div>
                        <div class="forget"> <label><input type="checkbox">Remember Me</label> <a href="#">Forgot
                                Password</a> </div> <button id="login">Log In</button>
                        <div class="register">
                            <p>Don't have an account? <a href="/register">Sign Up</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section> 
    </body>
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
                    email: email,
                    password: password,
                },
                success: function(response) {
                    Swal.fire({
                        icon: "success",
                        title: "Login Berhasil!",
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function() {
                        window.location.href = response.redirect;
                    });
                },
                error: function(xhr) {
                    let errorMessage = "Harap isi form dengan benar!";
                    if (xhr.status === 401) {
                        errorMessage = "Email atau password salah!";
                    }

                    Swal.fire({
                        icon: "error",
                        title: "Login Gagal!",
                        text: errorMessage
                    });
                }
            });
        });
    });
	</script>
</html>