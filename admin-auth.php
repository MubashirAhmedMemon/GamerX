<?php
// include("connection.php");
// session_start();
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $adminusername = mysqli_real_escape_string($conn, trim($_POST['adminname']));
//     $adminpassword = trim($_POST['adminpass']);
//     $hashedPassword = md5($adminpassword);
//     $query = "SELECT * FROM `admin` WHERE username = '$adminusername' AND pass = '$hashedPassword'";
//     $result = $conn->query($query);

//     if (!$result) {
//         die("Query failed: " . $conn->error);  // This will show SQL errors
//     }
//     if ($result->num_rows > 0) {
//         $user = $result->fetch_assoc();
//         $_SESSION['usernameadmin'] = $user['username'];
//         $_SESSION['adminemail'] = $user['email'];
//         $_SESSION['createaccount'] = $user['create_at'];
//         header("Location:uplodeproduct.php");
//         exit();
//     } else {
//         echo "<script>alert('Invalid email or password. Please try again.'); window.location.href = 'signin.php';</script>";
//     }

//     $conn->close();
// } else {
//     echo "Invalid request.";
// }
include("connection.php");
// session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $adminusername = mysqli_real_escape_string($conn, trim($_POST['adminname']));
    $adminpassword = trim($_POST['adminpass']);
    $hashedPassword = md5($adminpassword);
    $query = "SELECT * FROM `admin` WHERE username = '$adminusername' AND password = '$hashedPassword'";
    $result = $conn->query($query);

    if (!$result) {
        die("Query failed: " . $conn->error);
    }

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['usernameadmin'] = $user['username'];
        $_SESSION['adminemail'] = $user['email'];
        $_SESSION['createaccount'] = $user['create_at'];
        header("Location:admin-dashboard.php");
        echo "Username: " . $adminusername . "<br>";
        echo "Password: " . $adminpassword . "<br>";
        exit();
    } else {
        echo "ERROR";
        // echo "<script>alert('Invalid username or password. Please try again.'); window.location.href = 'admin.php';</script>";
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>