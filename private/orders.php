<?php
    session_start();

    // echo "<h2 style=margin-top:3%> Hai acquistato: </h2>";

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //error reporting for mysql server
    $mysqli = mysqli_connect('localhost', 'root', '1234', 'dbUtenti');

    $result = $mysqli->prepare("SELECT product, SUM(trips) FROM orders WHERE user=? GROUP BY product");
    $result->bind_param('i', $_SESSION['id']); 
    $result->execute();
    $result->store_result();
    $result->bind_result($product, $trips); 

    $margin=3;
    while ($result->fetch()) {
        echo "<p style=margin-top:".$margin."%>Hai acquistato il prodotto ".$product." ".$trips." volte.</p>";
    }

    $result->close();
?> 