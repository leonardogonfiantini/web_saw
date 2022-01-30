<?php

    require("../db/database.php");

    session_start();
    $result = $mysqli->prepare("INSERT INTO orders (userID, product, trips) VALUES (?, ?, ?)");
    $result->bind_param("isi", $_SESSION['id'], $_POST['p'], $_POST['t']);
    $result->execute();

    $result->close();
    $mysqli->close();
?>