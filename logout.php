<?php
session_start();
include("connection.php");

session_unset();
session_destroy();

echo "<script>
    alert('Logout Successfully!');
    window.location.href = 'signin.php';
</script>";
exit();
?>