<?php
session_start();
if (isset($_SESSION['errors'])==false) {

    $_SESSION['errors'] = array("firstName" => "",
        "lastName" => "",
        "houseNumber" => "",
        "streetName" => "",
        "city" => "",
        "postcode" => "",
        "email" => "someone@example.com",
        "password" => "Minimum 8 characters",
        "password2" => "");

}
$errors = $_SESSION['errors'];

if (isset($_SESSION['input'])==false) {

    $_SESSION['input'] = array("firstName" => "",
        "lastName" => "",
        "houseNumber" => "",
        "streetName" => "",
        "city" => "",
        "postcode" => "",
        "email" => "",
        "password" => "",
        "password2" => "");

}
$input = $_SESSION['input'];
?>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
    </head>
    <body>
        <h1>Register for SimpleGym</h1>
        <form action="adduser.php" method="POST">
            <table>
                <tr><td>First Name: </td><td><input type="text" name="firstName" value="<?php echo $input['firstName'] ?>" /></td><td><?php echo $errors['firstName'] ?></td></tr>
                <tr><td>Last Name: </td><td><input type="text" name="lastName" value="<?php echo $input['lastName']?>"/></td><td><?php echo $errors['lastName'] ?></td></tr>
                <tr><td>House Number: </td><td><input type="number" name="houseNumber" value="<?php echo $input['houseNumber']?>"/></td><td><?php echo $errors['houseNumber'] ?></td></tr>
                <tr><td>Street: </td><td><input type="text" name="streetName" value="<?php echo $input['streetName']?>"/></td><<td><?php echo $errors['streetName'] ?></td></tr>
                <tr><td>City: </td><td><input type="text" name="city" value="<?php echo $input['city']?>"/></td><td><?php echo $errors['city'] ?></td></tr>
                <tr><td>Postcode: </td><td><input type="text" name="postcode" value="<?php echo $input['postcode']?>"/></td><td><?php echo $errors['postcode'] ?></td></tr>
                <tr><td>Email Address: </td><td><input type="text" name="email" value="<?php echo $input['email']?>"/></td><td><?php echo $errors['email'] ?></td></tr>
                <tr><td>Password : </td><td><input type="password" name="password" value="<?php echo $input['password']?>"/></td><td><?php echo $errors['password'] ?></td></tr>
                <tr><td>Re-type password: </td><td><input type="password" name="password2" value="<?php echo $input['password']?>"/></td><td><?php echo $errors['password2'] ?></td></tr>
                <tr><td>Submit Registration: </td><td><input type="submit" value="Go!"></td></tr>
            </table>
        </form>

    </body>
</html>
