<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //error reporting for mysql server
    $mysqli = mysqli_connect('localhost', 'root', '1234', 'dbUtenti');

    $table = "userdata";
    $result = $mysqli->query("SELECT * FROM $table");

    $password = mysqli_real_escape_string($mysqli, $_POST['pass']);
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);

    while ($row = mysqli_fetch_array($result)) {
        if($email == $row['email'] && password_verify($password, $row['passwordd'])) {
            session_start();
            $_SESSION['authorized'] = "yes";
            $_SESSION['id'] = $row['id'];

            header("Location: homepage.php");
        }
    } 
?>