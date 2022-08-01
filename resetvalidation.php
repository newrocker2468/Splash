<?php
session_start();

require 'connection.php';

if (isset($_POST['verifyemail']) && $_POST['verifyemail'] == true) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $result = mysqli_query($conn, "SELECT email FROM user_db WHERE email = '$email'");
    if (mysqli_num_rows($result) > 0) {
        echo 1;
        $_SESSION['email'] = $_POST['email'];
    } else {
        echo 0;
    }
}

$otp = "";

if (isset($_POST['validateemail']) && $_POST['validateemail'] == true) {
    $email = $_SESSION['email'];
    $otp = rand(111111, 999999);
    $_SESSION['otp'] = $otp;

    $subject = "Your One Time Password";
    $txt = "The OTP for resetting your password is: " . $otp . " If You did not request it, you can safely disregard this email.";
    $headers = "From: splashapp.helpdesk@gmail.com";
    $sendmail = mail($email, $subject, $txt, $headers);


    if ($sendmail) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['validateotp']) && $_POST['validateotp'] == true) {
    $entered_otp = $_POST['otp'];
    if ($entered_otp == $_SESSION['otp']) {
        echo "1";
    } else {
        echo "0";
    }
}

if (isset($_POST['changepassword']) && $_POST['changepassword'] == true) {

    $password = $_POST['password'];
    $em = $_SESSION['email'];
    $sql = "SELECT * FROM user_db WHERE email = '$em' ";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql2 = "UPDATE user_db SET password = '$encryptedPassword' WHERE email = '$em'";
        $result2 = $conn->query($sql2);
        session_unset();
        session_destroy();
        if ($result2 == true) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
