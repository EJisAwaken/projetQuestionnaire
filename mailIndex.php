<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réponse d'envoi d'e-mail</title>
</head>
<body>
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
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'safiry879@gmail.com';
    $mail->Password = 'tmvdxcgqsqhgjosw';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    //Recipients
    $mail->setFrom('safiry879@gmail.com');
    $mail->addAddress($_POST["courrier"]);

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Note';
    $mail->Body = '<p>Message :  </p>' .$_POST["message"]. "<br>";
    $mail->AltBody = 'ça marche';

    $mail->send();

    // Affichage du message de succès
    echo "<div style='background-color: #d4edda; color: #155724; padding: 10px; margin-top: 20px;'>L'e-mail a été envoyé avec succès.</div>";

} catch (Exception $e) {
    // Affichage du message d'erreur
    echo "<div style='background-color: #f8d7da; color: #721c24; padding: 10px; margin-top: 20px;'>Message could not be sent. Mailer Error: {$mail->ErrorInfo}</div>";
}
?>
</body>
</html>
