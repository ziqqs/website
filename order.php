<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Order</h1>
        <h3>You have ordered:</h3>
        <?php
        include 'mysql.php';
        $con = $connection;
      //  $con = mysqli_connect("localhost", "root", "", "simplegym");
        $user = $_SESSION['user'];
        
        foreach ($_SESSION as $key => $value) {
            if ($key != 'user'){
                $query = "INSERT INTO tblOrder VALUES (null, \"$user\", \"$key\","
                        . "$value";
                mysqli_query($con, $query);
                echo "<p>$key - $value</p>";
                unset($key);
            }
        }
        mysqli_close($con);
        ?>
        <a href="index.php">Home</a>
    </body>
</html>
