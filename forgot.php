<html>

<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" href="css/forgot.css">
</head>

</html>

<body>
    <svg width="100%" height="75%" class="wave" id="svg" viewBox="0 150 1440 400" xmlns="http://www.w3.org/2000/svg" class="transition duration-300 ease-in-out delay-150">
        <defs>
            <linearGradient id="gradient" x1="0%" y1="50%" x2="100%" y2="50%">
                <stop offset="5%" stop-color="#ac0f3cff"></stop>
                <stop offset="95%" stop-color="#6f2232ff"></stop>
            </linearGradient>
        </defs>
        <path d="M 0,400 C 0,400 0,200 0,200 C 57.6958021623622,228.15897856142112 115.3916043247244,256.31795712284224 154,236 C 192.6083956752756,215.68204287715773 212.1293848634645,146.8871500700521 263,143 C 313.8706151365355,139.1128499299479 396.0908562214174,200.13344259694944 458,201 C 519.9091437785826,201.86655740305056 561.5071902508656,142.5790795421502 599,131 C 636.4928097491344,119.4209204578498 669.8803827751198,155.55023923444975 714,163 C 758.1196172248802,170.44976076555025 812.9712786486556,149.21996352005075 862,152 C 911.0287213513444,154.78003647994925 954.2345026302573,181.56990668534723 999,198 C 1043.7654973697427,214.43009331465277 1090.0907108303152,220.50040973856034 1142,221 C 1193.9092891696848,221.49959026143966 1251.4026540484815,216.42845436041134 1302,212 C 1352.5973459515185,207.57154563958866 1396.2986729757592,203.78577281979432 1440,200 C 1440,200 1440,400 1440,400 Z" stroke="none" stroke-width="0" fill="url(#gradient)" class="transition-all duration-300 ease-in-out delay-150 path-0" transform="rotate(-180 720 200)"></path>
    </svg>
    <div class="form__main">
        <h1>Forgot Your Password?</h1>
        <h3>Relax, It Happens With Best of Us</h3>

        <form action="" method="POST">
            <div class="input-group">
                <input required  type="email" name="email" autocomplete="off" class="input" id="email" onkeyup="checkemail()">
                <label class="user-label">Enter Your Email</label>
            </div>
            <p id="email_verify"></p>
            <button id="submit" type="submit" name="submit" value="submit" >
                <div class="svg-wrapper-1">
                    <div class="svg-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                            <path fill="none" d="M0 0h24v24H0z"></path>
                            <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                        </svg>
                    </div>
                </div>
                <span>Send</span>
            </button>
        </form>
        <?php if (isset($_GET['check']) && $_GET['check'] == "false") {
            echo '<p style="color:red">Sorry, That Email Does Not Exist. Are You Sure You Entered The Correct One?</p>';
        } ?>
        <p><a href="index.php">Or, Continue with Login</a></p>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="js/forgot.js"></script>

<?php
require 'connection.php';
session_start();
if (!empty($_POST['submit'])) {
    $email = $_POST['email'];

    $result = mysqli_query($conn, "SELECT * FROM user_db WHERE email = '$email'");
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['forgotPassword'] = $email;
        header("location: sendotp.php");
    } else {
        header("location: ?check=false");
    }
}
?>