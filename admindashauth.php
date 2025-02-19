<?php
include "connection.php"; // Include your database connection file
// session_start();

// Fetch all users from signup_users
$query_users = "SELECT id, username, email, 'user' AS role, created_at FROM signup_users";

// Fetch all admins from admin table
$query_admins = "SELECT id, username, email, 'admin' AS role, created_at FROM admin";

// Merge both queries using UNION
$query = "($query_users) UNION ($query_admins) ORDER BY created_at DESC";
$result = $conn->query($query);

// Fetch all products
$query_products = "SELECT * FROM products ORDER BY created_at DESC";
$result_products = $conn->query($query_products);

// Handle Product Upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = htmlspecialchars(trim($_POST['productname']));
    $productPrice = floatval($_POST['productprice']);
    $productDescription = htmlspecialchars(trim($_POST['productdescription']));

    // Handle file upload
    if (isset($_FILES['productimage']) && $_FILES['productimage']['error'] === 0) {
        $targetDir = "uploads/"; // Folder to store images (Ensure it exists & is writable)
        $fileName = basename($_FILES["productimage"]["name"]);
        $targetFilePath = $targetDir . time() . "_" . $fileName; // Rename to prevent overwriting
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        // Allowed file types
        $allowedTypes = ["jpg", "jpeg", "png"];
        if (!in_array($imageFileType, $allowedTypes)) {
            die("Only JPG, JPEG & PNG files are allowed.");
        }

        // Move the uploaded file to the folder
        if (move_uploaded_file($_FILES["productimage"]["tmp_name"], $targetFilePath)) {
            // Insert into database
            $query = "INSERT INTO products (name, description, price, image_url) VALUES ('$productName', '$productDescription', '$productPrice', '$targetFilePath')";

            if ($conn->query($query) === TRUE) {
                $_SESSION['message'] = "<div class='alert alert-success mt-3'>Product uploaded successfully!</div>";
            } else {
                $_SESSION['message'] = "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
            }
        } else {
            $_SESSION['message'] = "<div class='alert alert-danger mt-3'>Error uploading file.</div>";
        }
    } else {
        $_SESSION['message'] = "<div class='alert alert-warning mt-3'>Please select an image.</div>";
    }
}

$conn->close();
?>
