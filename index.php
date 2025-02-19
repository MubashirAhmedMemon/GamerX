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
    <title>HOME</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar -->
    <!-- <nav class="navbar navbar-dark bg-black fixed-top navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Ga<span>me</span>rX.</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Shop</a></li>
                </ul>
            </div>
            <div>
                <a href="#" class="text-white me-3"><i class="fas fa-search"></i></a>
                <a href="#" class="text-white"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
    </nav> -->
    <?php
    include_once("navbar.php");
    ?>

    <!-- Hero Section -->
    <section class="hero-section container text-center text-lg-start d-flex flex-column flex-lg-row align-items-center">
        <div class="hero-content">
            <h5 class="text-success">Gaming Zone</h5>
            <h1>Immerse Yourself In The Gaming Experience</h1>
            <p>Lorem ipsum dolor sit amet consectetur. Purus porta non dictum maecenas. A ut feugiat egestas vel
                fermentum penatibus.</p>
            <a href="shop.php" class="btn btn-shop mt-3">SHOP NOW <i class="fas fa-shopping-cart"></i></a>
        </div>
        <div class="hero-image mt-4 mt-lg-0 ms-lg-5">
            <img src="images/download (1).png" alt="Gaming Controller">
        </div>
    </section>
    <!-- Navbar -->
    <!-- <nav class="navbar navbar-dark bg-black fixed-top navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="#">Ga<span>me</span>rX.</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">About</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Shop</a></li>
                </ul>
            </div>
            <div>
                <a href="#" class="text-white me-3"><i class="fas fa-search"></i></a>
                <a href="#" class="text-white"><i class="fas fa-shopping-cart"></i></a>
            </div>
        </div>
    </nav> -->

    <!-- Carousel Section -->
    <section>
        <div id="gamingCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#gamingCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#gamingCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#gamingCarousel" data-bs-slide-to="2"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/NEW_PRISM_BETTER.webp" class="d-block w-100 one" alt="Gaming Console">
                </div>
                <div class="carousel-item">
                    <img src="images/LAPTOP.webp" class="d-block w-100 one" alt="Gaming PC">
                </div>
                <div class="carousel-item">
                    <img src="images/headphones-design-3d-rendering-for-product-mockup-png.webp"
                        class="d-block w-100 one" alt="Gaming Setup">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#gamingCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#gamingCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>
    <!-- about us section -->
    <!-- About Us Section -->
    <section class="container py-5 text-center">
        <h2 class="text-success font-weight-bold">Who We Are</h2>
        <p class="mt-3">
            At <strong>GamerX</strong>, we bring you the best gaming gear and accessories to **elevate your gaming
            experience**.<br>
            Whether you're a **casual player** or a **competitive pro**, our collection is designed for **top-tier
            performance, durability, and style**.
        </p>

        <div class="row mt-4">
            <!-- Image Section -->
            <div class="col-md-6">
                <img src="images/PC-Gaming-Setup.png" class="img-fluid rounded" alt="Gaming Team">
            </div>

            <!-- Text Content -->
            <div class="col-md-6 d-flex align-items-center">
                <div class="text-start">
                    <h3 class="text-success">Elevate Your Game with GamerX</h3>
                    <p>
                        At GamerX, we’re more than just a gaming store—we’re a **community of passionate gamers** who
                        believe in
                        **performance, quality, and innovation**. We know that **every click, every move, and every
                        second counts**,
                        so we provide **gear that enhances your gameplay**.
                    </p>

                    <h4 class="text-success mt-3">Why Choose GamerX?</h4>
                    <ul class="list-unstyled fs-5">
                        <li>🎮 <strong>Elite Gaming Gear</strong> – Keyboards, mice, headsets & more</li>
                        <li>⚡ <strong>Designed for Gamers</strong> – Built for speed, comfort & accuracy</li>
                        <li>🛡️ <strong>Premium Quality</strong> – Durable, high-performance gaming tools</li>
                        <li>💬 <strong>Support You Can Trust</strong> – Fast service & customer-first approach</li>
                    </ul>

                    <p class="mt-3">
                        Gaming isn't just a pastime—**it’s a way of life**. Whether you're competing at the highest
                        level or just playing for fun,
                        **GamerX equips you with the best tools to dominate the game**.
                    </p>

                    <a href="shop.php" class="btn btn-success mt-3">Explore Our Store</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Cards Section -->
    <section id="shop" class="container py-5">
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
                    echo "<a href='shop.php' class='btn btn-success center'>View Details</a>";
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