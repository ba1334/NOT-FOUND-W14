<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
error_reporting(0);
include('includes/config.php');
require 'PHPMailer/PHPMailerAutoload.php';
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    if (isset($_POST['submit'])) {
        try {
            // Your existing code...

            // After inserting the complaint, retrieve the recipient email from the database
            $uid = $_SESSION['id'];
            $recipientQuery = mysqli_query($bd, "SELECT userEmail FROM users WHERE id = $uid ");
            $recipientRow = mysqli_fetch_array($recipientQuery);
            $recipientEmail = $recipientRow['userEmail'];

            // Create a new PHPMailer instance
            $mail = new PHPMailer;

            // Set up SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Change this to your SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'monishpk1401@gmail.com'; // Change this to your SMTP username
            $mail->Password = 'qzkyzrouovbpczat'; // Change this to your SMTP password
            $mail->SMTPSecure = 'ssl'; // Change this to 'ssl' if your server requires SSL
            $mail->Port = 80; // Change this to your SMTP port

            // Set email parameters
            $mail->setFrom('monishpk1401@gmail.com', 'Name'); // Change this to your email and name
            $mail->addAddress($recipientEmail); // Use the retrieved email address
            $mail->Subject = 'New Complaint Registered';
            $mail->Body = 'A new complaint has been registered ';

            // Check if the email is sent successfully
            if ($mail->send()) {
                echo  
                alert("Your complaint has been successfully filled, and an email has been sent.");
            } else {
                throw new Exception($mail->ErrorInfo);
            }
        } catch (Exception $e) {
            echo '<script> alert("There was an error sending the email. Error: ' . $e->getMessage() . '")</script>';
        }
    }
}
?>
