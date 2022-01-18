<!-- Nota: per il progetto finale il form di login dovrà mantenere i nomi dei campi di input forniti in questo esercizio (email e pass) che saranno usati dai test automatici.  -->
<!-- NON  FARE L'UPDATE UNA VARIABILE ALLA VOLTA CHE LA MARINA SI ARRABBIA -->
<!-- OCCHIO CHE NON CI SIANO TAG RIPETUTI (4 HTML, 4 BODY, ETC...) -->
<!DOCTYPE html>
<html lang="en">
<head>
	<title> <?php echo $row['firstname']; ?> </title>
	<link rel="stylesheet" type="text/css" href="../css/profile-style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="../profile-script.js"></script>
</head>
<body>
	<?php include("navbar.php") ?>
	<?php
		session_start();
		$db = mysqli_connect("localhost","lillo","4787","datasaw")// temp
			or die ('Unable to connect. Check your connection parameters.');

		// preparo variabili per le info dell'utente
		$id = $_SESSION['id'];
		$email = $_POST['email']; 
		$pass = $_POST['pass'];
		$bio = $_POST['biography'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$newsletter = $_POST['newsletter'];


		require('database.php');


		$query=mysqli_query($db,"SELECT * FROM users where user_id='$id'")or die(mysqli_error());
		$row=mysqli_fetch_array($query);

	?>
	<div class="card">
		<h2>User Info</h2>
		<img src="../img/91398095_1606813216135642_1704392264576401408_o-960x694.jpg" alt="usern_img" id="user_img">
		<h1><?php echo $row['firstname']; ?></h1>
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
			<a href="#" onclick="dispetti(1)"> Preview </a>
			<a href="#" onclick="dispetti(2)"> Travels </a>
			<a href="#" onclick="dispetti(3)"> Edit Profile </a>
			<a href="#" onclick="dispetti(4)"> Logout </a>
		</div>

		<section id="anteprima">
			<h2> Profile Preview :) </h2>
			<p>Name: </p> <h3><?php echo $row['firstname']; ?></h3><br>
			<p>Surname: </p> <h3><?php echo $row['lastname']; ?></h3><br>
			<p>Email: </p> <h3><?php echo $row['mail']; ?></h3><br>
			<p>Biography: </p> <h3><?php echo $row['biography']; ?></h3><br>
			<p> Lorem ipsum dolor sit amet consectetur adipisicing elit.  Obcaecati neque quasi hic cum eum illum minus!  aut ipsa quasi sint officia saepe fugiat, nihil eius. Sint vero adipisci quaerat perspiciatis ad commodi repellat illo, cupiditate quasi. Illum? </p>
		</section>

		<section id="viaggi">
			<h2> Click a button! </h2>
			<button> Orders </button>
			<button> Wishlist </button>
		</section>

		<section id="edit">	
			<form action="update_profile.php" method="POST">
				<label for="firstname"><h4>Firstname</h4></label>
				<input type="text" id="firstname" placeholder="Edit your name..."><br>

				<label for="lastname"><h4>Lastname</h4></label>
				<input type="text" id="lastname" placeholder="Edit your surname..."><br>

				<label for="bio"><h4>Biografia</h4></label>
				<input type="text" id="biografia" placeholder="Tell us about you!"><br>

				<label for="email"><h4>Email</h4></label>
				<input type="email" id="email" placeholder="Edit your email..." required><br>

				<label for="pass_o"><h4>Password</h4></label>
				<input type="password" id="pass_o" placeholder="Old password..." required><br>
				<input type="password" id="pass_n" placeholder="New password..." required><br>
				<input type="password" id="confirm" placeholder="Conferm password..." required><br><br>

				<label for="newsletter"><h4>See updates from our newsletter :)</h4></label>
				<button id="newsletter"> Newsletter </button><br><br>
				
				<input type="submit" value="Submit Changes">
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