<!DOCTYPE html>
<html lang="eng">
     
    <link rel="stylesheet" type="text/css" href="../css/valuta-style.css">


    <head> <title> Valutaci! </title> </head>

    <body>

        <?php 
              include("navbar.php");
              include("../../private/addrating.php");
        ?>

        <section class="five">
            <div class="position">
                <div class="left bigimg">
                    <img src="../img/shop/back-shop.jpeg" type="img" width="100%" height="100%">
                </div>

                <div class="right">
                    <div>
                        <h1> Grazie per l'acquisto! </h1>
                        <p> Lasciaci un tuo feedback se ti va, è importante per noi! </p>
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
                        <textarea  placeholder="...Remember, be nice" maxlength = "255" id = "recensione" name="recensione" rows = 35% cols = 50%></textarea>
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