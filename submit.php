<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;

        // Enter Gmail login
        $mail->Username   = 'dileepkrmuz1121@gmail.com';
        $mail->Password   = 'ylor femq pvug dnps';

        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom($email, $name);
        $mail->addAddress('dileepkrmuz1121@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "
            <h3>Message from Portfolio</h3>
            <p><b>Name:</b> $name</p>
            <p><b>Email:</b> $email</p>
            <p><b>Message:</b><br>$message</p>
        ";

        $mail->send();
        echo "Message sent successfully!";

    } catch (Exception $e) {
        echo "Message failed: " . $mail->ErrorInfo;
    }
}
?>
