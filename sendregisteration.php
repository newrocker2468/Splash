<?php


if ($_SESSION['token'] != $_GET['token']) {
    die("Invalid Token or Session");
}

session_start();

$token = $_SESSION['token'];

$email = $_SESSION['email'];

$otp = rand(000000, 999999); 
$securedOtp = password_hash($otp, PASSWORD_DEFAULT);

$subject = "Your One Time Password for Splash";
$txt = "Your OTP for creating splash account is: " . $otp;
$headers = "From: chatbot9167@gmail.com";
$sendmail = mail($email, $subject, $txt, $headers);

if ($sendmail) {
    $_SESSION['registerotp'] = $securedOtp;
    header("location: registerverification.php?token=$token");
}
