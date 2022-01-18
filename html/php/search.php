<!DOCTYPE html>
<html lang="eng">
     
<link rel="stylesheet" type="text/css" href="../css/homepage-style.css">
<link rel="stylesheet" type="text/css" href="../css/search-style.css">


<head> <title> HomePage </title> </head>

<body>

        <?php 
        
            include("navbar.php");
            require("database.php");

            $search = "%{$_POST['search']}%"; 
            $stmt = "";
            if(!$stmt = mysqli_prepare($con, "SELECT * FROM viaggi WHERE civilta LIKE ? or anno LIKE ?"))
                die( "Errore in prepare: (" .$con->errno . ") " . $con->error);
            
            if (!mysqli_stmt_bind_param($stmt, 'ss', $search, $search)) {
                die( "Error in bind_param: (" .$con->errno . ") " . $con->error);
            }
            
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        ?>

        <section class="search-one">
            <div class="position">

                <div class="results">
                    <h1> Risultati della ricerca: </h1>
                    <p> Sono stati trovati <b><?php echo mysqli_num_rows($result)?></b> elementi.</p>
                </div>
                
                <?php 
                    if (mysqli_num_rows($result) > 0) {
                        $count = 0;
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            printf('<div class="%s">', $count);
                                printf('<div class="card-search">'); 
                                    printf('<div class="content">'); 
                                        printf('<h1>%s</h1>', $row['civilta']);
                                        printf('<p>Anno: %s</p>', $row['anno']);
                                        printf('<p>Costo: %s</p>', $row['costo']);
                                        include("images.php");
                                        printf('<img src=%s type="img">', $image);
                                    printf('</div>');
                                printf('</div>');
                            printf('</div>');
                            $count += 1;
                        }
                    }
                
                ?>

            </div>
        </section>
        <script>
            var divs = document.getElementsByClassName('card-search');                
            for (var i=0; i < divs.length; i++) {
                divs[i].onclick = function(){
                    location.href = "homepage.php";
                }
            };
        </script>
</body>
</html>