<?php
echo"<title>CART</title>";
include("navbar.php");
// session_start(); // Ensure session starts
echo '
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <style>
        *,
        body {
            font-family: "Poppins", sans-serif;
            background-color: #000000;
            color: #FFFFFF;
        }
    </style>';
// Ensure the user is logged in
if (!isset($_SESSION['EmailAdress'])) {
  die("<br class='mt-5'><h1 class='mt-5'>User not logged in. </h1><br> <a href='signin.php' class='btn btn-success btn-large '>LOGIN</a>");

}

$email = $_SESSION['EmailAdress'];

// Get user details
$user_query = "SELECT * FROM signup_user WHERE email = '$email'";
$user_result = $conn->query($user_query);

if ($user_result->num_rows > 0) {
  $user = $user_result->fetch_assoc();
  $user_id = $user['id'];
  $first_name = $user['name'];
  $last_name = $user['lastname'];
} else {
  die("User not found.");
}


// Ensure all required POST data is present
if (!isset($_POST['product_id'], $_POST['quantity'], $_POST['price'], $_POST['address'])) {
  die("<h1>Missing required fields.</h1>
<br/>
<a href='index.php' class='btn btn-success'>BACK TO HOME</a>");
}

$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$address = htmlspecialchars($_POST['address']); // Prevent XSS

$total_price = $price * $quantity;
$status = 'pending';

// Insert order
$order_query = "INSERT INTO orders (user_id, product_id, address, quantity, total_price, status) 
                VALUES ('$user_id', '$product_id', '$address', '$quantity', '$total_price', '$status')";

if ($conn->query($order_query) === TRUE) {
  echo "Order placed successfully!";
} else {
  echo "Error: " . $conn->error;
}

// Fetch only this user's orders
$query_orders = "SELECT orders.id, orders.product_id, orders.quantity, orders.total_price, orders.status, orders.address, 
                        products.name AS product_name
                 FROM orders 
                 JOIN products ON orders.product_id = products.id 
                 WHERE orders.user_id = '$user_id'
                 ORDER BY orders.created_at DESC";

$result_orders = $conn->query($query_orders);

if (!$result_orders) {
  die("Query Error: " . $conn->error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
  <link rel="stylesheet" href="style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <title>CART</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <style>
    *,
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #000000;
      color: #FFFFFF;
    }
  </style>
  <title>Your Orders - GamerX</title>
</head>

<body>
  <h2 class="text-center text-success">Your Orders</h2>

  <div class="table-responsive">
    <table class="table table-dark table-striped table-hover text-center">
      <thead class="table-success">
        <tr>
          <th>Order ID</th>
          <th>Product</th>
          <th>Address</th>
          <th>Quantity</th>
          <th>Total Price</th>
          <th>Status</th>
        </tr>
      </thead>
      <!-- <tbody>
        <?php
        // if ($result_orders->num_rows > 0) {
        //   while ($row = $result_orders->fetch_assoc()) {
        //     echo "<tr>";
        //     echo "<td><strong>" . $row['id'] . "</strong></td>";
        //     echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
        //     echo "<td>" . htmlspecialchars($row['address']) . "</td>";
        //     echo "<td>" . $row['quantity'] . "</td>";
        //     echo "<td class='text-warning fw-bold'>" . number_format($row['total_price'], 2) . " Rs</td>";
        
        //     // Status badge colors
        //     $status_class = ($row['status'] == 'pending') ? 'bg-warning' :
        //       (($row['status'] == 'completed') ? 'bg-success' : 'bg-danger');
        
        //     echo "<td><span class='badge $status_class'>" . ucfirst($row['status']) . "</span></td>";
        //     echo "</tr>";
        //   }
        // } else {
        //   echo "<tr><td colspan='6' class='text-danger fw-bold'>No orders found.</td></tr>";
        // }
        ?>
      </tbody> -->
      <tbody>
        <?php
        if ($result_orders->num_rows > 0) {
          while ($row = $result_orders->fetch_assoc()) {
            echo "<tr>";
            echo "<td><strong>" . $row['id'] . "</strong></td>";
            echo "<td>" . htmlspecialchars($row['product_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['address']) . "</td>";
            echo "<td>" . $row['quantity'] . "</td>";
            echo "<td class='text-warning fw-bold'>" . number_format($row['total_price'], 2) . " Rs</td>";

            // Status badge colors
            $status_class = ($row['status'] == 'pending') ? 'bg-warning' :
              (($row['status'] == 'completed') ? 'bg-success' : 'bg-danger');

            echo "<td><span class='badge $status_class'>" . ucfirst($row['status']) . "</span></td>";

            // Show cancel button only for pending orders
            if ($row['status'] == 'pending') {
              echo "<td>
                <form action='cancel_order.php' method='POST' style='display:inline;'>
                  <input type='hidden' name='order_id' value='" . $row['id'] . "'>
                  <button type='submit' class='btn btn-danger btn-sm'>Cancel</button>
                </form>
              </td>";
            } else {
              echo "<td><button class='btn btn-secondary btn-sm' disabled>Cannot Cancel</button></td>";
            }

            echo "</tr>";
          }
        } else {
          echo "<tr><td colspan='7' class='text-danger fw-bold'>No orders found.</td></tr>";
        }
        ?>
      </tbody>

    </table>
  </div>
  <a class="btn btn-secondary btn-lg" href="index.php">BACK TO HOME</a>
  <script>
    // if (window.history.replaceState) {
    //   window.history.replaceState(null, null, window.location.href);
    // }
  </script>
</body>

</html>