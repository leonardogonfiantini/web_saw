<?php 
    if(isset($_POST['bottone'])) {

        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //error reporting for mysql server
        $mysqli = mysqli_connect('localhost', 'root', '1234', 'dbUtenti');
    
        $table = "ratings";
    
        if ($result = $mysqli->query("SHOW TABLES LIKE '".$table."'")) {
            if($result->num_rows == 0) {
                $mysqli->query("CREATE TABLE ratings (
                                id int(11) AUTO_INCREMENT,
                                user varchar(255) NOT NULL,
                                stars varchar(255) NOT NULL,
                                textarea varchar(255) NOT NULL,
                                PRIMARY KEY  (ID) 
                                )");
            }
        }

        $stelle = mysqli_real_escape_string($mysqli, $_POST['rate']);
        $recensione = mysqli_real_escape_string($mysqli, trim(preg_replace('/\s+/', ' ', $_POST['recensione'])));
        $utente = "user"; 
    
        $stmt = $mysqli->prepare("INSERT INTO ratings (user, stars, textarea) VALUES (?, ?, ?)");
        $stmt->bind_param('sis', $utente, $stelle, $recensione);
        $stmt->execute();

        $stmt->close();
        $mysqli->close();
        

        header("location: homepage.php");

    }
?>