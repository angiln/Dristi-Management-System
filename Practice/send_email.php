<?php
ini_set("SMTP", "eyethird603@gmail.com");
ini_set("smtp_port", "587");

$receiver = "receiver email address here";
$subject = "Email Test via PHP using Localhost";
$body = "Hi, there...This is a test email send from Localhost.";
$sender = "From:sender email address here";

if(mail($receiver, $subject, $body, $sender)){
    echo "Email sent successfully to $receiver";
}else{
    echo "Sorry, failed while sending mail!";
}
?>