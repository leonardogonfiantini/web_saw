<?php
    session_start();
    $db = mysqli_connect("localhost","enrico","123","users")// temp
		or die ('Unable to connect. Check your connection parameters.');

    // sono necessari da fare ogni volta?
    $stmt = $con->prepare("SELECT nome, email FROM users WHERE email = ?");
    $stmt->bind_param('s', $_SESSION['ID']);
    $stmt->execute();
    $res = $stmt->get_result();
    $user = $res->fetch_assoc();

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'vendor/autoload.php'; // :)
    
    $mail = new PHPMailer(true);
    
    try {
        $mail->SMTPDebug = 2;                   // Enable verbose debug output
        $mail->isSMTP();                        // Set mailer to use SMTP
        $mail->Host       = 'smtp.gmail.com;';    // Specify main SMTP server
        $mail->SMTPAuth   = true;               // Enable SMTP authentication
        $mail->Username   = 'timetravel.unige@gmail.com';
        $mail->Password   = 'lillo-css00';
        $mail->SMTPSecure = 'tls';              // Enable TLS encryption, 'ssl' also accepted
        $mail->Port       = 465;                // TCP port to connect to

        $mail->setFrom('timetravel.unige@gmail.com', 'TimeTravel');
        $mail->addAddress($user['email']);
        $mail->addAddress($user['email'], $user['nome']);
        $mail->addAttachment("../img/shop/back-shop.jpg"); // immagine a caso

        $mail->isHTML(true); // If passed true, sets the email format to HTML.                 
        $mail->Subject = 'Lorem Ipsum';
        $mail->Body    = '<p><b>Lorem ipsum dolor sit amet consectetur adipisicing elit.  Obcaecati neque quasi hic cum eum illum minus!  aut ipsa quasi sint officia saepe fugiat, nihil eius. Sint vero adipisci quaerat perspiciatis ad commodi repellat illo, cupiditate quasi. Illum?</b></p>';
        $mail->AltBody = 'Lorem ipsum dolor sit amet consectetur adipisicing elit.  Obcaecati neque quasi hic cum eum illum minus!  aut ipsa quasi sint officia saepe fugiat, nihil eius. Sint vero adipisci quaerat perspiciatis ad commodi repellat illo, cupiditate quasi. Illum?'; //Body in plain text for non-HTML mail clients
        $mail->send();
        echo "<h3>Email inviata correttamente!</h3>";
    }
    catch (Exception $e) {
        echo "<h3>Email non mandata. Errore mailer: {$mail->ErrorInfo}</h3>";
    }


    // bozza invio all users
    $query = "SELECT email FROM users";
    $recordset = mysql_query($query);
    $row_recordset = mysql_fetch_assoc($recordset);
    $tota_row_recordset = mysql_num_rows($recordset);
    // prima crea l'oggetto!
    while($row = mysql_fetch_array($recordset)){
        $to = $row['email'];
        $mail->AddAddress($to); // add each DB entry to list of recipients
    }
    //
?>