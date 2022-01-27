<!DOCTYPE html>
<html lang="en">
<head>
  <title> <?php echo $user['firstname']; ?> </title>
  <link rel="stylesheet" type="text/css" href="../css/profile-style.css">
</head>
<body>
  <?php
    require('database.php');
    session_start();
    
    if(isset($_POST['submit_password'])){ // Determine if a variable is declared and is different than null
        $pass_o = $_POST['old'];
        $pass_n = $_POST['new'];
        $confirm = $_POST['confirm'];
        $table = "userdata";

        $result = $mysqli->prepare("SELECT passwordd FROM $table WHERE id = ?");
        $result->bind_param('i', $_SESSION['id']);
        $result->execute();
        $result->store_result();
        $result->bind_result($passwordrow); 

        
        if ($result->num_rows == 1) {
            $result->fetch();
            if (password_verify($pass_o, $passwordrow)) {
                $crypt_pass = password_hash($pass_n, PASSWORD_DEFAULT);
                if($pass_n == $confirm){
                    $result = $mysqli->prepare("UPDATE $table SET passwordd=? WHERE id = ?");
                    $result->bind_param('si', $crypt_pass, $_SESSION['id']);
                    $result->execute();
                    echo "<h3>Password cambiata correttamente!</h3>";
                }
                else
                    echo "<h3>Le password non coincidono...</h3>";
            }
            else
                echo "<h3>Password sbagliata...</h3>";
        }
        else
            echo "<h3>Something went wrong...</h3>";
    }
    
    header("Header: show_profile.php");
  ?>
</body>
</html>