<!DOCTYPE html>
<html lang="eng">
     
<link rel="stylesheet" type="text/css" href="../css/search-style.css">

<head> <title> Search </title> </head>

<body>

    <?php include("navbar.php"); ?>

        <?php             
            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); //error reporting for mysql server
            $mysqli = mysqli_connect('localhost', 'root', '1234', 'dbUtenti');
    
            $table = "products";

            if ($result = $mysqli->query("SHOW TABLES LIKE '".$table."'")) {
                if($result->num_rows == 0) {
                    $mysqli->query("CREATE TABLE products (
                                    id int(11) AUTO_INCREMENT,
                                    nameproduct varchar(255) NOT NULL,
                                    img varchar(255) NOT NULL,
                                    descr varchar(255) NOT NULL,
                                    price int NOT NULL,
                                    PRIMARY KEY  (ID) 
                                    )");
                }
            }
            
            $search = "%{$_POST['search']}%"; 
    
            $stmt = $mysqli->prepare("SELECT * FROM $table WHERE nameproduct LIKE ? OR descr LIKE ? UNION SELECT * FROM $table");
            $stmt->bind_param("ss", $search, $search);
            $stmt->execute();
            $result = $stmt->get_result();
            
            echo "<p class=result> Risultati trovati per la parola \"".$_POST['search']."\":</p>";
            
            $margin=0;
            while ($row = mysqli_fetch_array($result)) {
                echo "<div class=products style="."margin-top:".($margin*40)."%>";
                    
                    echo "<div class=card>";
                        echo "<img src=".$row['img']." type=img>";
                        echo "<p>".$row['descr']."</p>";
                        echo "<button class=find id=".$row['nameproduct']."-infobtn name=".$row['nameproduct']."  type=submit> Scopri di piu </button>";
                        echo "<button class=shop id=goshop type=submit> Vai allo shop! </button>";
                    echo "</div>";

                    $row = mysqli_fetch_array($result);
                    if ($row == NULL) break;
                    echo "<div class=divisor></div>";

                    echo "<div class=card>";
                        echo "<img src=".$row['img']." type=img>";
                        echo "<p>".$row['descr']."</p>";
                        echo "<button class=find id=".$row['nameproduct']."-infobtn name=".$row['nameproduct']." type=submit> Scopri di piu </button>";
                        echo "<button class=shop id=goshop type=submit> Vai allo shop! </button>";
                    echo "</div>";
                    
                    $row = mysqli_fetch_array($result);
                    if ($row == NULL) break;

                    echo "<div class=divisor></div>";
                        echo "<div class=card>";
                        echo "<img src=".$row['img']." type=img>";
                        echo "<p>".$row['descr']."</p>";
                        echo "<button class=find id=".$row['nameproduct']."-infobtn name=".$row['nameproduct']." type=submit> Scopri di piu </button>";
                        echo "<button class=shop id=goshop type=submit> Vai allo shop! </button>";
                    echo "</div>";

                echo "</div>";
                $margin++;
            }

            $stmt->close();
            $result->close();
            $mysqli->close();
        ?>


    <script> 
        var buttons = document.getElementsByTagName('button')
        for (let i = 0; i < buttons.length; i++) {
            if (buttons[i].id != "" && buttons[i].id.match("-infobtn") != null) {
                buttons[i].onclick = function () {
                    location.replace("infopage.php?info="+buttons[i].name);
                }
            } else {
                buttons[i].onclick = function () {
                    location.replace("shop.php");
                }
            }
        }
    </script>

</body>
</html>