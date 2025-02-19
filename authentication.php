<?php
include("connection.php");
// session_start();
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize inputs
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = trim($_POST['password']); // Get user input password

    // Hash the password (assuming you are using md5)
    $hashedPassword = md5($password);

    // SQL query to fetch the correct user
    $query = "SELECT * FROM signup_user WHERE email = '$email' AND pass = '$hashedPassword'";
    $result = $conn->query($query);

    // Check if a user is found
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); // Fetch the correct user

        // 🟢 Ensure the user data is stored in the session
        $_SESSION["user_id"] = $user['id'];
        $_SESSION['EmailAdress'] = $user['email'];
        $_SESSION['Name'] = isset($user['name']) ? $user['name'] : 'Unknown';
        $_SESSION['Gender'] = isset($user['gender']) ? $user['gender'] : 'Unknown';
        $_SESSION['DOB'] = isset($user['dob']) ? $user['dob'] : 'Unknown';
        $_SESSION['ProfilePicture'] = isset($user['profile_picture']) ? $user['profile_picture'] : "No profile picture uploaded.";

        // Debugging: Print session data before redirecting
        // echo "<pre>"; print_r($_SESSION); echo "</pre>"; exit();

        // Redirect to profile page
        header("Location:uplodeimagefromprofile.php");
        exit();
    } else {
        // Invalid login
        echo "<script>alert('Invalid email or password. Please try again.'); window.location.href = 'signin.php';</script>";
    }

    // Close the connection
    $conn->close();
} else {
    echo "Invalid request.";
}
?>