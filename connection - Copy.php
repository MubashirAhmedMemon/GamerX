<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "compzone";
$conn = new mysqli($servername, $username, $password, $databasename);

// Check connection
//  if ($conn->connect_error) {
//    die("Connection failed: " . $conn->connect_error);
//  }
//  echo "Connected successfully"; 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon-16x16.png">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="manifest" href="/site.webmanifest">

</head>

<body>

</body>

</html>