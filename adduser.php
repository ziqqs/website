<?php

session_start();
include 'mysql.php';
include 'sanitize.php';

$errors = array("firstName" => "",
    "lastName" => "",
    "houseNumber" => "",
    "streetName" => "",
    "city" => "",
    "postcode" => "",
    "email" => "",
    "password" => "",
    "password2" => "");

$input = filter_input_array(INPUT_POST);
$cleaned = sanitize($input);
$pass = checkRequiredFieldsPResent($cleaned);
$pass = checkEmailValid($cleaned['email']);
$pass = checkPasswordMatch($cleaned['password'], $cleaned['password2']);

if ($pass) {
    storeNewUser();
} else {
    $_SESSION['errors'] = $errors;
    goBack();
}

//store to DB
function storeNewUser() {
    global $cleaned;
    global $connection;
    $password = md5($cleaned['password']);
    $firstName = $cleaned['firstName'];
    $lastName = $cleaned['lastName'];
    $houseNumber = $cleaned['houseNumber'];
    $streetName = $cleaned['streetName'];
    $city = $cleaned['city'];
    $postcode = $cleaned['postcode'];
    $email = $cleaned['email'];

    $query = "INSERT INTO tblCustomer VALUES ('$firstName','$lastName','$houseNumber','$streetName','$city','$postcode','$email','$password')";

    mysqli_query($connection, $query);
    session_destroy();
    echo "<h1>User Added</h1>";
}

//check passwords match
function checkPasswordMatch($password1, $password2) {
    global $errors;
    $pass = true;
    if (strcmp($password1, $password2) != 0) {
        $errors['password'] .= " Passwords must match!";
        $errors['password2'] .= " Passwords must match!";
        $pass = false;
    }
    if (strlen($password1) < 8) {
        $errors['password'] .= " Password must be longer than 8 characters";
        $pass = false;
    }
    if (strlen($password2) < 8) {
        $errors['password2'] .= " Password must be longer than 8 characters";
        $pass = false;
    }
    return $pass;
}

//require each input
function checkRequiredFieldsPresent($input) {
    global $errors;
    $pass = true;
    foreach ($input as $key => $value) {
        if (empty($value)) {
            $errors[$key] .= " Required Field!";
            $pass = false;
        }
    }
    return $pass;
}

//check valid email
function checkEmailValid($email) {
    global $errors;
    $pass = true;
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] .= " Invalid email, please enter an email address of the form 'someone@example.com'";
        $pass = false;
    }
    return $pass;
}

function goBack() {
    header("Location: register.php");
    exit;
}