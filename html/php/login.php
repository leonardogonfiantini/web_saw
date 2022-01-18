<!DOCTYPE>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Area di Login</title>
	<link rel="stylesheet" type="text/css" href="../css/loginreg-style.css">
  <link rel="icon" href="../favicon.ico" type="image/ico">
</head>
<body>

	<div>
		<div class="container">  
    
			<p class="title">Login</p>
      
			<form method="post">
				<div class="user-details">
					<div class="input-box">
						<span class="details">Email</span>
						<input type="text" id="email" name="email" placeholder="Inserisci Email" required>
					</div>
					<div class="input-box">
						<span class="details">Password</span>
						<input type="password" id="pass" name="pass" placeholder="Inserisci Password" required>
					</div>
				</div>
				<div class="button">
					<input type="submit" name="submit" value="Accedi">
				</div>
        <div>
					<span class="clickable-text">Non hai un account? <a href="registration.php">Registrati</a></span>
				</div>
			</form>

    <?php
    session_start();
    $_SESSION['login'] = "FALSE";
    $_SESSION['admin'] = "FALSE";
    $_SESSION['ID'] = "";
    $_SESSION['pass'] = "";

    require('../database.php');
    if(isset($_POST["submit"]) && !empty($_POST["pass"])){
      $email = $con->real_escape_string($_POST['email']);
      $pass = $con->real_escape_string($_POST['pass']);

      //STATEMENT PREPARATO
      $stmt = $con->prepare("SELECT email, pass FROM users WHERE email = ?");
      $stmt->bind_param('s', $email);
      $stmt->execute();
      $res = $stmt->get_result();
      $user = $res->fetch_assoc();

      //CONTROLLO SE LA MAIL E' PRESENTE NEL DATABASE
      if($email != $user['email']){
        echo "Utente non trovato";
        exit;
      } 
      
      //CONTROLLO SE LA PASSWORD E' CORRETTA
      if(password_verify($pass, $user['pass'])){
        if($user['email'] == "root@admin.it") 
          $_SESSION['admin'] = TRUE;
        echo "Benvenuto " . $email . "!";
        $_SESSION['login'] = "TRUE";
        $_SESSION['ID'] = $_POST['email'];
        $_SESSION['pass'] = $_POST['pass'];
        header("Location: validate.php");
      }
      else{
        $_SESSION['validate'] = "NO";
        header("Location: validate.php");
        //echo "Password non corretta";
        exit;
      }
    }
    ?>

</body>
</html>
