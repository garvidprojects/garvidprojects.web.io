<?php


require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->isSMTP(); 
$mail->Host = 'smtp.gmail.com'; 
$mail->SMTPAuth = true;
$mail->Username = 'saksrivastava2@gmail.com';                 // SMTP username(sender)
$mail->Password = 'sankalp37';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom('saksrivastava2@gmail.com', 'Mailer'); // sender mail
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->addAddress('srivastavasankalp.cs@gmail.com');               // reciever is optional

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);             

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

?>