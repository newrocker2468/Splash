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
            <!-- <label for="username">Enter Your Username</label> --><br>
            <!-- <input type="text" class="username" name="username" /> --><br>
            <div class="input-group">
                <input required="" type="text" name="username" autocomplete="off" class="input" id="input1">
                <label class="user-label">Username</label>
            </div>
            <div class="input-group">
                <input required="" type="password" name="pass" autocomplete="off" class="input">
                <label class="user-label">Password</label>
            </div>
            <!-- <label for="password"></label> --><br>
            <!-- <input type="Password" class="pass" name="pass"> --><br>
            <button class="fancy" href="#" type="submit" name="submit">
                <span class="top-key"></span>
                <span class="text">Login</span>
                <span class="bottom-key-1"></span>
                <span class="bottom-key-2"></span>
            </button>
            <?php if ( isset($_GET['invalid']) && $_GET['invalid'] == "true") {
                echo '<p style="color:red">Wronge UserName or Password</p>';
            }
            ?>
            <!-- <p><a href="forgot.php">Forgot Your Password?</a></p> -->
            <p> <a href="forgot.php" class="cta">
                    <span class="hover-underline-animation">Forgot Your Password?</span>
                </a></p>
        </form>
    </div>
</body>

<?php
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

        // ServerName, UserName, Password, Database Name
        $connect = mysqli_connect("localhost", "root", "", "splash");

        $sql = "SELECT * FROM user_db WHERE username = '$username' ";
        $result = $connect->query($sql);

        if (mysqli_num_rows($result) > 0) {
            header("location: home.php");
        } else {
            header("location: ?invalid=true");
        }

        
        }
    

    /*     if ($username == $tbuser && $password == $tbpass) {
        header("location:home.php");
        $flag=1;
    } else {
        header("location: ?invalid=true");
        $flag=-1;
    }
    if($flag!=1){
  
    } */

?>