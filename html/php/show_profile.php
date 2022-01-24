<!-- Nota: per il progetto finale il form di login dovrà mantenere i nomi dei campi di input forniti in questo esercizio (email e pass) che saranno usati dai test automatici.  -->
<!-- NON  FARE L'UPDATE UNA VARIABILE ALLA VOLTA CHE LA MARINA SI ARRABBIA -->
<!-- OCCHIO CHE NON CI SIANO TAG RIPETUTI (4 HTML, 4 BODY, ETC...) -->
<!DOCTYPE html>
<html lang="en">
<head>
	<title> <?php echo $user['nome']; ?> </title>
	<link rel="stylesheet" type="text/css" href="../css/profile-style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="../profile-script.js"></script>
	<?php 
		include("navbar.php"); 
		// include("update_profile.php");
	?>
</head>
<body>
	<?php
		  require('database.php');
	?>
	<?php
		session_start();
		$db = mysqli_connect("localhost","enrico","123","users")// temp
			or die ('Unable to connect. Check your connection parameters.');

		// preparo variabili per le info dell'utente
		$stmt = $con->prepare("SELECT nome, cognome, email FROM users WHERE email = ?");
		$stmt->bind_param('s', $_SESSION['ID']);
		$stmt->execute();
		$res = $stmt->get_result();
		$user = $res->fetch_assoc();

		//echo $user;


		


		//$query=mysqli_query($db,"SELECT * FROM users where user_id='$id'")or die(mysqli_error());
		//$row=mysqli_fetch_array($query);

	?>

	<div class="card">
		<h2>User Info</h2>
		<img src="../img/profilo.png" alt="user_img" id="user_img">
		<h1><?php echo $user['nome']; ?></h1>
		<p class="title">CEO & Founder, Example</p>
		<p>Harvard University</p>
		<div style="margin: 24px 0;">
			<a href="#"><i class="fa fa-dribbble"></i></a> <!-- icone dei social prese dal link -->
			<a href="#"><i class="fa fa-twitter"></i></a>  
			<a href="#"><i class="fa fa-linkedin"></i></a>  
			<a href="#"><i class="fa fa-facebook"></i></a> 
		</div>
		<p><button>Contact</button></p>
	</div>

	<div id="info">
		<div id="menu">
			<a href="#" onclick="dispetti(1)" style="border-top-left-radius: 25%"> Preview </a>
			<a href="#" onclick="dispetti(2)"> Travels </a>
			<a href="#" onclick="dispetti(3)"> Edit Profile </a>
			<a href="#" onclick="dispetti(4)" style="border-top-right-radius: 25%"> Logout </a>
		</div>

		<section id="anteprima">
			<h2> Profile Preview :) </h2>
			<p>Name: </p> <h3><?php echo $user['nome']; ?></h3><br>
			<p>Surname: </p> <h3><?php echo $user['cognome']; ?></h3><br>
			<p>Email: </p> <h3><?php echo $user['email']; ?></h3><br>
			<p>URL foto profilo: </p> <h3><?php echo $user['img']; ?></h3><br>
			<p>Biography: </p> <h3><?php echo $user['biografia']; ?></h3><br>
		</section>

		<section id="viaggi">
			<h2> Click a button! </h2>
			<button> Orders </button>
			<button> Wishlist </button>
			<div id="orders">
				<?php include("../private/orders_history.php"); ?>
			</div>
			<div id="wishlist">
				<?php include("../private/wishlist.php"); ?>
			</div>
		</section>

		<section id="edit">	
			<form method="POST">
				<label for="firstname"><h4>Firstname</h4></label>
				<input type="text" id="firstname" placeholder="Edit your name...">

				<label for="lastname"><h4>Lastname</h4></label>
				<input type="text" id="lastname" placeholder="Edit your surname...">

				<label for="img"><h4>Indirizzo URL della foto profilo</h4></label>
				<input type="text" id="img" placeholder="Edit your URL...">

				<label for="bio"><h4>Biografia</h4></label>
				<input type="text" id="biografia" placeholder="Tell us about you!">

				<label for="email"><h4>Email</h4></label>
				<input type="email" id="email" placeholder="Edit your email..." required>

				<label for="pass_o"><h4>Password</h4></label>
				<input type="password" id="pass_o" placeholder="Old password..." required><br>
				<input type="password" id="pass_n" placeholder="New password..." required>
				<input type="password" id="confirm" placeholder="Confirm new password..." required><br>

				<input type="checkbox" id="newsletter"> Vuoi ricevere la nostra newsletter? </input><br>
				
				<input name="submit" type="submit" value="Submit Changes">
			</form>
		</section>

		<section id="logout">
			<form action="logout.php">
				<br>
				<h2> Do you want to logout?? </h2>
				<input type="submit" value="Logout">
			</form>
		</section>
	</div>
	<script>
		function dispetti(a){
			switch (a) {
				case 1: //anteprima
					document.getElementById("anteprima").style.display="block";
					document.getElementById("viaggi").style.display="none";
					document.getElementById("edit").style.display="none";
					document.getElementById("logout").style.display="none";
					break;
				case 2: //viaggi
					document.getElementById("anteprima").style.display="none";
					document.getElementById("viaggi").style.display="block";
					document.getElementById("edit").style.display="none";
					document.getElementById("logout").style.display="none";
					break;
				case 3: //edit
					document.getElementById("anteprima").style.display="none";
					document.getElementById("viaggi").style.display="none";
					document.getElementById("edit").style.display="block";
					document.getElementById("logout").style.display="none";
					break;
				case 4: //logout
					document.getElementById("anteprima").style.display="none";
					document.getElementById("viaggi").style.display="none";
					document.getElementById("edit").style.display="none";
					document.getElementById("logout").style.display="block";
					break;
				default:
					alert("javascript error!");
			}
		}
	</script>
	<script> //script che tiene fermo il menù
		window.onscroll = function() {myFunction()};

		var topnav = document.getElementById("topnav");
		var sticky = navbar.offsetTop;

		function myFunction() {
			if (window.pageYOffset >= sticky) {
				topnav.classList.add("sticky")
			}
			else
				topnav.classList.remove("sticky");
		}
	</script>
</body>
</html>