<?php

include("connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="stylesheet" href="style.css">
    <style>
        .hero2 {
            background: url('hero2-image.jpg') no-repeat center center/cover;
            height: 50vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .contact-container {
            max-width: 600px;
            margin: 50px auto;
            background: #1a1a1a;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        .btn-submit {
            background-color: #32cd32;
            border: none;
        }
    </style>
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

    <!-- Hero Section -->
    <section class="hero-section container text-center text-lg-start d-flex flex-column flex-lg-row align-items-center">
        <div class="hero-content">
            <h5 class="text-success">Gaming Zone</h5>
            <h1>CONTACT US</h1>
            <p>
                LET US KNOW !
                <br>
                IF YOU HAVE ANY QUERY
            </p>
            <a href="#" class="btn btn-shop mt-3">LEARN MORE <i class="fas fa-shopping-cart"></i></a>
        </div>
        <div class="hero-image mt-4 mt-lg-0 ms-lg-5">
            <img src="images/ok.png" alt="Gaming Controller">
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
    <?php
    include("navbar.php");
    ?>

    <!-- Contact Form -->
    <div class="contact-container">
        <h2>Get in Touch</h2>
        <form action="contact_process.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-submit btn-success w-100">Send Message</button>
        </form>
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