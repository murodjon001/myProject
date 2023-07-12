<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


define('BASE_MAILER', '/var/www/myProject/public/../PHPMailer/src/');
require BASE_MAILER . "Exception.php";
require BASE_MAILER . 'PHPMailer.php';
require BASE_MAILER . 'SMTP.php';

if (isset($_POST['email']) and isset($_POST['subject'])){
    $mail = new PHPMailer(true);
    $mail ->isSMTP();
    $mail ->Host = 'smtp.gmail.com'; 
    $mail ->SMTPAuth = true;
    $mail ->Username = 'myportfolio1891@gmail.com';
    $mail ->Password = 'smvtlbdrkbcubzvi';
    $mail ->SMTPSecure = 'ssl';
    $mail ->Port = 465;

    $mail ->setFrom('myportfolio1891@gmail.com');

    $mail ->addAddress('onlinetest887@gmail.com');

    $mail ->isHTML(true);
    
    $mail ->Subject = 'Test uchun';

    $mail ->Body = 'Salom dunyo';

    $mail -> send();

}