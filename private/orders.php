<?php
    $result = $mysqli->query("SELECT * FROM orders WHERE user=?");
    bind_param('i', $_SESSION['id']); // riesce a prendere l'id??
    
    // $margin=0;
    // while ($row = mysqli_fetch_array($result)) {
    //     $counter = 0;

    //     echo "<div class=profile_products style="."margin-top:".($margin*40)."%>";
            
    //         echo "<div class=profile_card>";
    //             echo "<img src=".$row['img']." type=img>";
    //             echo "<p>".$row['descr']."</p>";
    //             echo "<button id=".$row['nameproduct']."-btncart name=".$row['nameproduct']." value=".$row['price']." type=submit> Order Now </button>";
    //         echo "</div>";

    //         $row = mysqli_fetch_array($result);
    //         if ($row == NULL) break;
    //         echo "<div class=profile_divisor></div>";

    //         echo "<div class=profile_card>";
    //             echo "<img src=".$row['img']." type=img>";
    //             echo "<p>".$row['descr']."</p>";
    //             echo "<button id=".$row['nameproduct']."-btncart name=".$row['nameproduct']." value=".$row['price']." type=submit> Order Now </button>";
    //         echo "</div>";
            
    //         $row = mysqli_fetch_array($result);
    //         if ($row == NULL) break;

    //         echo "<div class=profile_divisor></div>";
    //             echo "<div class=profile_card>";
    //             echo "<img src=".$row['img']." type=img>";
    //             echo "<p>".$row['descr']."</p>";
    //             echo "<button id=".$row['nameproduct']."-btncart name=".$row['nameproduct']." value=".$row['price']." type=submit> Order Now </button>";
    //         echo "</div>";

    //     echo "</div>";

    //     $margin++;
    // }
    // $result->close();
?> 