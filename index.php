<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
require './PHPMailer-master/PHPMailer-master/src/SMTP.php';
require './PHPMailer-master/PHPMailer-master/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $first_name = $_POST["first-name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $details = $_POST["details"];

    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = SMTP::DEBUG_OFF;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'merhebmichel980@gmail.com'; 
        $mail->Password = 'oixg nafq njhm tszy'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom($email, $first_name);
        $mail->addAddress('merhebmichel980@gmail.com'); 

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Form Submission from LineaM Design';
        $mail->Body = "First Name: $first_name<br>Email: $email<br>Phone: $phone<br><br>Project Details:<br>$details";

        // Send email
        $mail->send();

        // Redirect back to the form page or a thank you page
        header("Location: Thankyou.html");
        exit();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
