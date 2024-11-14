<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-update {
            width: 100%;
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h3 class="text-center mb-4">Edit Profile</h3>
        <form id="edit-profile-form">
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" id="username" class="form-control" value="John Doe" placeholder="Username">
            </div>
            <div class="form-group mb-3">
                <label for="email">Email Address</label>
                <input type="email" id="email" class="form-control" value="johndoe@example.com" placeholder="Email Address">
            </div>
            <div class="form-group mb-3">
                <label for="gender">Gender</label>
                <select id="gender" class="form-control">
                    <option value="male" selected>Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="password">New Password</label>
                <input type="password" id="password" class="form-control" placeholder="New Password">
            </div>
            <div class="form-group mb-3">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password">
            </div>
            <button type="submit" class="btn btn-update">Update Profile</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    $(document).ready(function() {
        $('#edit-profile-form').on('submit', function(e) {
            e.preventDefault();

            var username = $('#username').val();
            var email = $('#email').val();
            var password = $('#password').val();
            var confirmPassword = $('#confirm_password').val();
            var gender = $('#gender').val();

            if (password !== confirmPassword) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Passwords do not match!',
                });
            } else {
                // Simulate successful update
                Swal.fire({
                    icon: 'success',
                    title: 'Profile Updated!',
                    text: 'Your profile has been updated successfully.',
                }).then(() => {
                    // Redirect or update page as needed
                    window.location.href = "/profile";  // Adjust this URL as needed
                });
            }
        });
    });
</script>

</body>
</html>
