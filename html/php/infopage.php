<!DOCTYPE html>
<html lang="eng">
     
<link rel="stylesheet" type="text/css" href="../css/info-style.css">

<head> <title> Search </title> </head>

<body>
    <?php 
        include("navbar.php"); 
        /*
        Get the content of the Jupiter article on English Wikipedia in HTML
        */
        
        $page = $_GET['info'];
        $url = "https://it.wikipedia.org/w/rest.php/v1/page/" . $page . "/html";
        
        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_USERAGENT, "MediaWiki REST API docs examples/0.1 (https://www.mediawiki.org/wiki/API_talk:REST_API)" );
        $output = curl_exec( $ch );
        curl_close( $ch );
        
        $pattern="/<p>(.*)<\/p>/";
        preg_match_all($pattern,$output,$matches);

        echo "<div class=content>";
            for ($i = 0; $i < 10; $i++) {
                $pattern="/<\\/?a(\\s+.*?>|>)/";
                $matches[0][$i] = preg_replace($pattern, "", $matches[0][$i]);
                $pattern="/<span[^>]+\>/i";
                $matches[0][$i] = preg_replace($pattern, "", $matches[0][$i]);
                $pattern="/<sup[^>]+\>/i";
                $matches[0][$i] = preg_replace($pattern, "", $matches[0][$i]);
                $pattern="/<img[^>]+\>/i";
                $matches[0][$i] = preg_replace($pattern, "", $matches[0][$i]);
                $pattern="/\[(.*?)\]/i";
                $matches[0][$i] = preg_replace($pattern, "", $matches[0][$i]);
                echo $matches[0][$i];

            }
        echo "</div>";

    ?>

</body>