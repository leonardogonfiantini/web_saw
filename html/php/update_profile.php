<!-- Nota: per il progetto finale il form di login dovrà mantenere i nomi dei campi di input forniti in questo esercizio (email e pass) che saranno usati dai test automatici.  -->
<!-- NON  FARE L'UPDATE UNA VARIABILE ALLA VOLTA CHE LA MARINA SI ARRABBIA -->
<!-- OCCHIO CHE NON CI SIANO TAG RIPETUTI (4 HTML, 4 BODY, ETC...) -->

<!DOCTYPE html>
<html lang="en">
<head>
  <title> <?php echo $user['nome']; ?> </title>
  <link rel="stylesheet" type="text/css" href="../css/profile-style.css">
</head>
<body>
  <?php
    session_start();
    $db = mysqli_connect("localhost","enrico","123","users")// temp
		  or die ('Unable to connect. Check your connection parameters.');
    $id = $_SESSION['ID'];

    if(isset($_POST['Submit Changes'])){ // Determine if a variable is declared and is different than null
      $email = $_POST['email'];
      $pass = $_POST['pass'];
      $biografia = $_POST['biografia'];
      $nome = $_POST['nome'];
      $cognome = $_POST['cognome'];
      $newsletter = $_POST['newsletter'];
      $query = "UPDATE users SET nome = '$nome',
                                 cognome = '$cognome', 
                                 email = $email,
                                 pass = $pass,
                                 biografia = $biografia, 
                                 newsletter = '$newsletter'
                                 WHERE email = '$id'";
      $result = mysqli_query($db, $query) or die(mysqli_error($db));
    }
    
    if($result)
      echo "<h3>Profile's edited successful!</h3>";
    else
      echo "<h3>Something went wrong, retry...</h3>";

      header("Refresh:2; profile.php");
  ?>
</body>
</html>