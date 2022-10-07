<?php

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require_once "phpMailer/PHPMailer.php";
require_once "phpMailer/Exception.php";
require_once "phpMailer/SMTP.php";


$mailer = new PHPMailer(true);

try{
    //Server settings
    // $mailer->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mailer->isSMTP();                                            //Send using SMTP
    $mailer->Host       = 'in-v3.mailjet.com';                    //Set the SMTP server to send through
    $mailer->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mailer->Username   = '3d4755f5c29f3ee64e1b8fc81327f75f';               //SMTP username
    // $mailer->Username   = 'JamsJam971@hotmail.com ';               //SMTP username
    // $mailer->Password   = 'Yekrea.2022';                          //SMTP password
    $mailer->Password   = 'fc7a1bc2eec6b2967a1e9e0547ff0250';                          //SMTP password
    $mailer->SMTPSecure = 'tls';            //Enable implicit TLS encryption
    $mailer->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mailer->setFrom('jamsjam971@hotmail.com', 'Mailer');
    $mailer->CharSet = 'utf-8';

    // $mailer->addAddress('contact@feelingguadeloupe.fr', 'Joe User');
    
    
}catch(Exception $err){
    echo  "Message non envoyer. Erreur: {$mailer->ErrorInfo}";
}

