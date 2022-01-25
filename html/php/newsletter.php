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
    
        $mail->setFrom('from@gfg.com', 'Name');         // creiamo una mail apposita?  
        $mail->addAddress(<?php echo $user['email']; ?>); //'receiver1@gfg.com'
        $mail->addAddress('receiver2@gfg.com', 'Name');
 
                // /// Get get recipients email address from database using id
                // $id= (int) $_GET["id"];
                // $result = mysqli_query($conx, "SELECT email from mytable where id='$id'");
                // $row = mysqli_fetch_array($result);
                // $to = $row["email"];


    if ($_GET["submit"]) {  
        $name =  htmlspecialchars($_GET['name']);
        $email = htmlspecialchars($_GET['email']);
        $message = $_GET['message'];
        $subject = 'Hello There';
        $body = "E-Mail: $email\n Message: $message";
        if (mail($to, $subject, $body)) {

        $result='<div class="alert alert-success">Your email has been sent</div>';
             }else{
        $result='<div class="alert alert-danger">Sorry there was an error sending your message.</div>';
    }
}
?> 



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