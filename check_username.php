<?php
require 'connection.php';

$username = mysqli_real_escape_string($conn, $_POST['user']);  
$result = mysqli_query($conn, "SELECT username FROM user_db WHERE username = '$username'");  
if(mysqli_num_rows($result) > 0){    
    echo 0;  
}else{  
    echo 1;  
}

