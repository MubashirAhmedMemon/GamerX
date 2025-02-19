<?php
include("connection.php");
if (isset($_POST["logoutbutton"])) {
    session_start();
    session_unset();
    session_destroy();
    (header("location:admin.php"));
} else
    echo "<script>
alert('Logout UnSuccessfully!');
window.location.href = 'admin-dashboard.php';
</script>";

?>