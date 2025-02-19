<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];

        // Delete the product from the database
        $query = "DELETE FROM products WHERE id = '$product_id'";
        $result = $conn->query($query);

        if ($result) {
            echo "<script>alert('Product deleted successfully!'); window.location.href = 'admin-dashboard.php';</script>";
        } else {
            echo "<script>alert('Error deleting product: " . $conn->error . "'); window.location.href = 'admin-dashboard.php';</script>";
        }
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href = 'admin-dashboard.php';</script>";
}
?>