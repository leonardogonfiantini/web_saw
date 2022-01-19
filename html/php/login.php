<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" type="text/css" href="../css/loginreg-style.css">

<head>
    <title>Log-in</title>
</head>

<body>


<?php

	if(isset($_POST['button1'])) {
		include('../../private/loginprocedure.php');
	}
?>


<form method="post">

    <div class = "divleft">
        <img src="../img/epoquechar.jpg"  width="100%" height="100%"> 
    </div>

    <div class="returnhome">
          <a href="homepage.php"> Torna alla homepage </a>
    </div>

    <div class="divright">

        <h1 style="margin-top:26%"> Inserisci email e password! </h1>

        <div> <input type="email" id="email" name="email" placeholder="E-mail"required /> </div>
        <div> <input type="password" id="pass" name="pass" minlength="8" placeholder="Password" required /> </div>

        <div> <button type="submit" class="btn" name="button1"> Submit </button>  </div>

        <div> 
            <p> Non hai ancora un account?
            <a class="active" href="registration.php"> Sign up </a> 
            </p>
        </div>
    </div>
</form>

</body>
</html>