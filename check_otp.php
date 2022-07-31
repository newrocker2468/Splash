<?php
session_start();
$securedOtp = $_SESSION['otp'];
$userOtp = $_POST['otp'];

if(password_verify($userOtp, $securedOtp) == 1) {    
    echo 1;  
}else{  
    echo 0;  
}

