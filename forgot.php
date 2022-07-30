<html>

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/forgot.css">
</head>

</html>

<body>
    <div class="form__main">
        <h1>Forgot Your Password?</h1>
        <h3>Relax, It Happens With Best of Us</h3>
        <form action="" method="POST">
            <input placeholder="Enter Your Email" type="email" name="email" /><br />
            <input type="submit" name="submit">
        </form>
        <?php if (isset($_GET['check']) && $_GET['check'] == "false") {
            echo '<p style="color:red">Sorry, That Email Does Not Exist. Are You Sure You Entered The Correct One?</p>';
        } ?>
        <p><a href="login.php">Or, Continue with Login</a></p>
    </div>
</body>

<?php
session_start();
if (!empty($_POST['submit'])) {
    $email = $_POST['email'];

    $conn = mysqli_connect("localhost", "root", "", "splash");
    $result = mysqli_query($conn, "SELECT * FROM user_db WHERE email = '$email'");
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['forgotPassword'] = $email;
        header("location: sendotp.php");
    } else {
        header("location: ?check=false");
    }
}
?>