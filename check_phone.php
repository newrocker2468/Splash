<?php
require 'connection.php';

$phone = mysqli_real_escape_string($conn, $_POST['phone']);  
$result = mysqli_query($conn, "SELECT phone FROM user_db WHERE phone = '$phone'");  
if(mysqli_num_rows($result) > 0){    
    echo 0;  
}else{  
    echo 1;  
}

