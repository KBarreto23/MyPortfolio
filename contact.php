<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'kbarreto2335@gmail.com';                     // SMTP username
    $mail->Password   = 'Kbb1741997';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($_POST['email'] , $_POST['name']);
    $mail->addAddress('Kbarreto2335@gmail.com', 'Kevin');     // Add a recipient
   // $mail->addAddress('ellen@example.com');               // Name is optional
 //   $mail->addReplyTo('info@example.com', 'Information');
  ///  $mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

    // Attachments
  //  $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);
    $mail->email = $_POST['email'];                                  // Set email format to HTML
    $mail->Subject =$_POST['subject'];
    $mail->Body    = $_POST['message']."<br><br>this is my Emil ".$_POST['email'];
  

    $mail->send();
    header ("Location: http://kevinbarreto.com");
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}