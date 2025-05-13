<?php
include 'db_connection.php'; // Ensure this file defines $mysqli

// Base files 
require './assets/src_mail/Exception.php';
require './assets/src_mail/PHPMailer.php';
require './assets/src_mail/SMTP.php';

// Retrieve user input
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$message = mysqli_real_escape_string($conn, $_POST['message']);

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

// Create PHPMailer object
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                     
    $mail->Host = 'mail.grj.com.ph'; 
    $mail->SMTPAuth = true;                             
    $mail->Username = 'kansai@grj.com.ph';              
    $mail->Password = 'Grj1td2020';                     
    $mail->SMTPSecure = 'tls';                          
    $mail->Port = 587;                                  

    $mail->setFrom($email, $name); 
    $mail->addAddress("kansai@grj.com.ph", "Kansai Ueno");  
    $mail->addReplyTo($email, $name); 

    $mail->Subject = 'Kansai Ueno - Inquiries';
    $mail->Body    = "Name: " . $name . "\n" . 
                     "Email: " . $email . "\n" .
                     "Phone: " . $phone . "\n" .
                     "Message: " . $message;

    $mail->send();
    echo 'Message has been sent';

    // Auto-response email
    $autoResponse = new PHPMailer(true);

    $autoResponse->isSMTP(); 
    $autoResponse->Host = 'mail.grj.com.ph'; 
    $autoResponse->SMTPAuth = true;                              
    $autoResponse->Username = 'kansai@grj.com.ph';              
    $autoResponse->Password = 'Grj1td2020';                         
    $autoResponse->SMTPSecure = 'tls';                          
    $autoResponse->Port = 587;   

    $autoResponse->setFrom('kansai@grj.com.ph', 'Kansai Ueno');
    $autoResponse->addAddress($email, $name); 

    $autoResponse->Subject = 'Auto Response';
    $autoResponse->Body    = "<html>
                  <head>
                  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css'>
                  </head>
                  <body style='font-family: Arial, sans-serif;'>
                    <p>Dear ".$name .",</p>
                    <p>Thank you for your recent inquiry. We appreciate your interest, and we are excited to assist you.</p>
                    <p>Please be assured that your inquiry has been received, and our team is working to provide you with a timely and accurate response. We understand the importance of your inquiry and are committed to delivering exceptional customer service.</p>
                    <p>We will respond to your inquiry as soon as possible, typically within Monday to Friday from 8am to 5pm. In the meantime, please feel free to contact us if you have any further questions or concerns.</p>
                    <p>Once again, thank you for your inquiry. We look forward to the opportunity to serve you.</p>
                    <p>Best regards,</p>
                    <p>Kansai Ueno</p>
                    <ul style='list-style: none; padding-left: 0;'>
                      <li><box-icon type='solid' name='envelope'></box-icon> Email: <a href='mailto:kansai@grj.com.ph'>kansai@grj.com.ph</a></li>
                      <li><box-icon type='solid' name='phone'></box-icon> Phone: +123456789</li>
                      <li><box-icon name='facebook-circle' type='logo' color='#00240b' ></box-icon> Facebook: <a href='https://www.facebook.com/yourpage/'>https://www.facebook.com/yourpage/</a></li>
                      <li><box-icon name='twitter' type='logo' color='#00240b' ></box-icon> Twitter: <a href='https://twitter.com/yourpage/'>https://twitter.com/yourpage/</a></li>
                    </ul>
                  </body>
                </html>";
                
    $autoResponse->isHTML(true); 
    $autoResponse->send();

} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>