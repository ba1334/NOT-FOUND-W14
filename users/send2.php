<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\xampp\htdocs\Students Grievance Support System');

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
require(__DIR__ . '/PHPMailer/PHPMailerAutoload.php'); // Include the PHPMailer library

// Retrieve form data (replace with your actual form fields)
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Customize the email content
$subject = "Thank you for contacting us!";
$body = "Dear $name,\n\nThank you for your email. We have received your message and will respond as soon as possible.\n\nIn the meantime, you can find more information about our services on our website:\nhttp://www.yourwebsite.com\n\nSincerely,\nThe YourCompany Team";

// Set up email configuration
$mail = new PHPMailer();

try {
    // Configure SMTP settings (recommended for reliable delivery)
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP server
    $mail->SMTPAuth = true;
    $mail->Username = 'monishpk1401@gmail.com'; // Replace with your SMTP username
    $mail->Password = 'qzkyzrouovbpczat'; // Replace with your SMTP password
    $mail->SMTPSecure = 'tls'; // Or 'ssl'
    $mail->Port = 587; // Or 465 for SSL

    // Set email headers
    $mail->setFrom('noreply@yourdomain.com', 'YourCompany');
    $mail->addAddress($email, $name);
    $mail->Subject = $subject;
    $mail->Body = $body;

    // Send the email
    if (!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $e->getMessage();
}

?>
