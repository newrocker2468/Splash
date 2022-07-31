<?php
require 'connection.php';

if (isset($_COOKIE['logkey'])) {
    $vkey = $_COOKIE['logkey'];
    $sql = "SELECT * FROM user_db WHERE vkey = '$vkey' ";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['vkey'] = $vkey;
        header("location: home.php");
    }
}

?>

<html>

<head>
    <title>Welcome, Please Login</title>
    <link rel="stylesheet" href="css/login.css" />
    <!-- CSS only -->

</head>

</html>
<svg width="100%" " id="svg" viewBox="0 100 1440 400" class="wave">
    <defs>
        <linearGradient id="gradient" x1="87%" y1="17%" x2="13%" y2="83%">
            <stop offset="5%" stop-color="#c3083fff"></stop>
            <stop offset="95%" stop-color="#6f2232ff"></stop>
        </linearGradient>
    </defs>
    <path d="M 0,400 C 0,400 0,200 0,200 C 40.832862696053255,207.82465987184804 81.66572539210651,215.64931974369605 109,230 C 136.3342746078935,244.35068025630395 150.1699611276272,265.22738089706377 187,267 C 223.8300388723728,268.77261910293623 283.65443009738465,251.44115666804885 326,231 C 368.34556990261535,210.55884333195115 393.21231848283423,187.0079924307408 421,178 C 448.78768151716577,168.9920075692592 479.4962959712785,174.52687360898787 510,195 C 540.5037040287215,215.47312639101213 570.8024976320515,250.88451313330785 612,254 C 653.1975023679485,257.11548686669215 705.2937135005154,227.9350738577808 734,214 C 762.7062864994846,200.0649261422192 768.0226483658873,201.37519143556887 803,179 C 837.9773516341127,156.62480856443113 902.6156930359354,110.56416039994377 944,127 C 985.3843069640646,143.43583960005623 1003.5145794903708,222.36816696465596 1032,224 C 1060.4854205096292,225.63183303534404 1099.325989002581,149.9631717414324 1137,130 C 1174.674010997419,110.03682825856758 1211.181464499305,145.77914606961437 1242,185 C 1272.818535500695,224.22085393038563 1297.9481530001985,266.92024398011023 1330,270 C 1362.0518469998015,273.07975601988977 1401.0259234999007,236.53987800994489 1440,200 C 1440,200 1440,400 1440,400 Z" stroke="none" stroke-width="0" fill="url(#gradient)" class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 200)"></path>
</svg>

<body>
    <div class="form__main">
        <h1 id="welcome">Welcome to Splash</h1>
        <form action="" method="POST">
            <br>
            <br>
            <div class="input-group">
                <input required="" type="text" name="username" autocomplete="off" class="input" id="input1">
                <label class="user-label">Username</label>
            </div>
            <div class="input-group">
                <input required="" type="password" name="pass" autocomplete="off" class="input">
                <label class="user-label">Password</label>
            </div>
            <label class="container">
                <input  type="checkbox" checked="checked" name="remember" class="box">
                <div class="checkmark" id="checkmark">
                    <div id="checktext">Remember&nbsp;Me&nbsp;Next&nbsp;Time</div>
                </div>
            </label>
            <button class="fancy" href="#" type="submit" name="submit">
                <span class="top-key"></span>
                <span class="text">Login</span>
                <span class="bottom-key-1"></span>
                <span class="bottom-key-2"></span>
            </button>
            <?php if (isset($_GET['invalid']) && $_GET['invalid'] == "true") {
                echo '<p style="color:red">Wrong Username or Password</p>';
            }
            ?>
            <p> <a href="forgot.php" class="cta">
                    <span class="hover-underline-animation">Forgot Your Password?</span>
                </a></p>

            <p><a href="emailverify.php" class="cta">
                    <span class="hover-underline-animation">Or Create a New Account</span>
                </a></p>
        </form>
    </div>
</body>

<?php
session_unset();
session_start();
$username = $password = "";

if (isset($_POST['submit'])) {
    function sanitize($input)
    {
        htmlspecialchars($input);
        stripslashes($input);
        trim($input);

        return $input;
    }

    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['pass']);

    echo $username . $password;

    $username = $_POST['username'];
    $password = $_POST['pass'];

    $sql = "SELECT * FROM user_db WHERE username = '$username' ";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['password']) == 1) {
                if (isset($_POST['remember'])) {
                    setcookie("logkey", $row['vkey'], time() + 2592000, "", "localhost");
                }
                $_SESSION['vkey'] = $row['vkey'];
                header("location: home.php");
            } else {
                header("location: ?invalid=true");
            }
        }
    }
}

?>