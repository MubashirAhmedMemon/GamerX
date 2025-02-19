<?php
include("connection.php");
// echo "'<pre class='mt-5'>'";
// print_r($_SESSION);
// echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Navbar</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-black fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">GAMER X</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="aboutus.php">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="contactus.php">Contact Us</a></li>
                </ul>
                <div class="ms-3">
                    <?php if (isset($_SESSION['user_id']) && !empty($_SESSION['profilepicwar']) && $_SESSION['profilepicwar'] !== "No profile picture uploaded."): ?>
                        <a href="./Uplodeimagefromprofile.php">
                            <img src="uploads/<?php echo htmlspecialchars($_SESSION['profilepicwar']); ?>" alt="Profile"
                                class="rounded-circle" width="40" height="40">
                        </a>
                    <?php else: ?>
                        <a href="signup.php" class="btn btn-success">Signup</a>
                        <a href="signin.php" class="btn btn-primary ms-2">Login</a>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </nav>
</body>

</html>