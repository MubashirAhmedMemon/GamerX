<?php
include("connection.php");
$query = "SELECT * FROM products ORDER BY created_at DESC";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gaming Product Page</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar -->
    <?php
    include_once("navbar.php");
    ?>
    <section id="shop" class="container py-5 mt-4">
        <h2 class="text-success text-center">Gaming Products</h2>
        <div class="row mt-4">
            <!-- <div class="col-md-4">
                <div class="card bg-dark text-white border-success">
                    <img src="images/gmaing keyboard.png" class="card-img-top filler" alt="Gaming Keyboard">
                    <div class="card-body text-center">
                        <h5 class="card-title">Gaming Keyboard</h5>
                        <p class="card-text">High-performance mechanical keyboard with RGB lighting.</p>
                        <a href="#" class="btn btn-success">Buy Now</a>
                    </div>
                </div> -->
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='col-md-4'>";
                    echo "<div class='card mb-4 '>";
                    echo "<img src='" . $row['image_url'] . "' class='card-img-top filler' alt='Product Image'>";
                    echo "<div class='card-body'>";
                    echo "<h5 class='card-title'>" . $row['name'] . "</h5>";
                    // echo "<p class='card-text'>" . $row['description'] . "</p>";
                    echo "<p class='card-text'><strong>" . number_format($row['price'], 2) . "Rs</strong></p>";
                    echo "<a href='product.php?id=" . $row['id'] . "' class='btn btn-success center'>View Details</a>";
                    echo "</div></div></div>";
                }
            } else {
                echo "<p class='text-center'>No products available.</p>";
            }
            ?>
        </div>
        <!-- <div class="col-md-4">
            <div class="card bg-dark text-white border-success">
                <img src="images/wireless mouse.png" class="card-img-top filler" alt="Gaming Mouse">
                <div class="card-body text-center">
                    <h5 class="card-title">Gaming Mouse</h5>
                    <p class="card-text">Precision gaming mouse with customizable buttons.</p>
                    <a href="#" class="btn btn-success">Buy Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-dark text-white border-success">
                <img src="images/gmaing headset.png" class="card-img-top filler" alt="Gaming Headset">
                <div class="card-body text-center">
                    <h5 class="card-title">Gaming Headset</h5>
                    <p class="card-text">Immersive sound quality with noise cancellation.</p>
                    <a href="#" class="btn btn-success">Buy Now</a>
                </div>
            </div>
        </div> -->
        </div>
    </section>

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