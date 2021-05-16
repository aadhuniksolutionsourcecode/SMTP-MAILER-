<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'YOUR_GMAIL_ADDRESS@gmail.com';                     //SMTP username
    $mail->Password   = 'YOUR_GMAIL_PASSWORD';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('sendermail@gmail.com', 'enter mail receiver personame');
    $mail->addAddress('enterreceivermail@gmail.com', 'username');     //Add a recipient
    $mail->addAddress('noname@example.com');               //Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    //Attachments
    $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here will be enter mail subject';
    $mail->Body    = 'Body part in the enter HTML Code mail example of <b>Aadhuniksolution send mailer libarary demo</b> thanks you...';
    $mail->AltBody = 'if not supported in user html entity so you can enter here alternate way to describe your message heer';

    $mail->send();
    echo 'mail has been sent';
    } catch (Exception $e) {
        echo "mail could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>