<?php

include 'mysql.php';
include 'sanitize.php';
include 'validate.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    auth();
}

function auth() {
    session_start();
    global $cleaned;
    global $errors;
    global $userRow;
    $errors = array("email" => "",
        "password" => "");

    $input = filter_input_array(INPUT_POST);
    $cleaned = sanitize($input);

    $pass = checkRequiredFieldsPresent($input);
    $pass = checkEmailValid($cleaned['email']);
    $pass = fetchUser();
    if ($pass) {
        $pass = checkPassword(md5($cleaned['password']), $userRow['password']);
    }
    if ($pass) {
        login($cleaned['email']);
    } else {
        $_SESSION['errors'] = $errors;
        goback();
    }
}

function login($user) {
    session_destroy();
    session_start();
    $_SESSION['user'] = $user;
    print_r($_SESSION);
}

function fetchUser() {
    global $cleaned;
    global $connection;
    global $errors;
    global $userRow;

    $pass = true;

    $password = md5($cleaned['password']);
    $email = $cleaned['email'];
    $query = "SELECT * FROM tblCustomer WHERE email ='$email'";
    $result = mysqli_query($connection, $query);
    
    if (mysqli_num_rows($result)<1) {
        $pass = false;
        $errors['email'] .= " User does not exist";   
    } else {
        $userRow = mysqli_fetch_array($result);
    }
    return $pass;
    
}

function goBack() {
    header("Location: login.php");
    exit;
}
