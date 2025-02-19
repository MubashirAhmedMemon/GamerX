<?php
include "connection.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input
    $admin_username = htmlspecialchars(trim($_POST['admin-username']));
    // $last_name = htmlspecialchars(trim($_POST['last_name']));
    // $dob = htmlspecialchars(trim($_POST['dob']));
    $admin_email = htmlspecialchars(trim($_POST['admin-email']));
    $admin_pass = htmlspecialchars(trim($_POST['admin-pass']));

    // Check for empty fields
    if (empty($admin_username) || empty($admin_email) || empty($admin_pass)) {
        die("All fields are required.");
    }
    // Hash password
    $hashed_password = md5($admin_pass);

    // SQL query to insert user
    $query = "INSERT INTO `admin` (username, password, email) 
              VALUES ('$admin_username', '$hashed_password', '$admin_email')";
    // Execute query and check for errors
    if ($conn->query($query) === TRUE) {
        echo "User registered successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Signup</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <style>
        body {
            background-color: #121212;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            overflow-y: hidden;
        }

        .signup-container {
            width: 100%;
            max-width: 400px;
            padding: 40px;
            background-color: #1a1a1a;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
            margin: 50px auto;
            text-align: center;
        }

        .btn-signup {
            background-color: #32cd32;
            border: none;
        }
    </style>
</head>

<body>
    <div class="signup-container">
        <h2>Admin Signup</h2>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="admin-username" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="admin-email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="admin-pass" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-signup w-100">Signup</button>
        </form>
    </div>
    <script>
        function validatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            if (password !== confirmPassword) {
                alert("Passwords do not match!");
                return false;
            }
            return true;
        }
    </script>
</body>

</html>