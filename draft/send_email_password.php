<?php
echo "here";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming you've obtained the user's email address from the form
    $user_email = $_POST['email'];
    echo $user_email;

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'your-smtp-server.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'your-email@example.com';
        $mail->Password = 'your-email-password';
        $mail->Port = 587; // Adjust the port accordingly
        $mail->SMTPSecure = 'tls';

        // Recipients
        $mail->setFrom('your-email@example.com', 'Your Name');
        $mail->addAddress($user_email); // The user's email address

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Hello from Your Website';
        $mail->Body = 'Hello! This is a test email from your website.';
        $mail->AltBody = 'Hello! This is a test email from your website in plain text.';

        // Send the email
        $mail->send();

        echo 'Email has been sent successfully.';
    } catch (Exception $e) {
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
else{
    echo "hi";
}
