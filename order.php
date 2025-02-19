<?php
include("connection.php");

// Get product ID from URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $query = "SELECT * FROM products WHERE id = $product_id";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    } else {
        echo "<p class='text-center text-danger'>Product not found.</p>";
        exit();
    }
} else {
    echo "<p class='text-center text-danger'>Invalid product ID.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Place Order - <?php echo $product['name']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container py-5 mt-4">
        <h2 class="text-success">Place Your Order</h2>
        <div class="card p-4">
            <h4 class="text-danger"><?php echo $product['name']; ?></h4>
            <p>Price: <?php echo number_format($product['price'], 2); ?> Rs</p>

            <form action="place_order.php" method="post">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <input type="hidden" name="price" value="<?php echo $product['price']; ?>">

                <div class="mb-3">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" required>
                </div>
                <div class="mb-3">
                    <label for="lastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" name="address" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" name="quantity" min="1" required>
                </div>

                <button type="submit" class="btn btn-primary">Place Order</button>
                <a href="oneproduct.php?id=<?php echo $product['id']; ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>

</body>

</html>