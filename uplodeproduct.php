<?php
include "connection.php";
session_start();
if (!isset($_SESSION['usernameadmin'])) {
    // header("Location:admin.php");
    echo "NO users";
    exit();
}
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
            $query = "INSERT INTO products (name, description, price,image_url ) VALUES ('$productName', '$productDescription', '$productPrice', '$targetFilePath')";

            if ($conn->query($query) === TRUE) {
                $message = "<div class='alert alert-success mt-3'>Product uploaded successfully!</div>";
            } else {
                $message = "<div class='alert alert-danger mt-3'>Error: " . $conn->error . "</div>";
            }
        } else {
            $message = "<div class='alert alert-danger mt-3'>Error uploading file.</div>";
        }
    } else {
        $message = "<div class='alert alert-warning mt-3'>Please select an image.</div>";
    }
} else {
    $message = "<div class='alert alert-warning mt-3'>All fields are required!</div>";
}
$query = "SELECT * FROM products ORDER BY created_at DESC";
$result = $conn->query($query);
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <!-- Bootstrap 5 CDN -->
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
                <form method="post" action="#" enctype="multipart/form-data" id="productForm">
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
                <p><?php echo $message; ?></p>
            </div>
        </div>

        <div id="orderList" class="section">
            <h2>ALL PRODUCTS</h2>
            <div class="card p-4">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <!-- <th>PID</th> -->
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td><img src='" . $row['image_url'] . "' alt='Product Image' width='50'></td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>$" . $row['price'] . "</td>";
                                // echo "<td>" . $row['description'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No products found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="userList" class="section">
            <h2>Users</h2>
            <div class="card p-4">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#001</td>
                            <td>Alice Johnson</td>
                            <td>alice@example.com</td>
                            <td>Admin</td>
                        </tr>
                        <tr>
                            <td>#002</td>
                            <td>Bob Brown</td>
                            <td>bob@example.com</td>
                            <td>User</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="settings" class="section">
            <h2>Settings</h2>
            <div class="card p-4">
                <p>Manage your admin settings here.</p>
                <button class="btn btn-warning mb-3">Change Password</button>
                <button class="btn btn-danger">Logout</button>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("productForm").addEventListener("submit", function (event) {
            event.preventDefault(); // Stop default form submission

            let formData = new FormData(this);

            fetch("uplodeproduct.php", {
                method: "POST",
                body: formData
            })
                .then(response => response.text()) // Get the response from PHP
                .then(data => {
                    document.getElementById("message").innerHTML = `<div class='alert alert-success mt-3'>${data}</div>`;
                    document.getElementById("productForm").reset(); // Clear form after successful upload
                    history.replaceState(null, null, window.location.href); // Prevent form resubmission
                })
                .catch(error => console.error("Error:", error));
        });
    </script>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>