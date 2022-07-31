<?php
session_start();
$securedOtp = $_SESSION['registerotp'];
$userOtp = $_POST['otp'];

if(password_verify($userOtp, $securedOtp) == 1) {    
    echo 1;  
}else{  
    echo 0;  
}

