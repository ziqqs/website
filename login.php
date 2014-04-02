<?php
session_start();
if (isset($_SESSION['errors'])==false) {
    $_SESSION['errors'] = array("email" => "",
        "password" => "");
}
$errors = $_SESSION['errors'];
?>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <h1>Login to SimpleGym</h1>
        <form action="auth.php" method="POST">
            <table>
                <tr><td>Email address: </td><td><input type="text" name="email"/></td><td><?php echo $errors['email'] ?></td></tr>
                <tr><td>Password: </td><td><input type="password" name="password"/></td><td><?php echo $errors['password'] ?></td></tr>
                <tr><td>Submit: </td><td><input type="submit" value="Login"></td></tr>
            </table>
        </form>

    </body>
</html>