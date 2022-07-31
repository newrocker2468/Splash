<?php
require 'connection.php';
session_start();
$flag = 0;
if (isset($_SESSION['key'])) {
    if (!isset($_GET['key'])) {
        die("Key not found");
    } else {
        if (!password_verify($_SESSION['key'], $_GET['key']) == 1) {
            die("Invalid Signature");
        }
    }
}


if (isset($_SESSION['key'])) {
    if (isset($_GET['key'])) {
        if (password_verify($_SESSION['key'],  $_GET['key']) == 1) {

            if (isset($_POST['submit'])) {
                $pass = $_POST['pass'];
                $cpass = $_POST['conpass'];
                $email = $_SESSION['forgotPassword'];

                $sql = "SELECT * FROM user_db WHERE email = '$email' ";
                $result = $conn->query($sql);
                if (mysqli_num_rows($result) > 0) {
                    $encryptedPassword = password_hash($pass, PASSWORD_DEFAULT);
                    $sql2 = "UPDATE user_db SET password = '$encryptedPassword' WHERE email = '$email'";
                    $result2 = $conn->query($sql2);

                    session_unset();
                    session_destroy();
                    header("location: login.php");
                }


            }
        } else {
            die("Key Invalid");
        }
    } else {
        die("Key Invalid");
    }
} else {
    die("Session Invalid");
}

?>

<html>

<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/resetpassword.css">
</head>

</html>

<body>
    <svg width="100%" height="60%" id="svg" viewBox="0 100 1440 400" class="wave">
        <defs>
            <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                <stop offset="5%" stop-color="#eb144cff"></stop>
                <stop offset="95%" stop-color="#bc093dff"></stop>
            </linearGradient>
        </defs>
        <path d="M 0,400 C 0,400 0,200 0,200 C 44.37886277723439,172.1252874778609 88.75772555446878,144.2505749557218 132,135 C 175.24227444553122,125.7494250442782 217.34796055935925,135.1229876549737 263,157 C 308.65203944064075,178.8770123450263 357.8504322080943,213.2574744243834 409,215 C 460.1495677919057,216.7425255756166 513.2503106082635,185.84711464749267 568,177 C 622.7496893917365,168.15288535250733 679.1483253588516,181.35406698564594 733,192 C 786.8516746411484,202.64593301435406 838.1563879563298,210.73661740992355 879,223 C 919.8436120436702,235.26338259007645 950.2261228158293,251.6994633746597 989,246 C 1027.7738771841707,240.3005366253403 1074.9391207803537,212.46552909143776 1132,215 C 1189.0608792196463,217.53447090856224 1256.017394062756,250.43842025958924 1309,253 C 1361.982605937244,255.56157974041076 1400.991302968622,227.78078987020538 1440,200 C 1440,200 1440,400 1440,400 Z" stroke="none" stroke-width="0" fill="url(#gradient)" class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 200)"></path>
    </svg>
    <div class="form__main">
        <form action="" method="POST">
            <h1>Reset password</h1>
            <div class="input-group">
                <input required type="password" name="pass" autocomplete="off" class="input" id="pass" onkeyup="verifyPassword()">
                <label class="user-label">Create a New Password</label>
            </div>
            <div class="input-group">
                <input required type="password" name="conpass" autocomplete="off" class="input" id="conpass" onkeyup="verifyPassword()">
                <label class="user-label">Confirm Password</label>
            </div>
            <button type="submit" name="submit" id="submit" class="button" value="submit">RESET</button>
        </form>
        <p onclick="showPass()">SHOW PASSWORD</p>
        <p>Make Sure Your Password is: </p>
        <p>Atleast 8 Characters | Not Reused Anywhere | Strong and difficult to guess</p>

        <p id="message" style="color: red;">&nbsp;</p>
    </div>

</body>

<script src="js/forgot.js"></script>