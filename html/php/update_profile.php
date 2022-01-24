<!-- Nota: per il progetto finale il form di login dovrà mantenere i nomi dei campi di input forniti in questo esercizio (email e pass) che saranno usati dai test automatici.  -->
<!-- NON  FARE L'UPDATE UNA VARIABILE ALLA VOLTA CHE LA MARINA SI ARRABBIA -->
<!-- OCCHIO CHE NON CI SIANO TAG RIPETUTI (4 HTML, 4 BODY, ETC...) -->

<!DOCTYPE html>
<html lang="en">
<head>
  <title> <?php echo $row['firstname']; ?> </title>
  <link rel="stylesheet" type="text/css" href="../css/profile-style.css">
</head>
<body>
  <?php
    session_start();

    $db = mysqli_connect("localhost","lillo","4787","datasaw"); // temp
      // or die ('Unable to connect. Check your connection parameters.');


    // if(isset($_POST['Submit Changes'])){
    //   $email = $_POST['email'];
    //   $pass = $_POST['pass'];
    //   $bio = $_POST['biography'];
    //   $firstname = $_POST['firstname'];
    //   $lastname = $_POST['lastname'];
    //   $newsletter = $_POST['newsletter'];
    //   $query = "UPDATE users SET firstname = '$firstname',
    //                           lastname = '$lastname', 
    //                           email = $email,
    //                           pass = $pass,
    //                           bio = $bio, 
    //                           newsletter = '$newsletter' WHERE user_id = '$id'";
    //   $result = mysqli_query($db, $query) or die(mysqli_error($db));
    // }

    // if(true) // if succes
    //   echo "<h3>Profile's edited successful!</h3>";
    // else
    //   echo "<h3>Something went wrong, retry...</h3>";

    //   header("Refresh:2; profile.php");
  ?>
</body>
</html>