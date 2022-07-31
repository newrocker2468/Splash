<?php
require 'connection.php';
$email = $_POST['email'];


$email = filter_var($email, FILTER_SANITIZE_EMAIL);
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $result = mysqli_query($conn, "SELECT email FROM user_db WHERE email = '$email'");
    if (mysqli_num_rows($result) > 0) {
        echo 0;
    } else {
        echo 1;
    }
} else {
    echo 2;
}
