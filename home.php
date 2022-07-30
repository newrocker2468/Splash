<?php
session_start();
require 'connection.php';

if (isset($_SESSION['vkey'])) {
    $vkey = $_SESSION['vkey'];
} else {
    die("Verification Error");
}
?>
<html>

<head>
    <title>
        Splash home
    </title>
</head>

<body>
    <h1>
        Welcome to splash
    </h1>
    <?php
    $sql = "SELECT * FROM user_db WHERE vkey = '$vkey' ";
    $result = $conn->query($sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "First Name: " . $row["firstName"] . "<br>";
            echo "Last  Name: " . $row["lastName"] . "<br>";
            echo "Phone Number: " . $row["phone"] . "<br>";
            echo "Email: " . $row["email"] . "<br>";
            echo "Gender: " . $row["gender"] . "<br>";
            echo "Date of Birth: " . $row["dob"] . "<br>";
        }
    }
    ?>

    <form action="" method="post">
        <input type="submit" value="submit" name="submit">
    </form>
</body>

</html>

<?php 

if(isset($_POST['submit'])) {
    setcookie("logkey","expired", time() - 2592000, "", "localhost");
    session_unset();
    session_destroy();
    header("location: login.php");
}

?>