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
    </head>

    </html>

    <body>
        <div class="form__main">
            <h1>Welcome, User</h1>
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
                <label for="remember">Remember You the Next Time You Login?</label>
                <input type="checkbox" name="remember" id="">
                <br>
                <br>
                <button class="fancy" href="#" type="submit" name="submit">
                    <span class="top-key"></span>
                    <span class="text">Login</span>
                    <span class="bottom-key-1"></span>
                    <span class="bottom-key-2"></span>
                </button>
                <?php if (isset($_GET['invalid']) && $_GET['invalid'] == "true") {
                    echo '<p style="color:red">Wronge UserName or Password</p>';
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