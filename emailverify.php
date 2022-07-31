<html>

<head>
    <title>
        Email Verification Phase
    </title>
    <link rel="stylesheet" href="css/emailVerify.css">
</head>

</html>

<body>
    <div class="form__main">
        <h1>Welcome To Splash</h1>
        <form action="" method="POST">
            <div class="form-control">
                <input type="value" required="" type="email" name="email" id="email" autocomplete="off" onkeyup="validateemail()" required>
                <label>
                    <span style="transition-delay:0ms">E</span><span style="transition-delay:50ms">M</span><span style="transition-delay:100ms">A</span><span style="transition-delay:150ms">I</span><span style="transition-delay:200ms">L</span>
                </label>
            </div>

            <button type="submit" name="submit" id="submit" class="button">
                <span></span>
                <span></span>
                <span></span>
                <span></span> Join The Club!
            </button>
        </form>
        <p id="email_validate" style="color:red"></p>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="js/register.js"></script>
</body>

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

?>