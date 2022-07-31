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
    <link rel="stylesheet" href="css/registerverification.css">
</head>

</html>

<body>
    <div class="form__main">
        <form action="" method="POST">
            <div class="form-control">
                <input type="number" name="otp" id="otp" autocomplete="off" onkeyup="checkotp()" required>
                <label>
                    <span style="transition-delay:0ms">O</span><span style="transition-delay:50ms">T</span><span style="transition-delay:100ms">P</span>
                </label>
            </div>

            <button type="submit" name="submit" id="submit" value="submit" class="button">
                <span></span>
                <span></span>
                <span></span>
                <span></span> Verify
            </button>
        </form>
        <p id="verify_otp" style="color:red"></p>
    </div>

    <!--    <div class="form__main">
        <h1>Enter the OTP emailed to you</h1>
        <form action="" method="POST">
            <input placeholder="Enter the OTP" type="password" name="otp" /><br />
            <input type="submit" name="submit">
        </form>
        <? /*  if (isset($_GET['check']) && $_GET['check'] == "false") {
            echo '<p style="color:red">Please Recheck Your OTP</p>';
        } */ ?>
    </div> -->
</body>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="js/register.js"></script>


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