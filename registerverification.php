<?php
session_start();

if (isset($_SESSION['registerotp']) && $_SESSION['token'] == $_GET['token']) {
    $securedOtp = $_SESSION['registerotp'];
} else {
    die("Invalid Session or Token");
}

?>

<html>

<head>
    <title>OTP Verification</title>
    <link rel="stylesheet" href="css/forgotVerify.css">
</head>

</html>

<body>
    <div class="form__main">
        <h1>Enter the OTP emailed to you</h1>
        <form action="" method="POST">
            <input placeholder="Enter the OTP" type="password" name="otp" /><br />
            <input type="submit" name="submit">
        </form>
        <?php if (isset($_GET['check']) && $_GET['check'] == "false") {
            echo '<p style="color:red">Please Recheck Your OTP</p>';
        } ?>
    </div>
</body>

<?php
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