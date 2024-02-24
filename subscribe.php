<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/PHPMailer-master/src/SMTP.php';
require './PHPMailer-master/PHPMailer-master/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "merhebmichel980@gmail.com";
    $subject = "New Subscription";
    $confirmationSubject = "Subscription Confirmation";
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "You have a new subscriber:\n\nEmail: $email";

        // Use PHPMailer to send email
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = true;
            $mail->Username = 'merhebmichel980@gmail.com';
            $mail->Password = 'oixg nafq njhm tszy'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
            $mail->Port = 587;

            // Send the new subscription email
            $mail->setFrom('merhebmichel980@gmail.com', 'LineaM Design');
            $mail->addAddress($to);
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->send();

            // Send the subscription confirmation email to the user
            $confirmationMessage = "Thank you for subscribing to LineaM Design! We appreciate your interest.";
            $mail->clearAddresses();
            $mail->addAddress($email);
            $mail->Subject = $confirmationSubject;
            $mail->Body = $confirmationMessage;
            $mail->send();

            // Add the redirection header
            header("Location: index.html");
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Invalid email address. Please try again.";
    }
} else {
    echo "Invalid request.";
}
?>
