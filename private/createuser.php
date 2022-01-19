<?php
    $cyphpasswd = password_hash($_POST['pass'], PASSWORD_DEFAULT);		

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

    $result->close();

    $firstname = mysqli_real_escape_string($mysqli, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($mysqli, $_POST['lastname']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);

    if ($exist = $mysqli->query("SELECT * FROM userdata WHERE email='".$email."'")) {
        if ($exist->num_rows > 0) {
            echo "user already exist";
        } else {
            $mysqli->query("INSERT INTO userdata (firstname, lastname, email, passwordd) 
            VALUES ('".$firstname."', '".$lastname."', '".$email."','".$cyphpasswd."')");

            if ($result = $mysqli->query("SHOW TABLES LIKE '".$table."'")) {
                if($result->num_rows == 0) {
                    echo "error during registration process";
                }
            }
        }
    }

?>