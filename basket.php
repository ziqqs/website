<?php
session_start();
if (!isset($_SESSION['user'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        foreach ($_POST as $key => $value) {
            if (isset($_SESSION[$key])){
                $_SESSION[$key] = $_SESSION[$key]+1;
            }else{
                $_SESSION[$key] = 1;
            }
        }
        echo "<h1>Basket</h1>";
        foreach ($_SESSION as $key => $value){
            if ($key != 'user'){
                echo "<p>$key - $value</p>";
            }
        }
        ?>
        <form action="order.php" method="POST">
            <input type="submit" value="Order">
        </form>
    </body>
</html>
