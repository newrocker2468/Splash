<?php
session_start();

if(isset($_SESSION['otp'])) {
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