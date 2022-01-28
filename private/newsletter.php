<?php
    require('database.php');
    $on = "on";
    $stmt = $mysqli->prepare("SELECT email FROM userdata WHERE newsletter LIKE ?");
    $stmt->bind_param("s", $on);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($email); 

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require '../vendor/autoload.php'; // :)
    
    $mail = new PHPMailer(true);
    
    try {
        $mail->SMTPDebug = 2;                   // Enable verbose debug output
        $mail->isSMTP();                        // Set mailer to use SMTP
        $mail->Host       = 'ssl://smtp.gmail.com;';    // Specify main SMTP server
        $mail->SMTPAuth   = true;               // Enable SMTP authentication
        $mail->Username   = 'timetravel.unige@gmail.com';
        $mail->Password   = 'lillo-css00';
        $mail->SMTPSecure = 'tls';              // Enable TLS encryption, 'ssl' also accepted
        $mail->Port       = 465;                // TCP port to connect to

        $mail->setFrom('timetravel.unige@gmail.com', 'TimeTravel');
        $mail->addAddress('lp.gonfiantini@gmail.com');
        $mail->addAddress('enrico.pezzano@outlook.it');
        
        while ($stmt->fetch()) {
            $mail->addAddress($email);
        }

        $mail->isHTML(true); // If passed true, sets the email format to HTML.                 
        $mail->Subject = 'Lorem Ipsum';
        $mail->Body    = "<img src=https://wallpaperaccess.com/full/3118845.jpg> 
                        <p><b>Lorem ipsum dolor sit amet consectetur adipisicing elit.  Obcaecati neque quasi hic cum eum illum minus!  aut ipsa quasi sint officia saepe fugiat, nihil eius. Sint vero adipisci quaerat perspiciatis ad commodi repellat illo, cupiditate quasi. Illum?</b></p>";
        $mail->AltBody = "Lorem ipsum dolor sit amet consectetur adipisicing elit.  Obcaecati neque quasi hic cum eum illum minus!  aut ipsa quasi sint officia saepe fugiat, nihil eius. Sint vero adipisci quaerat perspiciatis ad commodi repellat illo, cupiditate quasi. Illum?"; //Body in plain text for non-HTML mail clients
        $mail->send();
        echo "<h3>Email inviata correttamente!</h3>";
    }
    catch (Exception $e) {
        echo "<h3>Email non mandata. Errore mailer: {$mail->ErrorInfo}</h3>";
    }
?>