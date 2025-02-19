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
    <title><?php echo $product['name']; ?> - GamerX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php include("navbar.php"); ?>
    <div class="container py-5 mt-4">
        <div class="row mt-4">
            <div class="col-md-6">
                <img src="<?php echo $product['image_url']; ?>" class="img-fluid" alt="<?php echo $product['name']; ?>">
            </div>
            <div class="col-md-6">
                <h2 class="text-success"> <?php echo $product['name']; ?> </h2>
                <p class="text-white"> <?php echo $product['description']; ?> </p>
                <h4 class="text-danger"> <?php echo number_format($product['price'], 2); ?> Rs </h4>

                <!-- Order Form -->
                <form action="place_order.php" method="POST" class="mt-3">
                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                    <input type="hidden" name="price" value="<?php echo $product['price']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="quantity" class="form-control" min="1" value="1" required>
                    </div>
                    <button type="submit" class="btn btn-success">Buy Now</button>
                </form>

                <button class="btn btn-secondary mt-3" onclick="history.back()">Go Back</button>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <h5 class="text-success">GamerX</h5>
                        <p>Sophisticated simplicity for the independent mind.</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="index.php" class="text-decoration-none text-light">Home</a></li>
                            <li><a href="aboutus.php" class="text-decoration-none text-light">About Us</a></li>
                            <li><a href="shop.php" class="text-decoration-none text-light">Shop</a></li>
                            <li><a href="contactus.php" class="text-decoration-none text-light">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>Best Products</h5>
                        <ul class="list-unstyled">
                            <li><a href="product.php?id=2" class="text-decoration-none text-light">GAMING MOUSE</a></li>
                            <li><a href="product.php?id=6" class="text-decoration-none text-light">GAMING FELLER</a>
                            </li>
                            <li><a href="product.php?id=9" class="text-decoration-none text-light">GRAPHIC CARD RTX
                                    4090</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="bg-light w-100 m-0 ">
            <div class="text-center pt-5 pb-0 m-0">
                <p class="">&copy; 2025 GamerXStore. All right reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>