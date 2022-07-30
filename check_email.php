<?php
require 'connection.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);  
$result = mysqli_query($conn, "SELECT email FROM user_db WHERE email = '$email'");  
if(mysqli_num_rows($result) > 0){    
    echo 0;  
}else{  
    echo 1;  
}

