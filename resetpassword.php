<?php
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

            // Left to Code

        }  else {
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
    <div class="form__main">
        <form action="" method="POST">
            <h1>Reset password</h1>
            <label for="pass">Enter Your New Password </label><br>
            <input type="password" name="pass" id="pass" onkeyup="verifyPassword()"><br>
            <p id="message"></p>
            <label for="conpass">Confirm Your New Password</label><br>
            <input type="password" name="conpass" id="conpass" onkeyup="confirmPassword()"><br>
            <p id="message2"></p>
            <input type="submit" value="Change Password">
        </form>
    </div>
</body>

<script>
    function verifyPassword() {
        var pw = document.getElementById("pass").value;
        var cpw = document.getElementById("conpass").value;
        if (pw.length < 8) {
            document.getElementById("message").innerHTML = "Password length must be atleast 8 characters";
            return false;
        } else {
            document.getElementById("message").innerHTML = "";
            return true;
        }
    }

    function confirmPassword() {
        var pw = document.getElementById("pass").value;
        var cpw = document.getElementById("conpass").value;
        if (cpw != pw) {
            document.getElementById("message2").innerHTML = "Passwords and Confirm Passwords Fields Do not Match";
        } else {
            document.getElementById("message2").innerHTML = "";
        }
    }
</script>