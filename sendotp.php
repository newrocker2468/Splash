<?php
session_start();

$email = $_SESSION['forgotPassword'];
$otp = rand(000000, 999999);
$securedOtp = password_hash($otp, PASSWORD_DEFAULT);

$subject = "Your One Time Password";
$txt = "Your OTP for resetting your password is: " . $otp;
$headers = "From: chatbot9167@gmail.com";
$sendmail = mail($email, $subject, $txt, $headers);

if ($sendmail) {
    $_SESSION['otp'] = $securedOtp;
   header("location: forgotVerify.php");
}
