<!DOCTYPE>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form di Registrazione</title>
	<link rel="stylesheet" type="text/css" href="../css/loginreg-style.css">
</head>
<body>

	<div>
		<div class="container">
			<h1 class="title">Registrati</h1>
			<form method="post">
				<div class="user-details">
					<div class="input-box">
						<span class="details">Nome</span>
						<input type="text" id="nome" name="nome" placeholder="Inserisci Nome" required>
					</div>
					<div class="input-box">
						<span class="details">Cognome</span>
						<input type="text" id="cognome" name="cognome" placeholder="Inserisci Cognome" required>
					</div>
					<div class="input-box">
						<span class="details">Email</span>
						<input type="email" id="email" name="email" placeholder="Inserisci Email" required>
					</div>
					<div class="input-box">
						<span class="details">Password</span>
						<input type="password" id="pass" name="pass" placeholder="Inserisci Password" required>
					</div>
					<div class="input-box">
						<span class="details">Conferma Password</span>
						<input type="password" id="confpass" name="confpass" placeholder="Inserisci Password" required>
					</div>
					<div class="input-box">
						<input type="radio" id="newsletter" name="newsletter">
						<h4>Iscriviti alla nostra Newsletter!</h4>
					</div>
				</div>
				<div>
					<span class="clickable-text">Hai già un account? Effettua il <a href="login.php">Login</a></span>
				</div>
				<div class="button">
					<input type="submit" name="submit" value="Registrati">
				</div>
			</form>
<?php

  require('database.php'); //altrimenti non mi connetto al database senza script

  if(isset($_POST['submit'])){

    //PASSWORD DEVONO COINCIDERE
    if($_POST['pass'] != $_POST['confpass']){
      echo "Le password non coincidono";
      exit;
    }

    //PREPARO LE CREDENZIALI PER CARICARLE TRAMITE QUERY
    $nome = $con->real_escape_string($_POST['nome']);
    $cognome = $con->real_escape_string($_POST['cognome']);
    $email = $con->real_escape_string($_POST['email']);
    $pass = $con->real_escape_string(password_hash($_POST['pass'], PASSWORD_BCRYPT));

    //CONTROLLO MAIL
	$stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
	$stmt->bind_param('s', $email);
	$stmt->execute();
	$stmt->store_result();
	$res = $stmt->num_rows();

    if($res > 0){
      echo "Email già esistente";
      exit;
    }
    
	$stmt->close();
    
	$stmt = $con->prepare("INSERT INTO users (nome, cognome, email, pass) VALUES (?, ? , ?, ?)");
	$stmt->bind_param('ssss', $nome, $cognome, $email, $pass);
	if(!$stmt->execute()) echo("Error description: " . mysqli_error($con));
	$res = $stmt->get_result();


    /*if($res)
        echo "<div class = 'form'><h3> Registrazione completata</h3><br/> Clicca <a href='login.php'>qui</a> per accedere!</div>";
    else echo "<div class = 'form'><h3> ERRORE </div>";
*/
	$stmt->close();

  }    
?>

</body>
</html>
