<html>

<head>
    <title>
        Email verification Phase
    </title>
</head>

</html>

<body>
    <svg width="100%" height="100%" id="svg" viewBox="0 0 1440 400" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150">
        
        <defs>
            <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                <stop offset="5%" stop-color="#002bdcff"></stop>
                <stop offset="95%" stop-color="#32ded4ff"></stop>
            </linearGradient>
        </defs>
        <path d="M 0,400 C 0,400 0,200 0,200 C 92.01913875598089,179.88516746411483 184.03827751196178,159.77033492822966 273,147 C 361.9617224880382,134.22966507177034 447.86602870813385,128.8038277511962 534,125 C 620.1339712918661,121.19617224880382 706.4976076555025,119.01435406698565 817,134 C 927.5023923444975,148.98564593301435 1062.1435406698563,181.13875598086125 1170,195 C 1277.8564593301437,208.86124401913875 1358.9282296650717,204.4306220095694 1440,200 C 1440,200 1440,400 1440,400 Z" stroke="none" stroke-width="0" fill="url(#gradient)" class="transition-all duration-300 ease-in-out delay-150 path-0"></path>
    </svg>
    <form action="" method="POST">
        <input type="email" name="email" id="">
        <input type="submit" value="submit" name="submit">
    </form>
</body>

<?php
session_unset();
session_destroy();
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