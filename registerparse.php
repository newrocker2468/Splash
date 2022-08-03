<?php
if (session_status() === PHP_SESSION_ACTIVE) {

    session_unset();
    session_destroy();
}

session_start();
$email = "";
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $_SESSION['email'] = $email;
    $_SESSION['verifyFlag'] = FALSE;

    $tokenkey = openssl_random_pseudo_bytes(32);
    $emailtoken = bin2hex($tokenkey);

    $_SESSION['token'] = $emailtoken;

    header("location: sendregisteration.php?token=$token");
}










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












if (!empty($_POST['submit'])) {
    $userOtp = $_POST['otp'];

    if (password_verify($userOtp, $securedOtp) == 1) {

        $key = openssl_random_pseudo_bytes(32);
        $verificationkey = bin2hex($key);
        $token = $_SESSION['token'];

        $_SESSION['verifykey'] = $verificationkey;
        $_SESSION['verifyFlag'] = TRUE;
        header("location: register.php?token=$token&key=$verificationkey");
    } else {
        header("location: ?check=false?token=$token&key=$verificationkey");
    }
}



?>