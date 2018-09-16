<?php
//require 'PHPMailerAutoload.php';
// $mail = new PHPMailer();
// $mail->setFrom('jahidrahmanragib@g,ail.com', 'BrandBucket');
// $mail->addAddress($_REQUEST['send_email'], $_REQUEST['username']);
// $mail->Subject  = 'First PHPMailer Message';
// $mail->Body     = 'Hi! This is my first e-mail sent through PHPMailer.';
// if(!$mail->send()) {
//   echo 'Message was not sent.';
//   echo 'Mailer error: ' . $mail->ErrorInfo;
// } else {
//   echo 'Message has been sent.';
// }
?>

<?php
$to = "jahidrahmanragib@gmail.com.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From:".$_REQUEST['send_email']. "\r\n" .
"CC: jahidrahmanragib@gmail.com";

mail($to,$subject,$txt,$headers);
?>