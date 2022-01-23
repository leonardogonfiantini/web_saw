<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //error reporting for mysql server
    $mysqli = mysqli_connect('localhost', 'root', '1234', 'dbUtenti');

    $table = "userdata";

    if ($result = $mysqli->query("SHOW TABLES LIKE '".$table."'")) {
        if($result->num_rows == 0) {
            $mysqli->query("CREATE TABLE userdata (
                            id int(11) AUTO_INCREMENT,
                            firstname varchar(255) NOT NULL,
                            lastname varchar(255) NOT NULL,
                            email varchar(255) NOT NULL,
                            passwordd varchar(255) NOT NULL,
                            PRIMARY KEY  (ID) 
                            )");
        }
    }

    $result = $mysqli->prepare("SELECT * FROM userdata WHERE email LIKE ?");
    $result->bind_param("s", $_GET['email']);
    $result->execute();
    $result->store_result();
    
    if ($result->num_rows == 0) echo "SI";
    else echo "NO";

    $result->close();
    $mysqli->close();


?>

