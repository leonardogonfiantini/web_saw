<!-- fac-simile createcards.php -->
<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //error reporting for mysql server
    require('database.php');

    $table = "orders"; // :)

// per cronologia ordini è necessario questo blocco?
    if ($result = $mysqli->query("SHOW TABLES LIKE '".$table."'")) {
        if($result->num_rows == 0) {
            $mysqli->query("CREATE TABLE products (
                            id int(11) AUTO_INCREMENT,
                            nameproduct varchar(255) NOT NULL,
                            img varchar(255) NOT NULL,
                            descr varchar(255) NOT NULL,
                            price int NOT NULL,
                            UserID int (11) NOT NULL,
                            PRIMARY KEY  (ID),
                            FOREIGN KEY (UserID) REFERENCES users(email)
                            )");
        }
    }


    $result = $mysqli->query("SELECT * FROM $table WHERE user=?");
    bind_param('s', $_SESSION['ID']); // riesce a prendere l'id??
    
    $margin=0;
    while ($row = mysqli_fetch_array($result)) {
        $counter = 0;

        echo "<div class=products style="."margin-top:".($margin*40)."%>";
            
            echo "<div class=card>";
                echo "<img src=".$row['img']." type=img>";
                echo "<p>".$row['descr']."</p>";
                echo "<button id=".$row['nameproduct']."-btncart name=".$row['nameproduct']." value=".$row['price']." type=submit> Order Now </button>";
            echo "</div>";

            $row = mysqli_fetch_array($result);
            if ($row == NULL) break;
            echo "<div class=divisor></div>";

            echo "<div class=card>";
                echo "<img src=".$row['img']." type=img>";
                echo "<p>".$row['descr']."</p>";
                echo "<button id=".$row['nameproduct']."-btncart name=".$row['nameproduct']." value=".$row['price']." type=submit> Order Now </button>";
            echo "</div>";
            
            $row = mysqli_fetch_array($result);
            if ($row == NULL) break;

            echo "<div class=divisor></div>";
                echo "<div class=card>";
                echo "<img src=".$row['img']." type=img>";
                echo "<p>".$row['descr']."</p>";
                echo "<button id=".$row['nameproduct']."-btncart name=".$row['nameproduct']." value=".$row['price']." type=submit> Order Now </button>";
            echo "</div>";

        echo "</div>";

        $margin++;
    }



    $result->close();
?>