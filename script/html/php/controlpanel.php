<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Form di Registrazione</title>
	<link rel="stylesheet" type="text/css" href="../css/controlpanel-style.css">
</head>

<body>

    <?php
        include("navbar.php");
    /*    session_start();
        if(!$_SESSION['admin'])
            header("Location: homepage.php"); */
        require('database.php');
        $select = "SELECT * FROM users ORDER BY nome";
        $result = mysqli_query($con, $select);
    
    ?>

<section>
    <h1 class="title"> Area Amministrativa </h1>
    </br>
    <div class="users">
        <h2> Lista utenti registrati </h1>
        </br>
        <form action="#" method="POST">
            <input class="input-box" id="search" name="search" type="text" placeholder=" Cerca un utente">
            <button class="ok" type="submit">
            <img src="../img/search.png" type="img">
            </button> 
        </form>
        </br>
        <table id="table"> 
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Email</th>
                <th>Azione</th>
            </tr>

            <?php
                $i = 0;
                while($row = mysqli_fetch_array($result)) {
                    printf('<tr id="tr%d">', $i);
                    print "<td>" . $row['nome'] . "</td>";
                    print "<td>" . $row['cognome'] . "</td>";
                    print "<td>" . $row['email'] . "</td>";
                    printf ('<td><pre><img id="edit" onclick="imgfun(%d)" class="edit" src="../img/edit.jpg" alt="Edit" />     <img src="images/garbage.png" alt="Elimina">', $i);
                    print "</tr>";
                    $i++;
                } ?>
                
            <div class="formPopup" id="popupForm">
    
                <h1>Modifica Utente</h1>
                <div class="close">
                    <img src="../img/close.png" onclick="closePopup()"></img>
                </div>
                <form action="#">
                    
                    <input type="text" id="nome" placeholder="%d" name="nome">
                    <input type="text" id="cognome" placeholder="Your Email" name="cognome">
                    <input type="text" id="email" placeholder="Your Email" name="email">
                    
                </form>
            </div>
        </table>

        
    </div>
</section>

<section>
    <div class="shop-items">
        <h2> Gestione shop </h2>
        
    </div>
</section>

<script type="text/javascript">

    document.getElementById("popupForm").style.display = "none";
    
    function imgfun(id) {
        
        document.getElementById("popupForm").style.display = "block";
        
        var x = document.getElementById("table").rows.length; 

        var tr = document.getElementById("tr"+id);
        tds = tr.getElementsByTagName("td");
        
        var nome = tds[0].innerHTML;
        var cognome = tds[1].innerHTML;
        var email = tds[2].innerHTML;

        console.log(nome);
        document.getElementById("nome").placeholder = nome;
        document.getElementById("cognome").placeholder = cognome; 
        document.getElementById("email").placeholder = email;  
    }

    function closePopup() {
        document.getElementById("popupForm").style.display = "none";
    }

</script>



</body>
</head>