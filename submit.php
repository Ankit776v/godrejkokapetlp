<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['submit'])){
    $Name = htmlspecialchars($_POST['Name']);
    $Email = htmlspecialchars($_POST['Email']);
    $Number = htmlspecialchars($_POST['Number']);
    $Location = htmlspecialchars($_POST['Location']);  
    //Load Composer's autoloader
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings                  //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'ankit786v@gmail.com';                     //SMTP username
        $mail->Password   = 'jehy ifnj owdn mohy';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
        //Recipients
        $mail->setFrom('ankit786v@gmail.com', 'Contact Form');
        $mail->addAddress('av310437@gmail.com', 'host');     //Add a recipient
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'New Contact Form Submission';
        $mail->Body    = "
            <h3>Contact Form Details:</h3>
            <p><strong>Name:</strong> $Name</p>
            <p><strong>Email:</strong> $Email</p>
            <p><strong>Phone Number:</strong> $Number</p>
            <p><strong>Location:</strong> $Location</p>
        ";
        
        $mail->send();
        header('Location: thanks.php');
        exit; 
        // echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}