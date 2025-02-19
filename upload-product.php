<?php
include "connection.php";
// session_start();

if (!isset($_SESSION['usernameadmin'])) {
    die("Unauthorized access");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = htmlspecialchars(trim($_POST['productname']));
    $productPrice = floatval($_POST['productprice']);
    $productDescription = ($_POST['productdescription']);

    if (isset($_FILES['productimage']) && $_FILES['productimage']['error'] === 0) {
        $targetDir = "uploads/";
        $fileName = basename($_FILES["productimage"]["name"]);
        $targetFilePath = $targetDir . time() . "_" . $fileName;
        $imageFileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

        $allowedTypes = ["jpg", "jpeg", "png"];
        if (!in_array($imageFileType, $allowedTypes)) {
            die("Only JPG, JPEG & PNG files are allowed.");
        }

        if (move_uploaded_file($_FILES["productimage"]["tmp_name"], $targetFilePath)) {
            $query = "INSERT INTO products (name, description, price, image_url) VALUES ('$productName', '$productDescription', '$productPrice', '$targetFilePath')";

            if ($conn->query($query) === TRUE) {
                echo "Product uploaded successfully!";
            } else {
                echo "Error: " . $conn->error;
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Please select an image.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>