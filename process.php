<?php
//  formally it was showing   "use" because we already started with a require  that is why
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";
require "PHPMailer/src/Exception.php";

$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

send("Test Email", $message, $email);


function send($title, $message, $email)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $username = "email@alwaysdata.net";   //username  emailor hosting name
    $password = "9900.7Password";  //hosting password
    $host = "smtp-email.alwaysdata.net"; //hostingname
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;   //or set to " 0 "                   //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $host;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $username;                     //SMTP username
        $mail->Password   = $password;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                      //or 587              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom($username, 'MMS');
        $mail->addAddress($email, "A test user");     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo($username, 'MMS');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject'; //message you want to send 
        $mail->Body    = $message; //we want the body to be message 
        $mail->AltBody = $message; //same here as well

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
