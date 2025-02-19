<?php
include "connection.php";
// session_start();
if (!isset($_SESSION['usernameadmin'])) {
    echo "PLEASE LOGIN FIRST TO ACCESS DASHBOARD <br> <a class='btn btn-success' href='admin.php'>Login</a>";

    exit();
}

$query = "SELECT * FROM products ORDER BY created_at DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="style.css">
    <script>
        function showSection(sectionId) {
            document.querySelectorAll('.section').forEach(section => section.style.display = 'none');
            document.getElementById(sectionId).style.display = 'block';
        }
    </script>
</head>

<body>
    <div class="sidebar">
        <h3 class="text-center text-success">Admin Panel</h3>
        <a href="#" onclick="showSection('productUpload')">ADD Products</a>
        <a href="#" onclick="showSection('orderList')">ALL PRODUCTS</a>
        <a href="#" onclick="showSection('userList')">ORDERS</a>
        <a href="#" onclick="showSection('settings')">Settings</a>
    </div>

    <div class="content">
        <div id="productUpload" class="section">
            <h2>Upload Product</h2>
            <div class="card p-4">
                <form method="post" action="upload-product.php" enctype="multipart/form-data" id="productForm">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="productname" required>
                    </div>
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Product Price</label>
                        <input type="number" class="form-control" id="productPrice" name="productprice" required>
                    </div>
                    <div class="mb-3">
                        <label for="productImage" class="form-label">Product Image</label>
                        <input type="file" class="form-control" id="productImage" name="productimage" required>
                    </div>
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Product Description</label>
                        <textarea class="form-control" id="productDescription" rows="3" name="productdescription"
                            required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Upload Product</button>
                </form>
                <p id="message"></p>
            </div>
        </div>

        <div id="orderList" class="section">
            <h2>ALL PRODUCTS</h2>
            <div class="card p-4">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <!-- <tbody>
                        <?php
                        // if ($result->num_rows > 0) {
                        //     while ($row = $result->fetch_assoc()) {
                        //         echo "<tr>";
                        //         echo "<td><img src='" . $row['image_url'] . "' alt='Product Image' width='50'></td>";
                        //         echo "<td>" . $row['name'] . "</td>";
                        //         echo "<td>" . $row['price'] . "Rs</td>";
                        //         echo "</tr>";
                        //     }
                        // } else {
                        //     echo "<tr><td colspan='3' class='text-center'>No products found.</td></tr>";
                        // }
                        ?>
                    </tbody> -->
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td><img src='" . $row['image_url'] . "' alt='Product Image' width='50'></td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['price'] . " Rs</td>";
                                echo "<td>
                    <form method='post' action='delete-product.php' onsubmit='return confirm(\"Are you sure you want to delete this product?\")'>
                        <input type='hidden' name='product_id' value='" . $row['id'] . "'>
                        <button type='submit' class='btn btn-danger btn-sm'>Delete</button>
                    </form>
                </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' class='text-center'>No products found.</td></tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
        <!-- orders -->
        <div id="userList" class="section">
            <h2>All Orders</h2>
            <div class="card p-4">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Product ID</th>
                            <th>Customer</th>
                            <th>Address</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query_orders = "SELECT orders.id, orders.product_id, orders.quantity, orders.total_price, orders.status, orders.address, 
                       signup_user.name, signup_user.email 
                FROM orders 
                JOIN signup_user ON orders.user_id = signup_user.id 
                ORDER BY orders.created_at DESC";


                        $result_orders = $conn->query($query_orders);

                        // Debugging: Check for SQL errors
                        if (!$result_orders) {
                            die("Query Error: " . $conn->error);
                        }
                        $result_orders = $conn->query($query_orders);

                        if ($result_orders->num_rows > 0) {
                            while ($row = $result_orders->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id'] . "</td>";
                                echo "<td>" . $row['product_id'] . "</td>";
                                echo "<td>" . $row['name'] . " (" . $row['email'] . ")</td>";
                                echo "<td>N/A</td>"; // Remove address if it's not in the table
                                echo "<td>" . $row['address'] . "</td>";
                                echo "<td>" . $row['quantity'] . "</td>";
                                echo "<td>" . $row['total_price'] . " Rs</td>";
                                echo "<td><span class='badge bg-warning'>" . $row['status'] . "</span></td>";
                                echo "<td>
                    <form method='post' action='update-order.php'>
                        <input type='hidden' name='order_id' value='" . $row['id'] . "'>
                        <select name='status' class='form-select d-inline w-auto '>
                            <option value='Pending'>Pending</option>
                            <option value='Shipped'>Shipped</option>
                            <option value='Delivered'>Delivered</option>
                        </select>
                        <button type='submit' class='btn btn-success btn-sm m-1 w-50'>Update</button>
                    </form>
                  </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>No orders found.</td></tr>";
                        }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
        <!-- order end -->
        <div id="settings" class="section">
            <h2>Settings</h2>
            <div class="card p-4">
                <p>Manage your admin settings here.</p>
                <form action="admin-logout.php" method="post">
                    <!-- <button class="btn btn-warning mb-3">Change Password</button> -->
                    <button class="btn btn-danger" Name="logoutbutton">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("productForm").addEventListener("submit", function (event) {
            event.preventDefault();

            let formData = new FormData(this);

            fetch("upload-product.php", {
                method: "POST",
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    document.getElementById("message").innerHTML = `<div class='alert alert-success mt-3'>${data}</div>`;
                    document.getElementById("productForm").reset();
                    history.replaceState(null, null, window.location.href);
                })
                .catch(error => console.error("Error:", error));
        });

        // if (window.history.replaceState) {
        //     window.history.replaceState(null, null, window.location.href);
        // }
    </script>
</body>

</html>