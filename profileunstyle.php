<?php
session_start();
include "connection.php";
if (!isset($_SESSION['EmailAdress'])) {
    header("Location: signin.php");
    exit();
}
$email = $_SESSION['EmailAdress'];

$query = "SELECT * FROM signup_user WHERE email = '$email'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

$id = $user["id"];
$name = $user['name'] ?? 'Unknown';
$gender = $user['gender'] ?? 'Unknown';
$dob = $user['dob'] ?? 'Unknown';
$profilePicture = $user['profile_picture'] ?? '';
if (isset($_POST['upload'])) {
    if (!isset($_FILES["uploadfile"]) || $_FILES["uploadfile"]["error"] != 0) {
        die("<h3>Error uploading file. Please try again.</h3>");
    }

    $original_filename = basename($_FILES["uploadfile"]["name"]);
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $file_extension = strtolower(pathinfo($original_filename, PATHINFO_EXTENSION));

    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($file_extension, $allowed_extensions)) {
        die("<h3>Invalid file type. Please upload an image file.</h3>");
    }

    $filename = time() . "_" . $id . "." . $file_extension;
    $folder = './uploads/' . $filename;

    if (!is_dir('./uploads')) {
        mkdir('./uploads', 0777, true);
    }

    // Debugging: Check values of $id and $filename
    echo "User ID: " . $id . "<br>";
    echo "Filename: " . $filename . "<br>";

    if (move_uploaded_file($tempname, $folder)) {
        echo "File uploaded successfully.<br>";

        // Debugging: Check query before execution
        $query = "UPDATE imageone SET `filename` = '$filename' WHERE `id` = '$id'";
        echo "Query: " . $query . "<br>";

        if (mysqli_query($conn, $query)) {
            $_SESSION['ProfilePicture'] = $filename;
            header("Location: Uplodeimagefromprofile.php");
            exit();
        } else {
            echo "<h3>Error updating profile picture: " . mysqli_error($conn) . "</h3>";
        }
    } else {
        echo "Error moving file to upload folder.";
    }
    exit();
}
$query = "SELECT * FROM user_profile_view WHERE id = '$id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

$filename = $user["filename"] ?? ''; // Use null coalescing to avoid errors

if (!empty($filename)) {
    echo '<img src="./uploads/' . htmlspecialchars($filename) . '" alt="Profile Image" style="width: 200px; height: auto; margin: 10px;">';
} else {
    echo '<p>No profile picture uploaded.</p>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>Welcome, <?php echo htmlspecialchars($name); ?></h2>
        <p>Email: <?php echo htmlspecialchars($email); ?></p>
        <p>Gender: <?php echo htmlspecialchars($gender); ?></p>
        <p>Date of Birth: <?php echo htmlspecialchars($dob); ?></p>
        <p>ID: <?php echo htmlspecialchars($id); ?></p>


        <div>
            <h3>Profile Picture:</h3>
            <?php if (!empty($profilePicture)): ?>
                <img src="./uploads/<?php echo htmlspecialchars($profilePicture); ?>" alt="Profile Image"
                    style="width: 200px; height: auto; margin: 10px;">
            <?php else: ?>
                <p>No profile picture uploaded yet.</p>
            <?php endif; ?>
        </div>

        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" required />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>

        <a href="logout.php" class="btn btn-danger" name="logout">Logout</a>
    </div>
</body>

</html>