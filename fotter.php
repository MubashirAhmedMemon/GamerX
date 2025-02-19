<?php  
include("connection.php");      
// session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Fotter</title>
</head>

<body>


    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <!-- <h5 class="text-success">GamerX</h5> -->
                    <a class="navbar-brand" href="index.php">Ga<span>me</span>rX.</a>
                    <p>Sophisticated simplicity for the independent mind.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-decoration-none text-light">Home</a></li>
                        <li><a href="shop.php" class="text-decoration-none text-light">Shop</a></li>
                        <li><a href="contactus.php" class="text-decoration-none text-light">Contact Us</a></li>
                        <li><a href="aboutus.php" class="text-decoration-none text-light">About Us</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <?php if (isset($_SESSION['user_id']) && isset($_SESSION['profilepicwar']) && !empty($_SESSION['profilepicwar'])): ?>
                        <a href="./Uplodeimagefromprofile.php">
                            <img src="uploads/<?php echo htmlspecialchars($_SESSION['profilepicwar']); ?>" alt="Profile"
                                class="rounded-circle" width="40" height="40">
                        </a>
                    <?php else: ?>
                        <a href="signup.php" class="btn btn-success w-50">Signup</a>
                        <br>
                        <a href="signin.php" class="btn btn-success mt-2 w-50">Login</a>
                    <?php endif; ?>
                    <!-- <div class="col-md-3">
                    <h5>Genres</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-light">PUBG MOBILE</a></li>
                        <li><a href="#" class="text-decoration-none text-light">CODE 2</a></li>
                        <li><a href="#" class="text-decoration-none text-light">CS GO</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>Categories</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-light">Virtual Reality</a></li>
                        <li><a href="#" class="text-decoration-none text-light">Adventure</a></li>
                        <li><a href="#" class="text-decoration-none text-light">First-Person Shooter</a></li>
                        <li><a href="#" class="text-decoration-none text-light">Strategy</a></li>
                    </ul>
                </div> -->
                </div>
                <hr class="bg-light w-100 p-0 m-0">
                <div class="text-center">
                    <p>&copy; 2025 GamerXStore.All rights recived.</p>
                </div>
            </div>
    </footer>
</body>

</html>