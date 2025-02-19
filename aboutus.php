<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us - GamerX</title>
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
                    <li class="nav-item"><a class="nav-link text-white" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="shop.php">Shop</a></li>
                    <li class="nav-item"><a class="nav-link text-white active" href="about.php">About</a></li>
                </ul>
            </div>
        </div>
    </nav> -->
    <?php
    include("navbar.php");
    ?>

    <!-- Hero Section -->
    <section class="hero-section container text-center text-lg-start d-flex flex-column flex-lg-row align-items-center">
        <div class="hero-content">
            <h5 class="text-success">About GamerX</h5>
            <h1>Passionate About Gaming Excellence</h1>
            <p>GamerX is dedicated to providing top-quality gaming products, enhancing experiences for casual and pro
                gamers alike.</p>
            <a href="shop.php" class="btn btn-shop mt-3">Explore Our Products <i class="fas fa-shopping-cart"></i></a>
        </div>
        <div class="hero-image mt-4 mt-lg-0 ms-lg-5">
            <img src="images/aboutus.png" class="w-50" style="margin-left:  250px;" alt="Gaming Experience">
        </div>
    </section>

    <!-- About Us Section -->
    <section class="container py-5 text-center">
        <h2 class="text-success">Who We Are</h2>
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