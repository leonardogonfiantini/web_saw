<?php
    session_start();
    $db = mysqli_connect("localhost","enrico","123","users")// temp
		or die ('Unable to connect. Check your connection parameters.');

    //  
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'vendor/autoload.php'; // :)
    
    $mail = new PHPMailer(true);
    
    try { // PRENDERE I DATI DAL DB!!!
        $mail->SMTPDebug = 2;                                       
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gfg.com;';                    
        $mail->SMTPAuth   = true;                             
        $mail->Username   = 'user@gfg.com';                 
        $mail->Password   = 'password';                        
        $mail->SMTPSecure = 'tls';                              
        $mail->Port       = 587;  
    
        $mail->setFrom('from@gfg.com', 'Name');           
        $mail->addAddress('receiver1@gfg.com');
        $mail->addAddress('receiver2@gfg.com', 'Name');
        
        $mail->isHTML(true);                                  
        $mail->Subject = 'Lorem Ipsum';
        $mail->Body    = 'HTML message body in <b>bold</b> ';
        $mail->AltBody = 'Body in plain text for non-HTML mail clients';
        $mail->send();
        echo "Email inviata correttamente!"; // DA AGGIUNGERE UN PO' DI HTML
    }
    catch (Exception $e) {
        echo "Email non mandata. Errore mailer: {$mail->ErrorInfo}";
    }



?>