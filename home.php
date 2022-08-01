<?php
session_start();
require 'connection.php';

if (isset($_SESSION['vkey'])) {
    if (time() > $_SESSION['expiry']) {
        $sessid = session_id();
        $expiresql =    "UPDATE user_login
                    SET status='expired'
                    WHERE sessid='$sessid'";
        $result = $conn->query($expiresql);

        setcookie("logkey", "expired", time() - 2592000, "", "localhost");
        setcookie("expiry", "expired", time() - 2592000, "", "localhost");
        setcookie("sessid", "expired", time() - 2592000, "", "localhost");
        session_unset();
        session_destroy();
        session_regenerate_id();

        header("location: index.php?expired=true");
    } else {
        $vkey = $_SESSION['vkey'];
    }
} else if (isset($_COOKIE['logkey'])) {
    if (time() > $_COOKIE['expiry']) {
        $sessid = $_COOKIE['sessid'];
        $expiresql =    "UPDATE user_login
                    SET status='expired'
                    WHERE sessid='$sessid'";
        $result = $conn->query($expiresql);

        setcookie("logkey", "expired", time() - 2592000, "", "localhost");
        setcookie("expiry", "expired", time() - 2592000, "", "localhost");
        setcookie("sessid", "expired", time() - 2592000, "", "localhost");
        session_unset();
        session_destroy();
        session_regenerate_id();
        header("location: index.php?expired=true");
    } else {
        session_destroy();
        session_id($_COOKIE['sessid']);
        session_start();
        $vkey = $_COOKIE['logkey'];
    }
}


?>
<html>

<head>
    <title>
        Splash home
    </title>
</head>

<body>
    <h1>
        Welcome to Splash
    </h1>
    <?php
    $sql = "SELECT * FROM user_db WHERE vkey = '$vkey' ";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "First Name: " . $row["firstName"] . "<br>";
            echo "Last  Name: " . $row["lastName"] . "<br>";
            echo "Phone Number: " . $row["phone"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "Gender: " . $row["gender"] . "<br>";
            echo "Date of Birth: " . $row["dob"] . "<br>";
        }
    }
    ?>

    <form action="" method="post">
        <input type="submit" value="submit" name="submit">
    </form>
</body>

</html>

<?php

if (isset($_POST['submit'])) {
    $sessid = session_id();
    $expiresql =    "UPDATE user_login
                SET status='loggedOut'
                WHERE sessid='$sessid'";
    $result = $conn->query($expiresql);
    
    setcookie("logkey", "expired", time() - 2592000, "", "localhost");
    setcookie("expiry", "expired", time() - 2592000, "", "localhost");
    setcookie("sessid", "expired", time() - 2592000, "", "localhost");
    session_unset();
    session_destroy();
    session_regenerate_id();
    header("location: index.php");
}

?>