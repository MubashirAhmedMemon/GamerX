<?php
include "connection.php";
// session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = intval($_POST['order_id']);
    $status = $_POST['status'];

    $update_query = "UPDATE orders SET status = '$status' WHERE id = $order_id";

    if ($conn->query($update_query) === TRUE) {
        $_SESSION['message'] = "<script>alert('Order updated successfully!');</script>";
    } else {
        $_SESSION['message'] = "<script>alert('Error updating order: " . $conn->error . "');</script>";
    }

    header("Location: admin-dashboard.php");
    exit();
}

header("Location: admin-dashboard.php");
exit();
?>