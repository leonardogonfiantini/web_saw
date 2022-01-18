<?php 
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

    $result = $mysqli->query("SELECT * FROM ratings ORDER BY RAND () LIMIT 3");

    $margin=1;
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class=rating-card style="."left:".($margin*5.5)."%>";
            echo "<p class=name> ".$row['user']." </p>";
            echo "<p class=stars> rate: ".$row['stars']."/5 </p>";
            echo "<div class=divisor></div>";
            echo "<p class=rating> ".$row['textarea']." </p>";
        echo "</div>";
    $margin++;
}