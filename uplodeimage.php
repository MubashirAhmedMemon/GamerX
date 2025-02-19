<?php
session_start();
include "connection.php";

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Handle file upload
if (isset($_POST['upload'])) {
    if (!isset($_SESSION['EmailAdress']) || empty($_SESSION['EmailAdress'])) {
        die("<h3>&nbsp; User is not logged in. Please log in first.</h3>");
    }

    $user_id = intval($_SESSION['user_id']);
    $original_filename = basename($_FILES["uploadfile"]["name"]);
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $file_extension = strtolower(pathinfo($original_filename, PATHINFO_EXTENSION));

    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($file_extension, $allowed_extensions)) {
        die("<h3>&nbsp; Invalid file type. Please upload an image file.</h3>");
    }

    // Generate a unique filename
    $filename = $user_id . "_" . time() . "." . $file_extension;
    $folder = './uploads/' . $filename;

    // Ensure upload directory exists
    if (!is_dir('./uploads')) {
        mkdir('./uploads', 0777, true);
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("UPDATE users SET profile_picture = ? WHERE id = ?");
    $stmt->bind_param("si", $filename, $user_id);

    if ($stmt->execute() && move_uploaded_file($tempname, $folder)) {
        echo "<h3>&nbsp; Profile picture uploaded and saved successfully!</h3>";
    } else {
        echo "<h3>&nbsp; Error: " . mysqli_error($conn) . "</h3>";
    }

    $stmt->close();
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Image Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" required />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>

    <div id="display-image">
        <?php
        include "connection.php";
        $query = "SELECT profile_picture FROM users WHERE id = " . intval($_SESSION['user_id']);
        $result = mysqli_query($conn, $query);
        if ($data = mysqli_fetch_assoc($result)) {
            if (!empty($data['profile_picture'])) {
                echo '<img src="./uploads/' . htmlspecialchars($data['profile_picture']) . '" alt="Profile Image" style="width: 200px; height: auto; margin: 10px;">';
            } else {
                echo "<h3>No profile picture uploaded yet.</h3>";
            }
        }
        mysqli_close($conn);
        ?>
    </div>
</body>

</html>