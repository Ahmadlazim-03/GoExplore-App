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
        <section>
            <div class="form-box">
                <div class="form-value">
                    <form>
                        <h2 style="margin-top:20px;">Registrasi</h2>
                        <div class="inputbox"> <ion-icon name="person-outline"></ion-icon> <input id="name" type="text" required>
                            <label>Username</label>
                        </div>
                        <div class="inputbox"> <ion-icon name="mail-outline"></ion-icon> <input id="email" type="email" required>
                            <label>Email</label>
                        </div>
                        <div class="inputbox"> <ion-icon name="lock-closed-outline"></ion-icon> <input  id="password" type="password"
                                required> <label>Password</label> </div>
                        <div class="forget"> <label><input type="checkbox">Remember Me</label> <a href="#">Forgot
                                Password</a> </div> <button type="submit" id="register">Register</button>
                        <div class="register">
                            <p>Don't have an account? <a href="/login">Sign In</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section> 
    </body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      $(document).ready(function(){
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $('#register').click(function(e) {
            e.preventDefault();
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();

            if (name == "" || email == "" || password == "") {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Form harus di isi !"
                });
                return false;
            }

            if (password.length < 5) { 
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Masukkan password minimal 5 karakter !"
                });
                return false;
            }

            $.ajax({
                type: 'POST',
                url: '/register',
                data: {
                name: name,
                email: email,
                password: password,
                },
                success: function(response) {
                Swal.fire({
                    icon: "success",
                    title: "Registrasi Berhasil!",
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
                    text: "Email sudah digunakan !"
                });
                }
            });
            });
        });	
    </script>
</html>