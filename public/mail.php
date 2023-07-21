<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


define('BASE_MAILER', '/var/www/myProject/public/../PHPMailer/src/');
require BASE_MAILER . "Exception.php";
require BASE_MAILER . 'PHPMailer.php';
require BASE_MAILER . 'SMTP.php';


function send_mail($email, $uniqId=null){

    var_dump($email);
    var_dump($uniqId);
    $mail = new PHPMailer(true);
    $mail ->isSMTP();
    $mail ->Host = 'smtp.gmail.com'; 
    $mail ->SMTPAuth = true;
    $mail ->Username = 'myportfolio1891@gmail.com';
    $mail ->Password = 'smvtlbdrkbcubzvi';
    $mail ->SMTPSecure = 'ssl';
    $mail ->Port = 465;

    $mail ->setFrom('myportfolio1891@gmail.com');

    $mail ->addAddress($email);

    $mail ->isHTML(true);
    
    $mail ->Subject = 'Parolingizni tiklash uchun instruksya yubordik!';

    $mail ->Body = "Salom hurmatli foydalanuvchi siz ushbu<a href='http://localhost:81/$uniqId'> link </a> orqali o'z parolingizni tiklashingiz mumkin!";

    $mail -> send();
    $_SESSION['uniqId'] = '/' . $uniqId;
    // header('Location:/password/send/mail');
    header('Location:/password/send/mail');

}
