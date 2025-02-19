<?php
include("connection.php");

// Ensure user is logged in
if (!isset($_SESSION['EmailAdress'])) {
    die("User not logged in.");
}

// Check if order_id is provided
if (!isset($_POST['order_id'])) {
    die("Invalid request.");
}

$order_id = $_POST['order_id'];

// Check if the order belongs to the logged-in user and is pending
$email = $_SESSION['EmailAdress'];
$user_query = "SELECT id FROM signup_user WHERE email = '$email'";
$user_result = $conn->query($user_query);
$user = $user_result->fetch_assoc();
$user_id = $user['id'];

$check_order_query = "SELECT * FROM orders WHERE id = '$order_id' AND user_id = '$user_id' AND status = 'pending'";
$result = $conn->query($check_order_query);

if ($result->num_rows > 0) {
    // Update order status to 'canceled'
    $update_query = "UPDATE orders SET status = 'canceled' WHERE id = '$order_id'";
    if ($conn->query($update_query) === TRUE) {
        echo "<script>
            alert('Order canceled successfully.');
            window.location.href = 'place_order.php'; // Replace with the actual orders page
          </script>";
    } else {
        echo "Error updating order: " . $conn->error;
    }
} else {
    echo "<script>
          alert('Order cannot be canceled.');
          window.location.href = 'place_order.php';
        </script>";
}

$conn->close();
?>