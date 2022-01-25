<?php
    session_start();
    unset($_SESSION['ID']);
    session_destroy();
    mysqli_close($db);
    echo "<h3>Logout eseguito correttamente</h3>";
    header("Location: homepage.php");
?>