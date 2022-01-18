<!DOCTYPE html>
<html lang="eng">
     
    <link rel="stylesheet" type="text/css" href="../css/rate-style.css">


    <head> <title> HomePage </title> </head>

    <body>

        <?php 
              include("navbar.php");
              include("database.php");

              if(isset($_POST['bottone'])){
                  if(isset($_POST['rate'])) $stelle = mysqli_real_escape_string($con, $_POST['rate']);
                  $recensione = mysqli_real_escape_string($con, $_POST['recensione']);
                  $utente = "user"; /*QUA IMPLEMENTARE NOME UTENTE DA SESSIONE*/ 
              
                  $stmt = $con->prepare("INSERT INTO ratings (utente, stelle, recensione) VALUES (?, ?, ?)");
                  $stmt->bind_param('sis', $utente, $stelle, $recensione);
                  $stmt->execute();
                  $res = $stmt->get_result();

                  if($res){
                      echo "ERRORE";
                      exit;
                  }
                }
        ?>

        <section class="one">
            <div class="position">
                <img src="../img/civilization-6.jpg" type="img" width="100%" height="65%">
                <div class="principal-card"> 
                    <h1> Why choose time travel? </h1>
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit.  Obcaecati neque quasi hic cum eum illum minus!  aut ipsa quasi sint officia saepe fugiat, nihil eius. Sint vero adipisci quaerat perspiciatis ad commodi repellat illo, cupiditate quasi. Illum? </p>
                </div>

                <div class="common-card"> 
                    <img src="../img/traveler.png" type="img" width="32%" height="20%">
                    <h3> Lorem, ipsum. </h3>
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, ad. </p>
                </div>

                <div class="common-card" style="margin-left:20%;"> 
                    <img src="../img/treasure-chest.png" type="img" width="32%" height="20%">
                    <h3> Lorem, ipsum. </h3>
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, ad. </p>
                </div>

                <div class="common-card" style="margin-left:40%;"> 
                    <img src="../img/time-travelling.png" type="img" width="32%" height="20%">
                    <h3> Lorem, ipsum. </h3>
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, ad. </p>
                </div>
            </div>  

        </section>

        <section class="two">
            <div class="position">
                <div class="left bigimg">
                    <img src="../img/pDmeLt75trQVyFcqN64uM8.jpg" type="img" width="100%" height="100%">
                </div>

                <div class="right">
                    <div>
                        <h1> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae, molestiae. </h1>
                        <br>
                        <p> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Facere pariatur nobis optio deleniti. Quis ea aliquam voluptatibus harum, quae voluptas? </p>
                    </div>  
                
                    <div class="iconlist" >
                        <img src="../img/greece.png" type="img" width="10%" height="100%">
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                    </div>

                    <div class="iconlist" style="margin-top:15%;">
                        <img src="../img/cat.png" type="img" width="10%" height="100%">
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                    </div>

                    <div class="iconlist" style="margin-top:30%;">
                        <img src="../img/chinese.png" type="img" width="10%" height="100%">
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                    </div>
                
                </div>
            </div>
        </section>

        <section class="three">
            <div class="position">
                <div class="right">
                    <img src="../img/civ-6-gameplay-news-update-saladin-arabia.jpg" type="img" width="100%" height="100%">
                </div>

                <div class="services">
                    <h1> Services </h1>
                    <p> Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>Ipsam rem numquam fuga perferendis, quasi quos. </p>
                </div>
                
                <div class="left">
                    <div class="card top-right"> 
                        <div class="content"> 
                            <img src="../img/caveman.png" type="img" width="10%" height="100%">
                            <p> Lorem ipsum dolor sit amet. </p>
                        </div>
                    </div>
                    <div class="card top-left"> 
                    <div class="content"> 
                            <img src="../img/mummy.png" type="img" width="10%" height="100%">
                            <p> Lorem ipsum dolor sit amet. </p>

                        </div>
                    </div>
                    <div class="card bot-right"> 
                    <div class="content"> 
                            <img src="../img/pirate-hat.png" type="img" width="10%" height="100%">
                            <p> Lorem ipsum dolor sit amet. </p>

                        </div>
                    </div>
                    <div class="card bot-left"> 
                    <div class="content"> 
                            <img src="../img/ancient-greece.png" type="img" width="10%" height="100%">
                            <p> Lorem ipsum dolor sit amet. </p>

                        </div>
                    </div>
                </div>

            </div>
        </section>

        <section class="four">
            <div class="position">

                <div class="experts"> 
                    <h1> Experts </h1>
                    <p> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perspiciatis minus dolorum blanditiis qui voluptatibus sunt consequuntur vero commodi cumque nisi. </p>
                </div>
                <div class="grid">
                    <div class="profile top-left">
                        <img src="../img/lillo.jpg" class="bigimg" type="img" width="28%" height="70%">
                        <h1> Da Baby </h1>
                        <h2> css master </h2>
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, velit? Lorem ipsum dolor sit. </p>
                        <a href="homepage.php"> <div class="icon"> 
                            <img src="../img/instagram.png" type="img" width="50%" height="50%">
                        </div></a>
                        <a href="homepage.php"> <div class="icon" style="margin-left:10%"> 
                            <img src="../img/facebook.png" type="img" width="50%" height="50%">
                        </div></a>
                        <a href="homepage.php"> <div class="icon" style="margin-left:20%"> 
                            <img src="../img/twitter.png" type="img" width="50%" height="50%">
                        </div></a>
                        <a href="homepage.php"> <div class="icon" style="margin-left:30%"> 
                            <img src="../img/linkedin.png" type="img" width="50%" height="50%">
                        </div></a>
                    </div>

                    <div class="profile top-right">
                        <img src="../img/lillo.jpg" class="bigimg" type="img" width="28%" height="70%">
                        <h1> Da Baby </h1>
                        <h2> css master </h2>
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, velit? Lorem ipsum dolor sit amet consectetur. </p>
                        <a href="homepage.php"> <div class="icon"> 
                            <img src="../img/instagram.png" type="img" width="50%" height="50%">
                        </div></a>
                        <a href="homepage.php"> <div class="icon" style="margin-left:10%"> 
                            <img src="../img/facebook.png" type="img" width="50%" height="50%">
                        </div></a>
                        <a href="homepage.php"> <div class="icon" style="margin-left:20%"> 
                            <img src="../img/twitter.png" type="img" width="50%" height="50%">
                        </div></a>
                        <a href="homepage.php"> <div class="icon" style="margin-left:30%"> 
                            <img src="../img/linkedin.png" type="img" width="50%" height="50%">
                        </div></a>
                    </div>

                    <div class="profile bot-left">
                        <img src="../img/lillo.jpg" class="bigimg" type="img" width="28%" height="70%">
                        <h1> Da Baby </h1>
                        <h2> css master </h2>
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, velit? Lorem ipsum dolor sit amet.</p>
                        <a href="homepage.php"> <div class="icon"> 
                            <img src="../img/instagram.png" type="img" width="50%" height="50%">
                        </div></a>
                        <a href="homepage.php"> <div class="icon" style="margin-left:10%"> 
                            <img src="../img/facebook.png" type="img" width="50%" height="50%">
                        </div></a>
                        <a href="homepage.php"> <div class="icon" style="margin-left:20%"> 
                            <img src="../img/twitter.png" type="img" width="50%" height="50%">
                        </div></a>
                        <a href="homepage.php"> <div class="icon" style="margin-left:30%"> 
                            <img src="../img/linkedin.png" type="img" width="50%" height="50%">
                        </div></a>
                    </div>

                    <div class="profile bot-right">
                        <img src="../img/lillo.jpg" class="bigimg" type="img" width="28%" height="70%">
                        <h1> Da Baby </h1>
                        <h2> css master </h2>
                        <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, velit? Lorem, ipsum dolor. </p>
                        <a href="homepage.php"> <div class="icon"> 
                            <img src="../img/instagram.png" type="img" width="50%" height="50%">
                        </div></a>
                        <a href="homepage.php"> <div class="icon" style="margin-left:10%"> 
                            <img src="../img/facebook.png" type="img" width="50%" height="50%">
                        </div></a>
                        <a href="homepage.php"> <div class="icon" style="margin-left:20%"> 
                            <img src="../img/twitter.png" type="img" width="50%" height="50%">
                        </div></a>
                        <a href="homepage.php"> <div class="icon" style="margin-left:30%"> 
                            <img src="../img/linkedin.png" type="img" width="50%" height="50%">
                        </div></a>
                    </div>
                </div>
            </div>
        </section>

        <section class="five">
            <div class="position">
                <div class="left bigimg">
                    <img src="../img/CVA_EpicEpic_Landscape_Store_2560x1440_2560x1440-bb8ddb45be87c9c95eba62f9025abae9.jpeg" type="img" width="100%" height="100%">
                </div>

                <div class="right">
                    <div>
                        <h1> Valutaci! </h1>
                        <br>
                        <p> Lasciaci un tuo feedback, è importante per noi! </p>
                    </div>  
                <form method= "post">
                    <div class="rating" id="rate" name="rate">
                        <!-- QUINTA STELLA -->
                        <input type="radio" id="star_5" name="rate" value="5" />
                        <label for="star_5" title="Five">&#9733;</label>
                        <!-- QUARTA STELLA -->
                        <input type="radio" id="star_4" name="rate" value="4" />
                        <label for="star_4" title="Four">&#9733;</label>
                        <!-- TERZA STELLA -->
                        <input type="radio" id="star_3" name="rate" value="3" />
                        <label for="star_3" title="Three">&#9733;</label>
                        <!-- SECONDA STELLA -->
                        <input type="radio" id="star_2" name="rate" value="2" />
                        <label for="star_2" title="Two">&#9733;</label>
                        <!-- PRIMA STELLA -->
                        <input type="radio" id="star_1" name="rate" value="1" />
                        <label for="star_1" title="One">&#9733;</label>
                    </div>

                    <div class="commento" id="comment">
                        <textarea  maxlength = "200" id = "recensione" name="recensione" rows = 35% cols = 81%></textarea>
                    </div>
                    <div class="bottoneOK" id="buttonOK">
                        <button type="submit" name="bottone" id="bottone"> Inviaci la tua recensione </button>
                    </div>
                </form>
                </div>
            </div>
        </section>
    </body>
</html>