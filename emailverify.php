<html>
    <head>
        <title>
            Email verification Phase
        </title>
    </head>
</html>

<body>
    <form action="" method="POST">
        <input type="email" name="email" id="">
        <input type="submit" value="submit" name="submit">
    </form>
</body>

<?php 
session_unset();
session_start();
$email = "";
if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $_SESSION['email'] = $email;
    $_SESSION['verifyFlag'] = FALSE;

    $tokenkey = openssl_random_pseudo_bytes(32);
    $emailtoken = bin2hex($tokenkey);

    $_SESSION['token'] = $emailtoken;

    header("location: sendregisteration.php?token=$token");
    
}

?>