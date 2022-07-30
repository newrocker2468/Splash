<?php
session_start();

if (isset($_SESSION['email']) && isset($_SESSION['verifyFlag']) && isset($_SESSION['token']) && isset($_SESSION['verifykey'])) {
    if ($_SESSION['token'] == $_GET['token'] && $_SESSION['verifykey'] == $_GET['key']) {
        $email = $_SESSION['email'];
        $verifyFlag = $_SESSION['verifyFlag'];
        $token = $_SESSION['token'];
    } else {
        die("Invalid Token or Key");
    }
} else {
    die("Invalid Session");
}

?>

<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css" />
</head>

</html>

<body>
    <div class="form__main">
        <form action="registerparse.php" method="POST">
            <h1>Welcome, Let's Start With Your Name</h1>
            <label for="fname">Enter Your First Name</label>
            <input type="text" name="fname" id="fname"><br>
            <label for="lname">Enter Your Last Name</label>
            <input type="text" name="lname" id="lname">


            <h1>Personal Identifiers</h1>
            <label for="email">Enter Your email</label>
            <input type="email" name="email" id="email" onkeyup="checkemail()" autocomplete="off">
            <p id='email_verify'></p>

            <label for="phone">Enter Your Phone number</label>
            <input type="number" name="phone" id="phone" onkeyup="checkphone()" autocomplete="off">
            <p id='phone_verify'></p>

            <label for="gender">What's Your Gender</label>
            <select name="gender" id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <label for="dob">Enter Your Date Of Birth</label>
            <input type="date" name="dob" id="dob" />

            <h1>Pick a Nice Username</h1>
            <label for="username">Enter Your username</label>
            <input type='text' id='username' name="username" onkeyup="checkusername()" autocomplete="off">
            <p id='username_verify'></p>

            <h1>Now, Create a Strong Password for Your Account</h1>
            <label for="pass">Enter Your password</label>
            <input type="password" onkeyup="verifyPassword()" name="pass" id="pass" autocomplete="off"><br>
            <p id="message"></p>
            <label for="cpass">Confirm your password</label>
            <input type="password" name="conpass" id="conpass" onkeyup="confirmPassword()" autocomplete="off">
            <p id="message2"></p>
            <a onclick="showPass()">SHOW PASSWORD</a>

            <input type="submit" value="submit">
        </form>
    </div>
</body>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="js/register.js"></script>