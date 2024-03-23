<?php
require_once "connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
    $mail->Username = 'ejquestejquest@gmail.com';                     //SMTP username
    $mail->Password = 'ucbvpnstwvwdnqgo';                               //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('ejquestejquest@gmail.com', "EJ QUEST");
    $mail->addAddress($_SESSION["courrier"]);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Note';
    $mail->Body = '<h1>Bonjour</h1><br><br><h1>Vore note est : </h1>' . $_SESSION["score"] . "/ " . $_SESSION["tb"] . "<br>";
    $mail->AltBody = 'ça marche';

    $mail->send();
//        echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

if ($mail) {
//        echo "L'e-mail a été envoyé avec succès.";
} else {
    echo "Erreur lors de l'envoi de l'e-mail.";
}
?>