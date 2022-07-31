<?php
session_start();

if (isset($_SESSION['otp'])) {
    $securedOtp = $_SESSION['otp'];
} else {
    die("Invalid Session");
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
            <div class="input-group">
                <input required="" type="text" name="otp" id="otp" autocomplete="off" class="input" onkeyup="checkotp()">
                <label class="user-label">OTP</label>
            </div><br />
            <button type="submit" name="submit" id="submit" class="button" value="submit">VERIFY</button>
        </form>
        <p id="otp_verify"></p>
        <?php if (isset($_GET['check']) && $_GET['check'] == "false") {
            echo '<p style="color:red">Please Recheck Your OTP</p>';
        } ?>

        <p>OR <a href="sendotp.php">Resend OTP</a></p>
    </div>
</body>

<?php
if (!empty($_POST['submit'])) {
    $userOtp = $_POST['otp'];

    if (password_verify($userOtp, $securedOtp) == 1) {

        function keygen($length = 25)
        {
            $random = '';
            for ($i = 0; $i < $length; $i++) {
                $random .= chr(mt_rand(33, 126));
            }
            return $random;
        }

        $decryptedKey = keygen();
        $key = password_hash($decryptedKey, PASSWORD_DEFAULT);
        $_SESSION['key'] = $decryptedKey;

        header("location: resetpassword.php?key=$key");
    } else {
        header("location: ?check=false");
    }
}
?>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="js/forgot.js"></script>