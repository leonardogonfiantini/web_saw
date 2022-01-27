<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //error reporting for mysql server
    $mysqli = mysqli_connect('localhost', 'root', '1234', 'dbUtenti');

    $table = "userdata";
    $result = $mysqli->prepare("SELECT id, passwordd FROM $table WHERE email LIKE ?");
    $result->bind_param('s', $_POST['email']);
    $result->execute();
    $result->store_result();
    $result->bind_result($idrow, $passwordrow); 

    if ($result->num_rows == 1) {
        $result->fetch(); 
        if (password_verify($_POST['pass'], $passwordrow)) {
            session_start();
            $_SESSION['authorized'] = "yes";
            $_SESSION['id'] = $idrow;
            $mysqli->close();
            $result->close();
            echo "[login ok]";
            header("Location: show_profile.php");
        }
    } 
    
    
    $mysqli->close();
    $result->close();
    echo "[login no]";
    header("Location: login.php");
?>