<?php
    session_start();
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //error reporting for mysql server
    $mysqli = mysqli_connect('localhost', 'root', '1234', 'dbUtenti');

    $table = "orders";

    if ($result = $mysqli->query("SHOW TABLES LIKE '".$table."'")) {
        if($result->num_rows == 0) {
            $mysqli->query("CREATE TABLE orders (
                            id int(11) AUTO_INCREMENT,
                            userID int(11) NOT NULL,
                            product varchar(255) NOT NULL,
                            trips varchar(255) NOT NULL,
                            PRIMARY KEY  (ID) 
                            )");
        }
    }

    $result = $mysqli->prepare("INSERT INTO orders (user, product, trips) VALUES (?, ?, ?)");
    $result->bind_param("isi", $_SESSION['id'], $_POST['p'], $_POST['t']);
    $result->execute();

    $result->close();
    $mysqli->close();
?>