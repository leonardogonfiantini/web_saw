<?php
    session_start();
    unset($_SESSION['profile']);
    session_destroy();
    // mysqli_close($c);
    header("Location: homepage.php");
?>