<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

try {
    // Retrieve form input
    $email = $_POST["email"];
    $name = "Sophie";
    $subject = "Welcome to STOREROOM!";
    $message = "Your registration is now complete";

    // Initialize PHPMailer
    $mail = new PHPMailer(true);
    // Enable SMTP debugging (for debugging purposes)
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;

    // Set as SMTP mailer and enable SMTP authentication
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    echo $email;
    // SMTP server settings for Gmail
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS encryption
    $mail->Port = 587; // Port for TLS

    // Your Gmail email address and application-specific password (if using 2FA)
    $mail->Username = "sofi1103@gmail.com";
    $mail->Password = "anqnoarjlaohreah";
    
    // Set the sender and recipient
    $mail->setFrom($email, $name);
    $mail->addAddress($email);

    // Email subject and body
    $mail->Subject = $subject;
    $mail->Body = $message;
    // Send the email
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

    $mail->send();
    // Redirect to a success page
    header("Location: home_page.php");

} catch (Exception $e) {
    // Handle exceptions (e.g., log errors or display an error page)
    echo "Message could not be sent. Mailer Error: " . $mail->ErrorInfo;
}
?>
