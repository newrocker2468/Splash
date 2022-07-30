<?php
session_start();
require 'connection.php';

if (isset($_SESSION['email']) && isset($_SESSION['verifyFlag']) && isset($_SESSION['token']) && isset($_SESSION['verifykey'])) {
        $email = $_SESSION['email'];
        $verifyFlag = $_SESSION['verifyFlag'];
        $token = $_SESSION['token'];
    } else {
        die("Invalid Token or Key");
    }

function sanitize($input)
{
    require 'connection.php';
    $input = mysqli_escape_string($conn, $input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);
    $input = trim($input);

    return $input;
}

$fName = $lName = $email = $phone = $pass = $conpass = $dob = $gender = $user = "";
$fnError = $lnError = $emailError = $phoneError = $passError = $conPassError = $dobError = $genderError = $userError =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["username"])) {
        $userError = "Username";
    } else {
        $user = sanitize($_POST["username"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["fname"])) {
        $fnError = "First Name";
    } else {
        $fName = sanitize($_POST["fname"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lname"])) {
        $lnError = "Last Name";
    } else {
        $lName = sanitize($_POST["lname"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailError = "Email ID";
    } else {
        $email = sanitize($_POST["email"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["phone"])) {
        $phoneError = "Phone Number";
    } else {
        $phone = sanitize($_POST["phone"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["pass"])) {
        $passError = "Password";
    } else {
        $pass = sanitize($_POST["pass"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["conpass"])) {
        $conPassError = "Confirm Password";
    } else {
        $conpass = sanitize($_POST["conpass"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["gender"])) {
        $genderError = "Gender";
    } else {
        $gender = sanitize($_POST["gender"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["dob"])) {
        $dobError = "Date of Birth";
    } else {
        $dob = sanitize($_POST["dob"]);
    }
}

#################################################################################################################################

$verifystatus = $_SESSION['verifyFlag'];
$tokenkey = openssl_random_pseudo_bytes(32);
$token = bin2hex($tokenkey);

#################################################################################################################################

$query = "SELECT * FROM user_db WHERE username= '$user' and verified = 1";
$result = mysqli_query($conn, $query);
$rows = mysqli_num_rows($result);
if ($rows == 1) {
    echo "Account with this Username already exists.";
} else {
    if($verifyFlag == TRUE){
/*     if (isset($fname) && isset($lname) && isset($email) && isset($phone) && isset($dob) && isset($gender) && isset($pass)) {
 */        // Check for password confirm match
        if ($conpass == $pass) {
            // Check if email format is correct
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // Check password length
                if (strlen($pass) >= 8 && strlen($pass) <= 20) {
                    // Encrypt password
                    $password = password_hash($pass, PASSWORD_DEFAULT);
                    // Add data
                    $vkeygen = openssl_random_pseudo_bytes(32);
                    $vkey = bin2hex($tokenkey);

                    $query2 = "INSERT into user_db (username, firstName, lastName, email, phone, dob, gender, password, verified, vkey)
                					VALUES ('$user', '$fName', '$lName', '$email', '$phone', '$dob', '$gender', '$password', '$verifystatus', '$vkey')";
                    $result2 = mysqli_query($conn, $query2);

                    session_unset();
                    session_destroy(); 

                    header("Location: login.php");
                    
                } else {
                    echo '<h1>Error!</h1>
                      <hr>
                      <h4>Passwords must be between 8 and 20 characters long</h4>';
                    echo "<h4>Click <a href='register.php'>Here</a> to register again.</h4>";
                }
            } else { //checks if email format is correct
                echo '<h1>Error!</h1>
                      <hr>
                      <h4>Invalid Email Format</h4>';
                echo "<h4>Click <a href='register.php'>Here</a> to register again.</h4>";
            }
        } else {
            echo '<h1>Error!</h1>
                      <hr>
                      <h4>The password and confirm password fields do not match</h4>';
            echo "<h4>Click <a href='register.php'>Here</a> to register again.</h4>";
        };
    /* } else { //else display missing parameters
        echo '<h1>Error!</h1>
                      <hr>
                      <h2 style="font-weight:normal">The following fields are empty:</h2>';
        echo '<h3 style="font-weight:normal">', $fnError, ' ', $lnError, ' ', $passError, ' ', $emailError, ' ', $phoneError;
        echo "<h4>Click <a href='register.php'>Here</a> to register again.</h4>";
    } */
} else {
    die("Invalid Flag");
}

}