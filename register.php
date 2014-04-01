<!DOCTYPE html>

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
                <tr><td>First Name: </td><td><input type="text" name="firstName"/></td></tr>
                <tr><td>Last Name: </td><td><input type="text" name="lastName"/></td></tr>
                <tr><td>House Number: </td><td><input type="number" name="houseNumber"/></td></tr>
                <tr><td>Street: </td><td><input type="text" name="streetName"/></td></tr>
                <tr><td>City: </td><td><input type="text" name="city"/></td></tr>
                <tr><td>Postcode: </td><td><input type="text" name="postcode"/></td></tr>
                <tr><td>Email Address: </td><td><input type="text" name="email"/></td></tr>
                <tr><td>Password : </td><td><input type="password" name="password"/></td></tr>
                <tr><td>Re-type password: </td><td><input type="password" name="password2"/></td></tr>
                <tr><td>Submit Registration: </td><td><input type="submit" value="Go!"></td></tr>
            </table>
        </form>

    </body>
</html>
