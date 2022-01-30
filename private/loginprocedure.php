<?php
    
    session_start();

    $result = $mysqli->prepare("SELECT id, passwordd FROM userdata WHERE email LIKE ?");
    $result->bind_param('s', $_POST['email']);
    $result->execute();
    $result->store_result();
    $result->bind_result($idrow, $passwordrow); 

    if ($result->num_rows == 1) {
        $result->fetch(); 
        if (password_verify($_POST['pass'], $passwordrow)) {
            if ($idrow == 1) $_SESSION['admin'] = 1;
            $_SESSION['id'] = $idrow;
            $result->close();
            $mysqli->close();
            echo "login ok";
            header("Location: show_profile.php");
        }
    } 
    
    $result->close();
    $mysqli->close();

    echo "<h2 class=loginfailed> login fallito :'C</h2>";
?>