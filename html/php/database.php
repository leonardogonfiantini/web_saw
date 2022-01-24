<?php
// Enter your Host, username, password, database below.
// I left password empty because i do not set password on localhost.
$con = mysqli_connect('localhost', 'S4545114', 'sugovoltri', 'S4545114'); //tanto poi bisogna sistemare
// Check connection
if (mysqli_connect_errno()){
  echo "Errore nella connessione con il database: " . mysqli_connect_error();
  }



// local test enri
// $con = mysqli_connect('localhost', 'enrico', '123', 'users'); // temp
// // Check connection
// if (mysqli_connect_errno())
//   echo "Errore nella connessione con il database: " . mysqli_connect_error();
?>