<?php

include 'mysql.php';
include 'sanitize.php';
include 'validate.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    adduser();
}

function adduser() {
    session_start();
    global $errors;
    global $cleaned;
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
    $pass = checkRequiredFieldsPresent($cleaned);
    $pass = checkEmailValid($cleaned['email']);
    $pass = checkPasswordMatch($cleaned['password'], $cleaned['password2']);
    $pass = checkPasswordLength($cleaned['password']);
    if ($pass) {
        storeNewUser();
    } else {
        $_SESSION['errors'] = $errors;
        $_SESSION['input'] = $cleaned;
        goBack();
    }
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

function goBack() {
    header("Location: register.php");
    exit;
}