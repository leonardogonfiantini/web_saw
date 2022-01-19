<!DOCTYPE html>
<html lang="en">

<link rel="stylesheet" type="text/css" href="../css/loginreg-style.css">

<head>
    <title>Sign-up</title>
</head>

<body>


<?php

	if(isset($_POST['button1'])) {
		include('../../private/createuser.php');
	}
?>


<form method="post">

    <div class = "divleft">
        <img src="../img/PedroII.jpg" width="100%" height="100%"> 
    </div>

    <div class="returnhome">
          <a href="homepage.php"> Torna alla homepage </a>
    </div>

    <div class="divright">
        <h1 style="margin-top:11%"> Unisciti a noi! </h1>

        <div> <input type="text" id="firstname" name="firstname" placeholder="Firstname"required /> </div>
        <div> <input type="text" id="lastname" name="lastname" placeholder="Lastname" required /> </div>
        <div> <input type="email" id="email" name="email" placeholder="E-mail"required /> </div>
        <div> <input type="password" id="pass" name="pass" minlength="8" placeholder="Password" required /> </div>
        <div> <input type="password" id="confirm" name="confirm" minlength="8" placeholder="Confirm password" required /> </div>  

        <div> <button type="submit" class="btn" name="button1"> Submit </button>  </div>

        <div> 
            <p> Hai gia un account?
            <a class="active" href="login.php"> Login </a> 
            </p>
        </div>
    </div>
</form>

</body>
</html>