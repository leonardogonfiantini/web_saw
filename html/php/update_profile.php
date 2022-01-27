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
    require('database.php');
    session_start();

    if(isset($_POST['submit_profile'])){ // Determine if a variable is declared and is different than null
      $firstname = $_POST['firstname'];
      $lastname['lastname'];
      $img = $_POST['img'];
      $bio = $_POST['bio'];
      $email = $_POST['email'];
      $newsletter = $_POST['newsletter'];
      $table = "userdata";

      $result = $mysqli->prepare("SELECT id FROM userdata WHERE email LIKE ?");
      $result->bind_param("s", $email);
      $result->execute();
      $result->store_result();
      $result->bind_result($idrow);
      $rows = $result->num_rows;
      $result->fetch();

      if($rows==0 || $idrow==$_SESSION['id']){
        $result = $mysqli->prepare("UPDATE $table SET firstname=?, lastname=?, email=?, bio=?, img=?, newsletter=? WHERE id = ?");
        $result->bind_param('sssssii', $firstname, $lastname, $email, $bio, $img, $newsletter, $_SESSION['id']);
        $result->execute();
        echo "<h3>Dati aggiornati correttamente!</h3>";
      }
      else{
        echo "<h3>Email già esistente!</h3>";

      }

      
    }




    


    
    header("Header: show_profile.php");
  ?>
</body>
</html>