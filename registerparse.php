<?php
require 'connection.php';
session_start();


if (isset($_POST['verifyEmail']) && $_POST['verifyEmail'] == true) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $result = mysqli_query($conn, "SELECT email FROM user_db WHERE email = '$email'");
    if (mysqli_num_rows($result) > 0) {
        echo 0;
    } else {
        echo 1;
    }
}

if (isset($_POST['validateEmail']) && $_POST['validateEmail'] == TRUE) {
    $email = $_POST['email'];

    $otp = rand(111111, 999999);
    $_SESSION['otp'] = $otp;

    $subject = "Your One Time Password for Splash";
    $txt = "Your OTP for creating splash account is: " . $otp;
    $headers = "From: chatbot9167@gmail.com";
    $sendmail = mail($email, $subject, $txt, $headers);

    if ($sendmail) {
        echo 1;
    } else {
        echo 0;
    }
}



if (isset($_POST['verifyOtp']) && $_POST['verifyOtp'] == TRUE) {
    $userOtp = $_POST['otp'];
    $serverOtp = $_SESSION['otp'];

    if ($userOtp == $serverOtp) {
        echo 1;
    } else {
        echo 0;
    }
}

if (isset($_POST['checkUsername']) && $_POST['checkUsername'] == TRUE) {

    $username = mysqli_real_escape_string($conn, $_POST['user']);
    $result = mysqli_query($conn, "SELECT username FROM user_db WHERE username = '$username'");
    if (mysqli_num_rows($result) > 0) {
        echo 0;
    } else {
        echo 1;
    }
}

if (isset($_POST['submitData']) && $_POST['submitData'] == TRUE) {

    function sanitize($input)
    {
        require 'connection.php';
        $input = mysqli_escape_string($conn, $input);
        $input = htmlspecialchars($input);
        $input = stripslashes($input);
        $input = trim($input);

        return $input;
    }

    $user = sanitize($_POST["username"]);
    $fName = sanitize($_POST["fName"]);
    $lName = sanitize($_POST["lName"]);
    $email = sanitize($_POST["email"]);
    $phone = sanitize($_POST["phone"]);
    $pass = sanitize($_POST["password"]);
    $gender = sanitize($_POST["gender"]);
    $dob = sanitize($_POST["dob"]);


    #################################################################################################################################

    $password = password_hash($pass, PASSWORD_DEFAULT);

    $tokenkey = openssl_random_pseudo_bytes(32);
    $vkey = bin2hex($tokenkey);

    $query = "INSERT into user_db (username, firstName, lastName, email, phone, dob, gender, password, verified, vkey)
                					VALUES ('$user', '$fName', '$lName', '$email', '$phone', '$dob', '$gender', '$password', '1', '$vkey')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo 1;
    } else {
        echo 0;
    }
}
